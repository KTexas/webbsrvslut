<?php

/**
 * Cart controller for the website
 * Controls functions for the cart and sending orders
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Cart
 * @package    App\Controllers
 * @author     Squiz Pty Ltd <products@squiz.net>
 * @copyright  2020-2021 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.0
 * @deprecated File has not deprecated
 */

namespace App\Controllers;

use App\OrdersDatabase;
use App\UserDatabase;
use App\View;
use App\Database;
use App\Filters;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AdminController
{

    /**
     * AdminController constructor.
     *
     * Re fetches user information
     * Checks if user is ADMIN
     */
    public function __construct()
    {
        $_SESSION[ 'user' ] = UserDatabase::logInUser( $_SESSION[ 'user' ][ 'email' ], $_SESSION[ 'user' ][ 'password' ] );
        if ( !( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL && $_SESSION[ 'user' ][ 'is_admin' ] ) ) {
            header( 'Location: /log-in' );
        }
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index()
    {
        $_SESSION[ 'user' ] = UserDatabase::logInUser( $_SESSION[ 'user' ][ 'email' ], $_SESSION[ 'user' ][ 'password' ] );
        $data = [
            'user' => $_SESSION[ 'user' ],
        ];
        View::render( 'admin', $data );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function allOrders()
    {

        if ( isset( $_GET[ 'search' ] ) && $_GET[ 'search' ] !== '' ) {
            $query = filters::filterString( $_GET[ 'search' ] );
            $data = [
                'orders' => OrdersDatabase::fetchAllOrdersContainingString( $query ),
                'search' => $query
            ];
        }
        else {
            $data = [
                "orders" => OrdersDatabase::fetchAllOrdersWithData()
            ];
        }

        View::render( 'admin.all-orders', $data );
    }

    /**
     * Displays list of all users
     * Has ability to search
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function allUsers()
    {
        if ( isset( $_GET[ 'search' ] ) && $_GET[ 'search' ] !== '' ) {
            $query = filters::filterString( $_GET[ 'search' ] );
            $data = [
                'users' => UserDatabase::fetchUserContainingString( $query ),
            ];
        }
        else {
            $data = [
                'users' => UserDatabase::fetchAllUsers(),
            ];
        }

        View::render( 'admin.all-users', $data );
    }

    /**
     * Displays user based on id
     * Fetches user data, liked product, orders
     *
     * @param string $id User id
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function displayUser( string $id )
    {
        $likedProductIds = Database::fetchLikedProductsByUserId( $id );
        $likedProducts = [];
        for ( $i = 0; $i < count( $likedProductIds ); $i++ ) {
            array_push( $likedProducts, Database::fetchProductById( $likedProductIds[ $i ][ 'product_id' ] ) );
        }

        $userOrders = OrdersDatabase::fetchUserOrders( $id );
        $orderArray = [];
        for ( $i = 0; $i < count( $userOrders ); $i++ ) {
            $order = OrdersDatabase::fetchOrderData( $userOrders[ $i ][ 'order_id' ] );
            $orderProduct = Database::fetchProductById( $order[ 'product_id' ] );
            $orderTracking = OrdersDatabase::fetchTrackingData( $userOrders[ $i ][ 'order_id' ] );
            $payment = OrdersDatabase::fetchPaymentData( $userOrders[ $i ][ 'order_id' ] );
            $payment = str_repeat( '*', ( strlen( $payment[ 'card_number' ] ) - 4 ) ) . substr( $payment[ 'card_number' ], -4 );
            array_push(
                $orderArray,
                [
                    'orderData' => $order,
                    'product' => $orderProduct,
                    'tracking' => $orderTracking,
                    'destination' => OrdersDatabase::fetchDestinationData( $userOrders[ $i ][ 'order_id' ] ),
                    'payment' => $payment,
                ]
            );
        }

        $data = [
            'user' => UserDatabase::fetchUserById( $id ),
            'likedProducts' => $likedProducts,
            'orders' => $orderArray,
        ];
        View::render( 'admin.user-info', $data );
    }

    /**
     * Edit user screen
     *
     * @param string $id User id
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function editUser( string $id )
    {
        $data = [
            'user' => UserDatabase::fetchUserById( $id ),
        ];
        View::render( 'admin.edit-user', $data );
    }

    /**
     * Updates user to database
     */
    public function updateUser()
    {
        if ( isset( $_POST[ 'userId' ] )
            && isset( $_POST[ 'email' ] )
            && isset( $_POST[ 'fname' ] )
            && isset( $_POST[ 'lname' ] )
        ) {
            $userId = Filters::filterStringAndUnsetPost( 'userId' );
            $email = Filters::filterStringAndUnsetPost( 'email' );
            $fname = ucfirst( Filters::filterStringAndUnsetPost( 'fname' ) );
            $lname = ucfirst( Filters::filterStringAndUnsetPost( 'lname' ) );

            $isAdmin = FALSE;
            if ( isset( $_POST[ 'admin' ] ) ) {
                $isAdmin = TRUE;
            }

            UserDatabase::updateUserInfo(
                $userId,
                $email,
                $fname,
                $lname,
                $isAdmin
            );
            header( 'Location: /admin/user/' . $userId . '/edit' );
        }
        else {
            header( 'Location: /admin' );
        }
    }

    /**
     * Displays all products
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function allProducts()
    {
        $search = false;
        if ( isset( $_GET[ 'search' ] ) && $_GET[ 'search' ] !== '' ) {
            $search = filters::filterString( $_GET[ 'search' ] );
            $products = Database::fetchAllProductsContainingString($search);
        }
        else {
            $products = Database::fetchAllProductsByOrder( [ 'all' ], 'id' );
        }
        $data = [
            'posters' => $products,
            'search' => $search
        ];
        View::render( 'admin.all-products', $data );
    }

    /**
     * Displays poster
     *
     * @param string $name Name of poster
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function editPoster( string $name )
    {
        $name = Filters::filterString( $name );
        $name = str_replace( '-', ' ', $name );
        $poster = Database::fetchProductByName( $name );
        $colorIDs = Database::fetchAllProductColors( $poster[ 'id' ] );

        for ( $i = 0; $i < count( $colorIDs ); $i++ ) {
            $colorIDs[ $i ] = $colorIDs[ $i ][ 'color_id' ];
        }

        $allColors = Database::fetchColors();
        $data = [
            'poster' => $poster,
            'allColors' => $allColors,
            'selectedColors' => $colorIDs,
        ];
        View::render( 'admin.edit-poster', $data );
    }

    /**
     * Pushes and updates poster to database
     */
    public function updatePoster()
    {
        if ( isset( $_POST[ 'posterId' ] )
            && isset( $_POST[ 'name' ] )
            && isset( $_POST[ 'price' ] )
            && isset( $_POST[ 'likes' ] )
            && isset( $_POST[ 'image' ] )
            && isset( $_POST[ 'totalColorAmount' ] )
        ) {
            $id = Filters::filterStringAndUnsetPost( 'posterId' );
            $name = ucwords( Filters::filterStringAndUnsetPost( 'name' ) );
            $price = Filters::filterStringAndUnsetPost( 'price' );
            $likes = Filters::filterStringAndUnsetPost( 'likes' );
            $image = Filters::filterStringAndUnsetPost( 'image' );
            $totalColors = Filters::filterStringAndUnsetPost( 'totalColorAmount' );

            Database::updateProduct(
                $id,
                $name,
                $price,
                $likes,
                $image
            );
            $newColors = [];
            for ( $i = 0; $i < $totalColors; $i++ ) {
                if ( isset( $_POST[ 'color-' . $i ] ) ) {
                    array_push( $newColors, $i );
                }
            }

            Database::updateProductColors( $id, $newColors );

            $name = str_replace( ' ', '-', $name );
            header( 'Location: /admin/products/' . $name . '-poster' );
        }
        else {
            header( 'Location: /admin' );
        }
    }

    /**
     * Add product screen
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function addProduct()
    {
        $data = [
            'colors' => Database::fetchColors(),
        ];
        View::render( 'admin.add-product', $data );
    }

    /**
     * Posts new product to database
     */
    public function postProduct()
    {
        if ( isset( $_POST[ 'name' ] )
            && isset( $_POST[ 'price' ] )
            && isset( $_POST[ 'likes' ] )
            && isset( $_POST[ 'totalColorAmount' ] )
        ) {
            $name = ucwords( Filters::filterStringAndUnsetPost( 'name' ) );
            $price = Filters::filterStringAndUnsetPost( 'price' );
            $likes = Filters::filterStringAndUnsetPost( 'likes' );
            $totalColors = Filters::filterStringAndUnsetPost( 'totalColorAmount' );

            $target_dir = 'assets/posters/';
            $target_file = $target_dir . basename( $_FILES[ 'image' ][ 'name' ] );

            if ( move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $target_file ) ) {
                $image = $_FILES[ 'image' ][ 'name' ];
            }
            else {
                $image = 'bad';
            }

            $newColors = [];
            for ( $i = 0; $i < $totalColors; $i++ ) {
                if ( isset( $_POST[ 'color-' . $i ] ) ) {
                    array_push( $newColors, $i );
                    unset( $_POST[ 'color-' . $i ] );
                }
            }

            var_dump( $newColors );
            Database::postPoster(
                $name,
                $price,
                $likes,
                $image,
                $newColors
            );
            $name = str_replace( ' ', '-', $name );
            header( 'Location: /admin/products/' . $name . '-poster' );
        }
        else {
            echo 'bad';
        }
    }

    /**
     * Deletes product based on ID
     */
    public function deleteProduct()
    {
        if ( isset( $_POST[ 'id' ] ) ) {
            Database::deletePoster( Filters::filterStringAndUnsetPost( 'id' ) );
            header( 'Location: /admin/all-products' );
        }
    }

}