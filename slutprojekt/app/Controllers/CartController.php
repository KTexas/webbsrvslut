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

use App\View;
use App\Database;
use App\UserDatabase;
use App\OrdersDatabase;
use App\filters;
use App\SendEmail;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class CartController
 * @package App\Controllers
 */
class CartController
{
    /**
     * Main cart screen
     * Displays current cart items and sends data to corresponding twig screen
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index()
    {
        $cartItems = [];
        if ( isset( $_SESSION[ 'cart' ] ) && $_SESSION[ 'cart' ] !== NULL ) {
            for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
                array_push( $cartItems, [
                    'poster' => Database::fetchProductById( $_SESSION[ 'cart' ][ $i ][ 'productId' ] ),
                    'size' => $_SESSION[ 'cart' ][ $i ][ 'size' ],
                    'price' => $_SESSION[ 'cart' ][ $i ][ 'price' ],
                    'amount' => $_SESSION[ 'cart' ][ $i ][ 'amount' ],
                ] );
            }

            $data = [
                'cartItems' => $cartItems,
            ];
        }
        else {
            $data = [];
        }
        View::render( 'cart', $data );
    }

    /**
     * Adds product to the cart
     */
    public function addCart()
    {
        $existingAmount = 1;
        $productId = filter_var(
            $_POST[ 'product_id' ],
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_STRIP_LOW
        );
        $size = filter_var(
            $_POST[ 'poster_size' ],
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_STRIP_LOW
        );
        $location = filter_var(
            $_POST[ 'location' ],
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_STRIP_LOW
        );
        for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
            if ( in_array( $productId, $_SESSION[ 'cart' ][ $i ] )
                && in_array( $size, $_SESSION[ 'cart' ][ $i ] )
            ) {
                $existingAmount = $_SESSION[ 'cart' ][ $i ][ 'amount' ] + 1;
                $indexExist = $i;
            }
        }

