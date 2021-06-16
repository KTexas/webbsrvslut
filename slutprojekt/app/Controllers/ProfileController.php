<?php

/**
 * Profile controller for the website
 * Controls most functions for controlling user and profiles
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Profile
 * @package    App\Controllers
 * @author     Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @copyright  2020-2021 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.0
 * @deprecated File has not deprecated
 */

namespace App\Controllers;

use App\SendEmail;
use App\View;
use App\Database;
use App\UserDatabase;
use App\Filters;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class ProfileController
 * @package App\Controllers
 */
class ProfileController
{

    /**
     * @var int|mixed $cartAmount Private variable containing the quantity of cart items
     */
    private int $cartAmount;

    /**
     * ProfileController constructor
     * Sets the quantity of cart items
     */
    public function __construct()
    {
        $amount = 0;
        if ( isset( $_SESSION[ 'cart' ] ) && $_SESSION[ 'cart' ] !== NULL ) {
            for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
                $amount += $_SESSION[ 'cart' ][ $i ][ 'amount' ];
            }
        }
        $this->cartAmount = $amount;
    }

    /**
     * Gets 6 digit OTC and unsets it
     * @return string Complete string of OTC
     */
    private static function get6DigitOTC() {
        return (
            Filters::filterStringAndUnsetPost( 'otc-1' )
            . Filters::filterStringAndUnsetPost( 'otc-2' )
            . Filters::filterStringAndUnsetPost( 'otc-3' )
            . Filters::filterStringAndUnsetPost( 'otc-4' )
            . Filters::filterStringAndUnsetPost( 'otc-5' )
            . Filters::filterStringAndUnsetPost( 'otc-6' )
        );
    }

    /**
     * Profile page of user, redirects user to log in if not logged in
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index()
    {
        if (isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL && !$_SESSION['user']['email_verified']) {
            header('Location: /verify-email');
        }
        $main = new ProfileController();
        if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
            $_SESSION[ 'user' ] = UserDatabase::logInUser( $_SESSION[ 'user' ][ 'email' ], $_SESSION[ 'user' ][ 'password' ] );
            $data = [
                'user' => $_SESSION[ 'user' ],
                'cartAmount' => $main->cartAmount,
            ];
            View::render( 'user.profile', $data );
        }
        else {
            header( 'Location: /log-in' );
        }
    }

    /**
     * Updates users settings to newly changed
     */
    public function changeUserSettings()
    {
        if ( isset( $_POST[ 'showIndexOrdersHidden' ] )
            && isset( $_POST[ 'order' ] ) ) {
            $order = filter_var( $_POST[ 'order' ], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
            if ( isset( $_POST[ 'showIndexOrders' ] ) ) {
                UserDatabase::changeUserSettings( $_SESSION[ 'user' ][ 'id' ], [ TRUE, $order ] );
            }
            else {
                UserDatabase::changeUserSettings( $_SESSION[ 'user' ][ 'id' ], [ FALSE, $order ] );
            }
        }
        header( 'Location: /profile' );
    }

    /**
     * Login page
     * If user is already logged in, redirects to profile page
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function logIn()
    {
        $main = new ProfileController();
        if ( isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: /profile' );
        }
        else {
            View::render( 'user.log-in', [ 'cartAmount' => $main->cartAmount ] );
        }
    }

    /**
     * Logs in users with credentials
     */
    public function logInUser()
    {
        if ( isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) ) {
            $email = Filters::filterStringAndUnsetPost( 'email' );
            $password = $_POST[ 'password' ];
            unset( $_POST[ 'password' ] );

            $password = filter_var( $password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
            $hash = UserDatabase::checkUserExists( $email );
            $hash = $hash[ 'password' ];

            $verify = password_verify( $password, $hash );

            if ( $verify ) {
                $user = UserDatabase::logInUser( $email, $hash );
                $_SESSION[ 'user' ] = $user;
                header( 'Location: /profile' );
            }
            else {
                header( 'Location: /log-in' );
            }
        }
    }

    /**
     * Logs out user and redirects to profile|log-in
     */
    public function logOut()
    {
        unset( $_SESSION[ 'user' ] );
        header( 'Location: /profile' );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function forgotPassword()
    {
        $main = new ProfileController();
        if ( isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: /profile' );
        }
        else {
            $data = [
                'account' => isset( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ] ) ? $_SESSION[ 'userResetPassword' ][ 'currentAccount' ] : FALSE,
                'validCode' => isset( $_SESSION[ 'userResetPassword' ][ 'validCode' ] ) ? $_SESSION[ 'userResetPassword' ][ 'validCode' ] : FALSE,
            ];
            View::render( 'user.reset-password', $data );
        }
    }

    /**
     * Sends reset password validation code
     */
    public function sendForgotPasswordCode()
    {
        $main = new ProfileController();
        if ( isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: /profile' );
        }
        else {
            $email = Filters::filterStringAndUnsetPost( 'email' );
            $user = UserDatabase::checkUserExists( $email );
            if ( $user ) {
                $code = mt_rand( 100000, 999999 );
                UserDatabase::pushResetCode( $user[ 'id' ], $code );
                SendEmail::validationCode( $user, $code );
                $_SESSION[ 'userResetPassword' ][ 'currentAccount' ] = $user;
                header( 'Location: /forgot-password' );
            } else {
                header('Location: /create-profile');
            }
        }
    }

    /**
     * Cancels forgot password
     */
    public function cancelForgotPassword(  )
    {
        if (isset($_SESSION['userResetPassword']) && isset($_SESSION['userResetPassword']['currentAccount'])) {
            UserDatabase::removeResetCode( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ] );
            unset( $_SESSION[ 'userResetPassword' ] );
        }
        header('Location: /log-in');
    }

    /**
     * Compares validation code to database code
     */
    public function compareResetCode()
    {
        $validCode = UserDatabase::fetchResetCode( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ], self::get6DigitOTC() );
        if ( $validCode ) {
            $_SESSION[ 'userResetPassword' ][ 'validCode' ] = TRUE;
            UserDatabase::removeResetCode( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ] );
        }
        else {
            $_SESSION[ 'userResetPassword' ][ 'validCode' ] = FALSE;
        }
        header( 'Location: /forgot-password' );
    }

    /**
     * Updates user password
     */
    public function updateUserPassword()
    {
        if ($_SESSION['userResetPassword']['validCode']) {
            if ( isset( $_POST[ 'password' ] )
                && isset( $_POST[ 'cpassword' ] )
            ) {
                $password = $_POST[ 'password' ];
                $cpassword = $_POST[ 'cpassword' ];
                unset( $_POST[ 'password' ] );
                unset( $_POST[ 'cpassword' ] );

                if ( $password === $cpassword ) {
                    $hash = password_hash( $password, PASSWORD_DEFAULT );
                    UserDatabase::updateUserPassword( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ], $hash );
                    unset( $_SESSION[ 'userResetPassword' ] );
                    header( 'Location: /log-in' );
                }
                else {
                    header( 'Location: /forgot-password' );
                }
            }
        } else {
            header( 'Location: /forgot-password' );
        }
    }

    /**
     * Create user screen
     * No real functionality besides showing create user screen
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function createUser()
    {
        $main = new ProfileController();
        if ( isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: /profile' );
        }
        else {
            $data = [
                'cartAmount' => $main->cartAmount,
                'userExists' => isset( $_SESSION[ 'animations' ][ 'user-already-exists' ] ),
                'passwordsDontMatch' => isset( $_SESSION[ 'animations' ][ 'passwords-dont-match' ] ),
            ];
            unset( $_SESSION[ 'animations' ][ 'user-already-exists' ] );
            unset( $_SESSION[ 'animations' ][ 'passwords-dont-match' ] );
            View::render( 'user.create-user', $data );
        }
    }

    private static function sendEmailCode(string $email) {
        $code = mt_rand( 100000, 999999 );
        UserDatabase::pushEmailVerifyCode( $email, $code );
        SendEmail::validationCode( [ 'email' => $email ], $code );
    }

    /**
     * Post new user to database and logs in
     * Also checks if password and cpassword matches
     * Uses encryption to make passwords safe
     */
    public function postUser()
    {
        if ( isset( $_POST[ 'email' ] )
            && isset( $_POST[ 'fname' ] )
            && isset( $_POST[ 'lname' ] )
            && isset( $_POST[ 'password' ] )
            && isset( $_POST[ 'cpassword' ] )
        ) {
            $email = Filters::filterStringAndUnsetPost( 'email' );
            $fname = ucfirst( Filters::filterStringAndUnsetPost( 'fname' ) );
            $lname = ucfirst( Filters::filterStringAndUnsetPost( 'lname' ) );
            $password = $_POST[ 'password' ];
            $cpassword = $_POST[ 'cpassword' ];
            unset( $_POST[ 'password' ] );
            unset( $_POST[ 'cpassword' ] );

            if ( UserDatabase::checkUserExists( $email ) == FALSE ) {
                if ( $password === $cpassword ) {
                    $password = filter_var(
                        $password,
                        FILTER_SANITIZE_STRING,
                        FILTER_FLAG_STRIP_LOW
                    );
                    $hash = password_hash( $password, PASSWORD_DEFAULT );
                    UserDatabase::createUser( $email, $fname, $lname, $hash );
                    $code = mt_rand( 100000, 999999 );
                    UserDatabase::pushEmailVerifyCode( $email, $code );
                    SendEmail::validationCode( [ 'email' => $email ], $code );
                    self::sendEmailCode($email);
                    $_SESSION[ 'user' ] = UserDatabase::logInUser( $email, $hash );
                    header( 'Location: /verify-email' );
                }
                else {
                    $_SESSION[ 'animations' ][ 'passwords-dont-match' ] = TRUE;
                    header( 'Location: /create-profile' );
                }
            }
            else {
                $_SESSION[ 'animations' ][ 'user-already-exists' ] = TRUE;
                header( 'Location: /create-profile' );
            }
        }
    }

    /**
     * Compares user validation code to database
     */
    public function compareEmailCode()
    {
        $validCode = UserDatabase::fetchResetCode( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ], $otc = self::get6DigitOTC() );
        if ( $validCode ) {
            $_SESSION[ 'userResetPassword' ][ 'validCode' ] = TRUE;
            UserDatabase::removeResetCode( $_SESSION[ 'userResetPassword' ][ 'currentAccount' ][ 'id' ] );
        }
        else {
            $_SESSION[ 'userResetPassword' ][ 'validCode' ] = FALSE;
        }
        header( 'Location: /forgot-password' );
    }

    /**
     * Verifies user email and removes old code form database
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function verifyEmail()
    {
        if ( isset( $_SESSION[ 'user' ] ) && !$_SESSION[ 'user' ][ 'email_verified' ] ) {
            if ( isset( $_POST[ 'otc-1' ] )
                && isset( $_POST[ 'otc-2' ] )
                && isset( $_POST[ 'otc-3' ] )
                && isset( $_POST[ 'otc-4' ] )
                && isset( $_POST[ 'otc-5' ] )
                && isset( $_POST[ 'otc-6' ] )
            ) {
                $validCode = UserDatabase::fetchEmailVerifyCode( $_SESSION[ 'user' ][ 'email' ], self::get6DigitOTC() );
                if ( $validCode ) {
                    UserDatabase::updateUserEmailVerify( TRUE, $_SESSION[ 'user' ][ 'email' ]);
                    UserDatabase::removeEmailVerifyCode( $_SESSION[ 'user' ][ 'email' ] );
                    header('Location: /profile');
                }
            }
            $data = [
                'user' => $_SESSION['user'],
                'showValidCode' => TRUE
            ];
            View::render( 'user.create-user', $data );
        }
        else {
            header( 'Location: /profile' );
        }
    }

    /**
     * Sets and sends new code to user email
     */
    public function newEmailCode(  )
    {
        $email = Filters::filterStringAndUnsetPost('email');
        UserDatabase::removeEmailVerifyCode($email);
        self::sendEmailCode( $email);
        header('Location: /verify-email');
    }
}