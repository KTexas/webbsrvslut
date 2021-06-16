<?php
/**
 * This is the database for todo
 *
 * PHP version 5
 *
 * @category Database
 * @package  Example
 * @author   Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  CVS: <cvs_id>
 * @link     http://pear.php.net/package/PackageName
 */

/**
 * Database
 *
 * Database class for the app
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Database
 * @package   App
 * @author    Kevin Kvissberg <kevkvi879@edu.linkoping.se>
 * @copyright 2020-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0
 * @link      http://pear.php.net/package/PackageName
 * @see       NetOther, Net_Sample::Net_Sample()
 */

namespace App;

use PDO;

class Database
{

    /**
     * For the database
     *
     * @var PDO
     */
    public PDO $_pdo;

    /**
     * Database constructor.
     *
     * Handles construction of Database
     */
    public function __construct()
    {
        $dsn = "pgsql:
                host=localhost;
                port=5432;
                dbname=helish;
                user=postgres;
                password=postgres";

        $this->_pdo = new PDO( $dsn );
        $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $this->_pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
    }

    /**
     * Fetches all products
     * @return array
     */
    public static function fetchAllProducts()
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM products ORDER BY name" );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches limited amount of products based on likes
     * @param int $amount Amount of products to be fetched
     * @return array
     */
    public static function fetchLimitProductsOnLikes( int $amount )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM products ORDER BY likes DESC LIMIT :amount" );
        $stmt->bindParam( ':amount', $amount );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param array  $ids            Array of product id | = 'all' and returns all products
     * @param string $orderColumn    Column to be ordered by
     * @param string $orderDirection Direction ASC by default or DESC if specified
     * @return array
     */
    public static function fetchAllProductsByOrder( array $ids, string $orderColumn, string $orderDirection = 'asc' )
    {
        $order = $orderColumn . ' ' . $orderDirection;
        $database = new Database();
        if ( $ids[ 0 ] !== 'all' ) {
            $stmt = $database->_pdo->prepare( "
            SELECT * FROM products WHERE id IN (" . implode( ',', $ids ) . ") ORDER BY 
                CASE when :order = 'id asc' THEN id end ASC ,
                CASE when :order = 'name asc' THEN name end ASC ,
                CASE when :order = 'extra_price asc' THEN  extra_price end ASC ,
                CASE when :order = 'extra_price desc' THEN extra_price end DESC ,
                CASE when :order = 'likes desc' THEN likes end DESC" );
        }
        else {
            $stmt = $database->_pdo->prepare( "
            SELECT * FROM products ORDER BY 
                CASE when :order = 'id asc' THEN id end ASC ,
                CASE when :order = 'name asc' THEN name end ASC ,
                CASE when :order = 'extra_price asc' THEN  extra_price end ASC ,
                CASE when :order = 'extra_price desc' THEN extra_price end DESC ,
                CASE when :order = 'likes desc' THEN likes end DESC" );
        }
        $stmt->bindParam( ':order', $order );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function fetchAllProductsContainingString( string $string )
    {
        $database = new Database();
        $string = "%" . $string . "%";
        $stmt = $database->_pdo->prepare("
            SELECT * FROM products 
                WHERE
                    CAST(id as varchar(255)) LIKE :string
                OR 
                    UPPER(name) LIKE UPPER(:string)
                OR 
                    CAST(extra_price as varchar(255)) LIKE :string
                OR 
                    CAST(likes as varchar(255)) LIKE :string
                ORDER BY id
        ");
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches product by name
     * @param string $name Name of product
     * @return mixed
     */
    public static function fetchProductByName( string $name )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM products where UPPER(name) = UPPER(:name)" );
        $stmt->bindParam( ':name', $name );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches all product that has the specified string in its name
     * @param string $name string containing name or just a string
     * @return array
     */
    public static function fetchProductLikeName( string $name )
    {
        $database = new Database();
        $name = '%' . $name . '%';
        $stmt = $database->_pdo->prepare( "SELECT * FROM products where UPPER(name) like UPPER(:name)" );
        $stmt->bindParam( ':name', $name );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches all products based on color id
     * @param int $colorId Id of color
     * @return array
     */
    public static function fetchProductIdByColorId( int $colorId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM product_color where :color_id = color_id" );
        $stmt->bindParam( ':color_id', $colorId );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function fetchAllProductColors( int $productId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare("SELECT color_id FROM product_color WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches all products based on their id
     * @param string $id Id of product
     * @return mixed
     */
    public static function fetchProductById( string $id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM products where id = :id" );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches color data based on color name
     * @param string $colorName
     * @return mixed
     */
    public static function fetchColor( string $colorName )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM colors where UPPER(:color_name) = UPPER(name)" );
        $stmt->bindParam( ':color_name', $colorName );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Connects user and poster in liked_products table
     * @param int $userId    User id
     * @param int $productId Poster id
     * @return bool
     */
    public static function likePoster( int $userId, int $productId ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO liked_products (user_id, product_id) 
            values (:user_id, :product_id)"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':product_id', $productId );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Updates product likes to specified amount
     * @param int $amount amount of added|removed likes
     * @param int $id     Id of product
     * @return bool
     */
    public static function updateLikes( int $amount, int $id ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE products
            SET 
                likes = likes + :amount
            WHERE
                id = :id"
        );
        $stmt->bindParam( ':amount', $amount );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Removes connection between product and user in liked_products table
     * @param int $userId    User id
     * @param int $productId Product id
     * @return bool
     */
    public static function removeUserLike( int $userId, int $productId ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "DELETE FROM liked_products 
            WHERE 
                  user_id = :user_id
                AND 
                    product_id = :product_id"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':product_id', $productId );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Fetches all products that a user has liked
     * @param int $userId User id
     * @return array
     */
    public static function fetchLikedProductsByUserId( int $userId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "SELECT * 
            FROM liked_products 
            WHERE user_id = :user_id"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches all colors and order them by id
     * @return array
     */
    public static function fetchColors()
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM colors order by id" );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function updateProductColors( int $productId, array $colorIDs )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "DELETE FROM product_color 
            WHERE 
                  product_id = :product_id"
        );
        $stmt->bindParam( ':product_id', $productId );
        $stmt->execute();

        for ($i = 0; $i < count($colorIDs); $i++) {
            $stmt = $database->_pdo->prepare(
                "INSERT INTO product_color(product_id, color_id) 
                    VALUES (:product_id, :color_id)"
            );
            $stmt->bindParam( ':product_id', $productId );
            $stmt->bindParam( ':color_id', $colorIDs[$i] );
            $stmt->execute();
        }
        return TRUE;
    }

    /**
     * @param int    $id
     * @param string $name
     * @param int    $price
     * @param int    $likes
     * @param string $image
     * @return mixed
     */
    public static function updateProduct(
        int $id,
        string $name,
        int $price,
        int $likes,
        string $image
    )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE products 
                        SET 
                           name = :name,
                           extra_price = :price,
                           likes = :likes,
                           image = :image
                       WHERE 
                            id = :id"
        );
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':name', $name );
        $stmt->bindParam( ':price', $price );
        $stmt->bindParam( ':likes', $likes );
        $stmt->bindParam( ':image', $image );
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function postPoster(
        string $name,
        int $price,
        int $likes,
        string $image,
        array $colors
    )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO products( name, extra_price, image, likes) 
                    VALUES (:name, :price, :image, :likes) "
        );
        $stmt->bindParam( ':name', $name );
        $stmt->bindParam( ':price', $price );
        $stmt->bindParam( ':likes', $likes );
        $stmt->bindParam( ':image', $image );
        $stmt->execute();

        $id = self::fetchProductByName($name);
        self::updateProductColors($id['id'], $colors);

        return TRUE;
    }

    public static function deletePoster( int $id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "DELETE FROM products WHERE id = :id"
        );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();

        return TRUE;
    }
}
