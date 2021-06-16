<?php

namespace App;

class OrdersDatabase extends Database
{
    /**
     * Checks if order id exists in orders
     * @param int $id Id of order to compare
     * @return mixed
     */
    public static function checkOrderIdExists( int $id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT id FROM orders WHERE id = :id" );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Creates initial order for user and inserts to database
     * @param int    $orderId
     * @param int    $productId
     * @param int    $unit_price
     * @param string $size
     * @param int    $qty
     * @param int    $total
     * @return bool
     */
    public static function createInitialOrder(
        int $orderId,
        int $productId,
        int $unit_price,
        string $size,
        int $qty,
        int $total
    ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO orders(id, product_id, unit_price, size, qty, total) 
           values (:order_id, :product_id, :unit_price, :size, :qty, :total)"
        );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->bindParam( ':product_id', $productId );
        $stmt->bindParam( ':unit_price', $unit_price );
        $stmt->bindParam( ':size', $size );
        $stmt->bindParam( ':qty', $qty );
        $stmt->bindParam( ':total', $total );
        $stmt->execute();

        return TRUE;
    }

    /**
     * Connects user to order
     * @param int $userId
     * @param int $orderId
     * @return bool
     */
    public static function connectUserToOrder( int $userId, int $orderId ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO order_user (user_id, order_id)
            values (:user_id, :order_id)"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Connects order to destination
     * @param int    $orderId
     * @param string $country
     * @param string $city
     * @param string $address
     * @param int    $postAddress
     * @return bool
     */
    public static function connectDestinationToOrder(
        int $orderId,
        string $country,
        string $city,
        string $address,
        int $postAddress
    ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO order_destination (order_id, country, city, street, zip_code)
            values (:order_id, :country, :city, :address, :post_address)"
        );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->bindParam( ':country', $country );
        $stmt->bindParam( ':city', $city );
        $stmt->bindParam( ':address', $address );
        $stmt->bindParam( ':post_address', $postAddress );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Connects order to payment data
     * @param int    $orderId
     * @param string $cardNumber
     * @param string $mmyy
     * @param int    $cvc
     * @param string $owner
     * @return bool
     */
    public static function connectPaymentToOrder(
        int $orderId,
        string $cardNumber,
        string $mmyy,
        int $cvc,
        string $owner
    ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO order_payment (order_id, card_number, mmyy, cvc, owner)
            values (:order_id, :card_number, :mmyy, :cvc, :owner)"
        );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->bindParam( ':card_number', $cardNumber );
        $stmt->bindParam( ':mmyy', $mmyy );
        $stmt->bindParam( ':cvc', $cvc );
        $stmt->bindParam( ':owner', $owner );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Connects order to tracking
     * @param int $orderId
     * @return bool
     */
    public static function connectTrackingToOrder( int $orderId ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO order_tracking (order_id, status)
            values (:order_id, 'ordered')"
        );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Fetches all order ids that are connected to user
     * @param int $userId
     * @return array
     */
    public static function fetchUserOrders( int $userId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM order_user WHERE :user_id = user_id" );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches order data based on id
     * @param int $id
     * @return mixed
     */
    public static function fetchOrderData( int $id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM orders WHERE :id = id" );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches destination data based on id
     * @param int $orderId
     * @return mixed
     */
    public static function fetchDestinationData( int $orderId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM order_destination WHERE :order_id = order_id" );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches payment data based on id
     * @param int $orderId
     * @return mixed
     */
    public static function fetchPaymentData( int $orderId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM order_payment WHERE :order_id = order_id" );
        $stmt->bindParam( ':order_id', $orderId );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches tracking data based on id
     * @param int $order_id
     * @return mixed
     */
    public static function fetchTrackingData( int $order_id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM order_tracking WHERE :order_id = order_id" );
        $stmt->bindParam( ':order_id', $order_id );
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function fetchAllOrdersWithData( array $IDs = [ 'all' ] )
    {
        $database = new Database();
        if ( count( $IDs ) == 0 ) {
            return FALSE;
        }
        else if ( $IDs[ 0 ] == 'all' ) {
            $stmt = $database->_pdo->prepare( "SELECT * FROM orders ORDER BY id" );
        }
        else {
            $stmt = $database->_pdo->prepare( "SELECT * FROM orders WHERE id IN (" . implode( ',', $IDs ) . ") ORDER BY id" );
        }
        $stmt->execute();
        $allOrders = $stmt->fetchAll();

        $completeOrders = [];

        for ( $i = 0; $i < count( $allOrders ); $i++ ) {
            $stmt = $database->_pdo->prepare( "SELECT * FROM order_user WHERE order_id = :order_id" );
            $stmt->bindParam( ":order_id", $allOrders[ $i ][ 'id' ] );
            $stmt->execute();
            $orderUser = $stmt->fetch();

            $stmt = $database->_pdo->prepare( "SELECT * FROM order_tracking WHERE order_id = :order_id" );
            $stmt->bindParam( ":order_id", $allOrders[ $i ][ 'id' ] );
            $stmt->execute();
            $orderTracking = $stmt->fetch();

            $stmt = $database->_pdo->prepare( "SELECT * FROM order_destination WHERE order_id = :order_id" );
            $stmt->bindParam( ":order_id", $allOrders[ $i ][ 'id' ] );
            $stmt->execute();
            $orderDestination = $stmt->fetch();

            $stmt = $database->_pdo->prepare( "SELECT * FROM order_payment WHERE order_id = :order_id" );
            $stmt->bindParam( ":order_id", $allOrders[ $i ][ 'id' ] );
            $stmt->execute();
            $orderPayment = $stmt->fetch();

            $completeOrders[ $i ] = [
                "user" => $orderUser[ 'user_id' ],
                "data" => $allOrders[ $i ],
                "tracking" => $orderTracking,
                "destination" => $orderDestination,
                "payment" => $orderPayment,
            ];
        }
        return $completeOrders;
    }

    public static function fetchAllOrdersContainingString( string $string )
    {
        $database = new Database();


        $string = '%' . $string . '%';
        $stmt = $database->_pdo->prepare( "
            SELECT * FROM orders 
                WHERE 
                    CAST(id as varchar(255)) like :string
                OR
                    CAST(product_id as varchar(255)) like :string
                OR
                    CAST(unit_price as varchar(255)) like :string
                OR
                    CAST(total as varchar(255)) like :string
                OR
                    CAST(qty as varchar(255)) like :string"
        );
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        $orders = $stmt->fetchAll();

        $stmt = $database->_pdo->prepare( "
            SELECT * FROM order_user 
                WHERE 
                    CAST(user_id as varchar(255)) like :string"
        );
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        $users = $stmt->fetchAll();

        $stmt = $database->_pdo->prepare( "
            SELECT * FROM order_tracking 
                WHERE 
                    CAST(order_date as varchar(255)) like UPPER(:string)
                OR
                    CAST(received_date as varchar(255)) like UPPER(:string)
                OR
                    UPPER(status) like UPPER(:string)"
        );
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        $tracking = $stmt->fetchAll();

        $stmt = $database->_pdo->prepare( "
            SELECT * FROM order_destination 
                WHERE 
                    UPPER(country) like UPPER(:string)
                OR
                    UPPER(city) like UPPER(:string)
                OR
                    UPPER(street) like UPPER(:string)
                OR
                    CAST(zip_code as varchar(255)) like UPPER(:string)"
        );
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        $destination = $stmt->fetchAll();
        $unfilteredIDs = [];

        for ( $i = 0; $i < count( $orders ); $i++ ) {
            array_push( $unfilteredIDs, $orders[ $i ][ 'id' ] );
        }
        for ( $i = 0; $i < count( $users ); $i++ ) {
            array_push( $unfilteredIDs, $users[ $i ][ 'order_id' ] );
        }
        for ( $i = 0; $i < count( $tracking ); $i++ ) {
            array_push( $unfilteredIDs, $tracking[ $i ][ 'order_id' ] );
        }
        for ( $i = 0; $i < count( $destination ); $i++ ) {
            array_push( $unfilteredIDs, $destination[ $i ][ 'order_id' ] );
        }
        $filteredIDs = array_unique( $unfilteredIDs );

//        $completeList = [];
//        $user = "";
//        for ($i = 0; $i < count($filteredIDs); $i++) {
//            var_dump($filteredIDs[$i]);
//            $user = array_keys(array_column($users, 'order_id'), $filteredIDs[$i]);
//
//
//
////            array_push($completeList, [
////                "user" => $user['user_id'],
////                "data" => array_keys(array_column($orders, 'order_id'), $filteredIDs[$i]),
////                "tracking" => array_keys(array_column($tracking, 'order_id'), $filteredIDs[$i]),
////                "destination" => array_keys(array_column($destination, 'order_id'), $filteredIDs[$i]),
////                "payment" => [],
////            ]);
//        }
//
//        return $completeList;

        return self::fetchAllOrdersWithData( $filteredIDs );

    }
}