        $posterPrice = Database::fetchProductById( $productId );
        $posterPrice = (int)$posterPrice[ 'extra_price' ];
        switch ( $size ) {
            case "21x30":
                $posterPrice += 99;
                break;
            case "30x40":
                $posterPrice += 159;
                break;
            case "40x50":
                $posterPrice += 199;
                break;
            case "50x70":
                $posterPrice += 249;
                break;
            case "70x100":
                $posterPrice += 379;
                break;
            default:
                $posterPrice += 99;
        }
        if ( isset( $_SESSION[ 'cart' ] ) && $_SESSION[ 'cart' ] !== NULL ) {
            if ( $existingAmount > 1 ) {
                $_SESSION[ 'cart' ][ $indexExist ] = [
                    'productId' => $productId,
                    'price' => $posterPrice * $existingAmount,
                    'size' => $size,
                    'amount' => $existingAmount,
                ];
            }
            else {
                array_push( $_SESSION[ 'cart' ], [
                    'productId' => $productId,
                    'price' => $posterPrice * $existingAmount,
                    'size' => $size,
                    'amount' => $existingAmount,
                ] );
            }
        }
        else {
            $_SESSION[ 'cart' ][ 0 ] = [
                'productId' => $productId,
                'price' => $posterPrice * $existingAmount,
                'size' => $size,
                'amount' => '1',
            ];
        }
        unset( $_POST );
        $_SESSION[ 'animations' ][ 'addCart' ] = TRUE;
        header( 'Location: /' . $location );
    }

    /**
     * Changes the cart item qty to desired qty
     */
    public function changeItemAmount()
    {
        $indexExist = NULL;
        $existingAmount = NULL;
        $oldFullPrice = NULL;
        for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
            if ( in_array( $_POST[ 'product_id' ], $_SESSION[ 'cart' ][ $i ] )
                && in_array( $_POST[ 'poster_size' ], $_SESSION[ 'cart' ][ $i ] )
            ) {
                $existingAmount = $_SESSION[ 'cart' ][ $i ][ 'amount' ];
                $oldFullPrice = $_SESSION[ 'cart' ][ $i ][ 'price' ] / $existingAmount;

                $_SESSION[ 'cart' ][ $i ][ 'price' ] = $oldFullPrice * $_POST[ 'amount' ];
                $_SESSION[ 'cart' ][ $i ][ 'amount' ] = $_POST[ 'amount' ];
            }
        }
        unset( $_POST );
        header( 'Location: /cart' );
    }

    /**
     * Removes desired cart item
     */
    public function removeCartItem()
    {
        var_dump( $_POST );
        for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
            if ( in_array( $_POST[ 'product_id' ], $_SESSION[ 'cart' ][ $i ] )
                && in_array( $_POST[ 'poster_size' ], $_SESSION[ 'cart' ][ $i ] )
            ) {
                array_splice( $_SESSION[ 'cart' ], $i, 1 );
            }
        }
        header( 'Location: /cart' );
    }

    /**
     * Confirm screen to input information
     *
     * If user not logged in, redirects to profile|login
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function confirm()
    {
        if (isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL && !$_SESSION['user']['email_verified']) {
            header('Location: /verify-email');
        } else {
            if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
                View::render( 'cart.confirm-order', [] );
            }
            else {
                header( 'Location: /profile' );
            }
        }
    }

    /**
     * Makes order and uploads information to corresponding tables
     */
    public function makeOrder()
    {
        if ( isset( $_POST[ 'number' ] )
            && isset( $_POST[ 'expiry' ] )
            && isset( $_POST[ 'cvc' ] )
            && isset( $_POST[ 'first-name' ] )
            && isset( $_POST[ 'last-name' ] )
            && isset( $_POST[ 'country' ] )
            && isset( $_POST[ 'city' ] )
            && isset( $_POST[ 'street' ] )
            && isset( $_POST[ 'zip-code' ] )
        ) {
            $cartController = new CartController();

            $cart = $_SESSION[ 'cart' ];

            $userId = filter_var( $_SESSION[ 'user' ][ 'id' ], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );

            $orders = [];

            $cardNumber = Filters::filterStringAndUnsetPost( 'number' );
            $mmyy = Filters::filterStringAndUnsetPost( 'expiry' );
            $cvc = Filters::filterStringAndUnsetPost( 'cvc' );
            $firstName = Filters::filterStringAndUnsetPost( 'first-name' );
            $lastName = Filters::filterStringAndUnsetPost( 'last-name' );
            $country = Filters::filterStringAndUnsetPost( 'country' );
            $city = Filters::filterStringAndUnsetPost( 'city' );
            $street = Filters::filterStringAndUnsetPost( 'street' );
            $zipCode = Filters::filterStringAndUnsetPost( 'zip-code' );

            for ( $i = 0; $i < count( $cart ); $i++ ) {
                do {
                    $orderId = rand( 1, 9999999 );
                } while ( OrdersDatabase::checkOrderIdExists( $orderId ) );

                OrdersDatabase::createInitialOrder(
                    $orderId,
                    $cart[ $i ][ 'productId' ],
                    $cart[ $i ][ 'price' ] / $cart[ $i ][ 'amount' ],
                    $cart[ $i ][ 'size' ],
                    $cart[ $i ][ 'amount' ],
                    $cart[ $i ][ 'price' ]
                );

                OrdersDatabase::connectUserToOrder( $userId, $orderId );

                OrdersDatabase::connectDestinationToOrder(
                    (int)$orderId,
                    $country,
                    $city,
                    $street,
                    (int)$zipCode
                );

                $cardOwner = $lastName . " " . $firstName;

                OrdersDatabase::connectPaymentToOrder(
                    (int)$orderId,
                    $cardNumber,
                    $mmyy,
                    (int)$cvc,
                    $cardOwner
                );

                OrdersDatabase::connectTrackingToOrder( $orderId );

                array_push( $orders, $orderId );

                SendEmail::orderConfirm(
                    $_SESSION[ 'user' ],
                    $orderId,
                    [
                        "orderId" => $orderId,
                        "country" => $country,
                        "city" => $city,
                        "street" => $street,
                        "zipCode" => $zipCode,
                    ],
                    [
                        "productId" => $cart[ $i ][ 'productId' ],
                        "unitPrice" => $cart[ $i ][ 'price' ] / $cart[ $i ][ 'amount' ],
                        "size" => $cart[ $i ][ 'size' ],
                        "amount" => $cart[ $i ][ 'amount' ],
                        "total" => $cart[ $i ][ 'price' ],
                    ]
                );
            }

            $orderString = "";
            for ( $i = 0; $i < count( $orders ); $i++ ) {
                $orderString = $orderString . "/" . $orders[ $i ];
            }

            unset( $_SESSION[ 'cart' ] );

            header( 'Location: /recent-order' . $orderString );
        }
        else {
            header( 'Location: /confirm-order' );
        }
    }

    /**
     * Displays recent orders
     *
     * @param string $ids String containing recent orders
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showOrder( string $ids )
    {
        $idArray = explode( "/", $ids );
        $orderArray = [];

        for ( $i = 0; $i < count( $idArray ); $i++ ) {
            $order = OrdersDatabase::fetchOrderData( $idArray[ $i ] );
            $orderProduct = OrdersDatabase::fetchProductById( $order[ 'product_id' ] );
            $orderTracking = OrdersDatabase::fetchTrackingData( $idArray[ $i ] );

            array_push( $orderArray, [
                "orderData" => $order,
                "product" => $orderProduct,
                "tracking" => $orderTracking,
            ] );
        }
        $payment = OrdersDatabase::fetchPaymentData( $idArray[ 0 ] );
        $payment = str_repeat( '*', strlen( $payment[ 'card_number' ] ) - 4 ) . substr( $payment[ 'card_number' ], -4 );
        $data = [
            "orders" => $orderArray,
            "destination" => OrdersDatabase::fetchDestinationData( $idArray[ 0 ] ),
            'payment' => $payment,
        ];
        View::render( 'cart.recent-order', $data );
    }

    /**
     * Shows all users orders
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showUserOrders()
    {
        if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
            $userOrders = OrdersDatabase::fetchUserOrders( $_SESSION[ 'user' ][ 'id' ] );
            $orderArray = [];
            for ( $i = 0; $i < count( $userOrders ); $i++ ) {
                $order = OrdersDatabase::fetchOrderData( $userOrders[ $i ][ 'order_id' ] );
                $orderProduct = OrdersDatabase::fetchProductById( $order[ 'product_id' ] );
                $orderTracking = OrdersDatabase::fetchTrackingData( $userOrders[ $i ][ 'order_id' ] );
                $payment = OrdersDatabase::fetchPaymentData( $userOrders[ $i ][ 'order_id' ] );
                $payment = str_repeat( '*', strlen( $payment[ 'card_number' ] ) - 4 ) . substr( $payment[ 'card_number' ], -4 );
                array_push( $orderArray, [
                    "orderData" => $order,
                    "product" => $orderProduct,
                    "tracking" => $orderTracking,
                    'destination' => OrdersDatabase::fetchDestinationData( $userOrders[ $i ][ 'order_id' ] ),
                    'payment' => $payment,
                ] );
            }
            $data = [
                "orders" => $orderArray,
            ];
            View::render( 'cart.show-user-orders', $data );
        }
        else {
            header( 'Location: /profile' );
        }
    }
}