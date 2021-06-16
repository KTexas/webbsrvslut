<?php

/**
 * Index and controller for website
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Home
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

require '../vendor/autoload.php';
require '../app/Database.php';

use App\View;
use FastRoute\RouteCollector;

session_start();
$dispatcher = FastRoute\simpleDispatcher( function ( FastRoute\RouteCollector $r ) {
    // MAIN - GET
    $r->get( '/', 'MainController::index' );
    $r->get( '/posters', 'MainController::posters' );
    $r->get( '/{name}-poster', 'MainController::posterDetails' );
    $r->get( '/liked-products', 'MainController::likedProducts' );
    $r->get( '/search', 'MainController::search' );
    $r->get( '/contact', 'MainController::contact' );

    // MAIN - POST
    $r->post( '/like-poster', 'MainController::likeProduct' );

    // CART | ORDERS - GET
    $r->get( '/cart', 'CartController::index' );
    $r->get( '/confirm-order', 'CartController::confirm' );
    $r->get( '/recent-order/{id:\d.+}', 'CartController::showOrder' );
    $r->get( '/your-orders', 'CartController::showUserOrders' );

    // CART | ORDERS - POST
    $r->post( '/add-cart', 'CartController::addCart' );
    $r->post( '/change-cart-item-amount', 'CartController::changeItemAmount' );
    $r->post( '/remove-cart-item', 'CartController::removeCartItem' );
    $r->post( '/make-order', 'CartController::makeOrder' );

    // PROFILE | USER - GET
    $r->get( '/profile', 'ProfileController::index' );
    $r->get( '/create-profile', 'ProfileController::createUser' );
    $r->get( '/log-out', 'ProfileController::logOut' );
    $r->get( '/log-in', 'ProfileController::logIn' );
    $r->get( '/verify-email', 'ProfileController::verifyEmail' );
    $r->post( '/verify-email', 'ProfileController::verifyEmail' );
    $r->post( '/send-new-verify-code', 'ProfileController::newEmailCode' );

    $r->addGroup('/forgot-password', function (RouteCollector $r) {
        $r->get( '', 'ProfileController::forgotPassword' );

        $r->post( '/cancel', 'ProfileController::cancelForgotPassword' );
        $r->post( '/sendCode', 'ProfileController::sendForgotPasswordCode' );
        $r->post( '/compareCode', 'ProfileController::compareResetCode' );
        $r->post( '/update-password', 'ProfileController::updateUserPassword' );

    });

    // PROFILE | USER - POST
    $r->post( '/log-in-user', 'ProfileController::logInUser' );
    $r->post( '/post-user', 'ProfileController::postUser' );
    $r->post( '/change-setting', 'ProfileController::changeUserSettings' );

    // ADMIN - GET
    $r->addGroup('/admin', function (RouteCollector $r) {
        $r->get( '', 'AdminController::index' );
        $r->get('/all-orders', 'AdminController::allOrders');
        $r->get('/all-users', 'AdminController::allUsers');
        $r->get('/user/{id}', 'AdminController::displayUser');
        $r->get('/user/{id}/edit', 'AdminController::editUser');
        $r->get('/all-products', 'AdminController::allProducts');
        $r->get('/products/{name}-poster', 'AdminController::editPoster');
        $r->get('/add-product', 'AdminController::addProduct');

        $r->post('/update-user', 'AdminController::updateUser');
        $r->post('/update-poster', 'AdminController::updatePoster');
        $r->post('/add-product/post', 'AdminController::postProduct');
        $r->post('/products/delete-product', 'AdminController::deleteProduct');
    });

    // ADMIN - POST
} );

// Fetch method and URI from somewhere
$httpMethod = $_SERVER[ 'REQUEST_METHOD' ];
$uri = $_SERVER[ 'REQUEST_URI' ];

// Strip query string (?foo=bar) and decode URI
if ( FALSE !== $pos = strpos( $uri, '?' ) ) {
    $uri = substr( $uri, 0, $pos );
}
$uri = rawurldecode( $uri );

$routeInfo = $dispatcher->dispatch( $httpMethod, $uri );
switch ( $routeInfo[ 0 ] ) {
    case FastRoute\Dispatcher::NOT_FOUND:
        View::render( "404", [] );
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[ 1 ];
        header( 'Location: /' );
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[ 1 ];
        $vars = $routeInfo[ 2 ];

        [ $class, $method ] = explode( '::', $handler );
        $class = 'App\\Controllers\\' . $class;
        call_user_func_array( [ new $class, $method ], $vars );

        break;
}