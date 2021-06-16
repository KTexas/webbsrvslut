<?php
/**
 * Main controller for the website
 *
 * Controls most functions for displaying content outside of the cart and profile
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   MainController
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

use App\Filters;
use App\View;
use App\Database;
use App\OrdersDatabase;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class MainController
 *
 * @category MainController
 * @package  App\Controllers
 * @author   Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class MainController
{
    /**
     * Private variable containing the quantity of cart items
     *
     * @var int|mixed $_cartAmount
     */
    private int $_cartAmount;

    /**
     * MainController constructor.
     *
     * @author Kevin Kvissberg <kevkvi879@edu.linkoping.se>
     */
    public function __construct()
    {
        $amount = 0;
        if ( isset( $_SESSION[ 'cart' ] ) && $_SESSION[ 'cart' ] !== NULL ) {
            for ( $i = 0; $i < count( $_SESSION[ 'cart' ] ); $i++ ) {
                $amount += $_SESSION[ 'cart' ][ $i ][ 'amount' ];
            }
        }
        $this->_cartAmount = $amount;
    }

    /**
     * Displays current top 3 posters based on likes
     * If user is logged in, has orders that has not arrived,
     * and has 'show_index_orders' checked,
     * will display users current orders on homepage
     *
     * @return null
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function index()
    {
        $main = new MainController();
        if ( isset( $_SESSION[ 'user' ] )
            && $_SESSION[ 'user' ] !== NULL
            && $_SESSION[ 'user' ][ 'show_index_orders' ]
        ) {
            $userOrders = OrdersDatabase::fetchUserOrders(
                $_SESSION[ 'user' ][ 'id' ]
            );
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
                'posters' => Database::fetchLimitProductsOnLikes( 3 ),
                'user' => $_SESSION[ 'user' ],
                'liked' => Database::fetchLikedProductsByUserId( $_SESSION[ 'user' ][ 'id' ] ),
                'cartAmount' => $main->_cartAmount,
            ];
        }
        else {
            $data = [
                'posters' => Database::fetchLimitProductsOnLikes( 3 ),
                'user' => NULL,
                'liked' => -1,
                'cartAmount' => $main->_cartAmount,
            ];
        }
        View::render( "index", $data );
    }

    /**
     * Fetch products in order and certain orders
     * @param array $ids   Ids of products or all products
     * @param int   $order Column to order by
     * @return array
     */
    private static function fetchProductsColorOrder( array $ids, int $order )
    {
        $desc = FALSE;
        switch ( $order ) {
            case '0':
                $column = "name";
                break;
            case '1':
                $column = 'extra_price';
                break;
            case '2':
                $column = 'extra_price';
                $desc = TRUE;
                break;
            case '3':
                $column = 'likes';
                $desc = TRUE;
                break;
            default:
                $column = 'name';
                $order = 0;
                break;
        }
        return [
            "dataFetch" => Database::fetchAllProductsByOrder( $ids, $column, $desc ? 'desc' : 'asc' ),
            "selectedOrder" => $order,
        ];
    }

    /**
     * Displays main page of all content
     * Has the ability to sort and filter products
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function posters()
    {
        unset( $dataFetch );
        $dataFetch[ 0 ] = NULL;
        $selectedColor = 0;
        $selectedOrder = 0;
        if ( isset( $_SESSION[ 'user' ] ) && !( isset( $_GET[ 'search' ] ) || isset( $_GET[ 'color' ] ) || isset( $_GET[ 'order' ] ) ) ) {
            $fetch = self::fetchProductsColorOrder( [ 'all' ], $_SESSION[ 'user' ][ 'default_order' ] );
            $dataFetch = $fetch[ 'dataFetch' ];
            $selectedOrder = $fetch[ 'selectedOrder' ];
        }
        else {
            if ( isset( $_GET[ 'search' ] ) || isset( $_GET[ 'color' ] ) ) {
                if ( isset( $_GET[ 'search' ] ) && $_GET['search'] !== "" ) {
                    $query = Filters::filterString($_GET['search']);
                    $dataFetch = Database::fetchProductLikeName( $query );
                }
                if ( isset( $_GET[ 'color' ] ) || isset( $_GET[ 'order' ] ) ) {
                    unset( $dataFetch );
                    $queryColor = filter_var(
                        $_GET[ 'color' ],
                        FILTER_SANITIZE_STRING,
                        FILTER_FLAG_STRIP_LOW
                    );
                    $intProductIds = [ NULL ];
                    $intProductIds[ 0 ] = 'all';
                    if ( $queryColor !== 'all' ) {
                        $intColor = Database::fetchColor( $queryColor );
                        $selectedColor = $intColor[ 'id' ];
                        $productIds = Database::fetchProductIdByColorId( $intColor[ 'id' ] );
                        $intProductIds = [ 0 ];
                        if ( count( $productIds ) > 0 ) {
                            $intProductIds = [];
                            for ( $i = 0; $i < count( $productIds ); $i++ ) {
                                $intProductIds[ $i ] = $productIds[ $i ][ 'product_id' ];
                            }
                        }
                    }
                    $order = filter_var(
                        $_GET[ 'order' ],
                        FILTER_SANITIZE_STRING,
                        FILTER_FLAG_STRIP_LOW
                    );

                    unset( $dataFetch );

                    $fetch = self::fetchProductsColorOrder( $intProductIds, $order );
                    $dataFetch = $fetch[ 'dataFetch' ];
                    $selectedOrder = $fetch[ 'selectedOrder' ];
                }
            }
            else {
                $dataFetch = Database::fetchAllProducts();
            }
        }

        $main = new MainController();
        if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
            $data = [
                'posters' => $dataFetch,
                'user' => $_SESSION[ 'user' ],
                'liked' => Database::fetchLikedProductsByUserId( $_SESSION[ 'user' ][ 'id' ] ),
                'cartAmount' => $main->_cartAmount,
                'colors' => Database::fetchColors(),
                'selectedColor' => $selectedColor,
                'selectedOrder' => $selectedOrder,
                'url' => $_SERVER[ "REQUEST_URI" ],
            ];
        }
        else {
            $data = [
                'posters' => $dataFetch,
                'user' => NULL,
                'liked' => -1,
                'cartAmount' => $main->_cartAmount,
                'colors' => Database::fetchColors(),
                'selectedColor' => $selectedColor,
                'selectedOrder' => $selectedOrder,
                'url' => $_SERVER[ "REQUEST_URI" ],
            ];
        }
        View::render( "main.posters", $data );
    }

    /**
     * @param string $vars Contains data on what product is supposed to be displayed
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function posterDetails( string $vars )
    {
        $main = new MainController();
        $poster = str_replace( '-', ' ', $vars );

        $data = [
            'poster' => Database::fetchProductByName( $poster ),
            'cartAmount' => $main->_cartAmount,
            'url' => $vars . "-poster",
            'addCartAnim' => isset( $_SESSION[ 'animations' ][ 'addCart' ] ),
        ];
        unset( $_SESSION[ 'animations' ][ 'addCart' ] );
        View::render( 'main.poster-details', $data );
    }

    public function likedProducts()
    {
        if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL && !$_SESSION[ 'user' ][ 'email_verified' ] ) {
            header( 'Location: /verify-email' );
        }
        else {
            $main = new MainController();
            if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
                $userId = filter_var( $_SESSION[ 'user' ][ 'id' ], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
                $likedProductIds = Database::fetchLikedProductsByUserId( $userId );
                $likedProducts = [];
                for ( $i = 0; $i < count( $likedProductIds ); $i++ ) {
                    array_push( $likedProducts, Database::fetchProductById( $likedProductIds[ $i ][ 'product_id' ] ) );
                }
                $data = [
                    'posters' => $likedProducts,
                    'cartAmount' => $main->_cartAmount,
                ];
                View::render( "main.liked-products", $data );
            }
            else {
                header( 'Location: /profile' );
            }
        }
    }

    /**
     * Likes poster and connects user to that product in liked_products table
     * If user is not logged in, function redirects user to login page
     */
    public function likeProduct()
    {
        if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL && !$_SESSION[ 'user' ][ 'email_verified' ] ) {
            header( 'Location: /verify-email' );
        }
        else {
            $posterId = Filters::filterStringAndUnsetPost( 'poster_id' );
            $isLiked = Filters::filterStringAndUnsetPost( 'poster_liked' );
            $location = Filters::filterStringAndUnsetPost( 'location' );
            if ( isset( $_SESSION[ 'user' ] ) && $_SESSION[ 'user' ] !== NULL ) {
                if ( isset( $_SESSION[ 'user' ][ 'id' ] ) ) {
                    $userId = $_SESSION[ 'user' ][ 'id' ];

                    $userId = trim( $userId );
                    $userId = strtolower( $userId );
                    $userId = filter_var( $userId, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );
                    $posterId = filter_var( $posterId, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW );

                    if ( $isLiked !== 'false' ) {
                        Database::updateLikes( -1, $posterId );
                        Database::removeUserLike( $userId, $posterId );
                    }
                    else {
                        Database::likePoster( $userId, $posterId );
                        Database::updateLikes( 1, $posterId );
                    }
                    header( 'Location: ' . $location );
                }
                else {
                    header( 'Location: /profile' );
                }
            }
            else {
                header( 'Location: /profile' );
            }
        }
    }

    /**
     * Currently not in use
     */
    public function contact()
    {
        View::render( "main.contact", [] );
    }

    /**
     * Search page that allows user to search for specific products,
     * also sends data to screen for suggested search query's
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function search()
    {
        $names = Database::fetchAllProductsByOrder( [ 'all' ], 'name' );

        for ( $i = 0; $i < count( $names ); $i++ ) {
            $names[ $i ] = $names[ $i ][ 'name' ];
        }
        $data = [
            "products" => $names,
        ];
        View::render( 'main.search', $data );
    }
}