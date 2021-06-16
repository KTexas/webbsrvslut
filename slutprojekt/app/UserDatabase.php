<?php

namespace App;

use PDO;

class UserDatabase extends Database
{
    /**
     * Post a user to database
     * @param string $email    Email
     * @param string $fname    First Name
     * @param string $lname    Last Name
     * @param string $password Hashed Password
     * @return bool
     */
    public static function createUser(
        string $email,
        string $fname,
        string $lname,
        string $password
    ) : bool
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO users (fname, lname, email, password)
            values (:fname, :lname, :email, :password)"
        );
        $stmt->bindParam( ':fname', $fname );
        $stmt->bindParam( ':lname', $lname );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':password', $password );
        $stmt->execute();
        return TRUE;
    }

    /**
     * Logs in user based on email and password
     * @param string $email    Email
     * @param string $password Hashed Password
     * @return mixed
     */
    public static function logInUser( string $email, string $password )
    {
        $database = new Database();

        $stmt = $database->_pdo->prepare(
            "SELECT * 
            FROM users 
            WHERE email = :email 
              AND password = :password"
        );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':password', $password );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Checks if user exists based on email
     * @param string $email Email
     * @return mixed
     */
    public static function checkUserExists( string $email )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "SELECT * 
            FROM users 
            WHERE email = :email"
        );
        $stmt->bindParam( ':email', $email );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Changes users settings based on user id
     * @param int   $userId   USER ID
     * @param array $settings Array of all settings
     * @return mixed
     */
    public static function changeUserSettings( int $userId, array $settings )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE users 
                    SET show_index_orders = :show_index_orders,
                        default_order = :default_order
                    WHERE
                        id = :user_id"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':show_index_orders', $settings[ 0 ], PDO::PARAM_BOOL );
        $stmt->bindParam( ':default_order', $settings[ 1 ] );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Updates user information
     *
     * @param int    $userId
     * @param string $email
     * @param string $fname
     * @param string $lname
     * @param bool   $isAdmin
     * @return mixed
     */
    public static function updateUserInfo(
        int $userId,
        string $email,
        string $fname,
        string $lname,
        bool $isAdmin
    )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE users 
                    SET 
                        email = :email,
                        fname = :fname,
                        lname = :lname,
                        is_admin = :is_admin
                    WHERE
                        id = :user_id"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':fname', $fname );
        $stmt->bindParam( ':lname', $lname );
        $stmt->bindParam( ':is_admin', $isAdmin, PDO::PARAM_BOOL );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Fetches all users
     * @return array
     */
    public static function fetchAllUsers()
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM users ORDER BY id" );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param string $string
     * @return array
     */
    public static function fetchUserContainingString( string $string )
    {
        $database = new Database();
        $string = '%' . $string . '%';
        $stmt = $database->_pdo->prepare( "
            SELECT * FROM users 
                WHERE 
                    CAST(id as varchar(255)) like :string
                OR
                    UPPER(email) like UPPER(:string)
                OR
                    UPPER(fname) like UPPER(:string)
                OR
                    UPPER(lname) like UPPER(:string)"
        );
        $stmt->bindParam( ':string', $string );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Fetches user based on id
     * @param int $id
     * @return array
     */
    public static function fetchUserById( int $id )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare( "SELECT * FROM users WHERE id = :id ORDER BY id" );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function pushResetCode( int $userId, int $code )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO user_reset_code(user_id, reset_code) 
                            values (:user_id, :code)"
        );
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return TRUE;
    }

    public static function fetchResetCode( int $userId, int $code )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "SELECT * FROM user_reset_code
                        WHERE
                            :user_id = user_id
                        AND
                            :code = reset_code"
        );
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function removeResetCode( int $userId )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "DELETE FROM user_reset_code
                        WHERE
                            :user_id = user_id"
        );
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return TRUE;
    }

    public static function pushEmailVerifyCode( string $email, int $code )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "INSERT INTO verify_email_code(email, code) 
                            values (:email, :code)"
        );
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return TRUE;
    }

    public static function fetchEmailVerifyCode( string $email, int $code )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "SELECT * FROM verify_email_code
                        WHERE
                            email = :email
                        AND
                            code = :code"
        );
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $stmt->fetch();
    }


    public static function removeEmailVerifyCode( string $email )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "DELETE FROM verify_email_code
                        WHERE
                            :email = email"
        );
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return TRUE;
    }

    public static function updateUserEmailVerify( bool $bool, string $email )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE users 
                    SET 
                        email_verified = :bool
                    WHERE
                        email = :email"
        );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':bool', $bool, PDO::PARAM_BOOL  );
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @param int    $userId
     * @param string $password
     * @return mixed
     */
    public static function updateUserPassword(
        int $userId,
        string $password
    )
    {
        $database = new Database();
        $stmt = $database->_pdo->prepare(
            "UPDATE users 
                    SET 
                        password = :password
                    WHERE
                        id = :user_id"
        );
        $stmt->bindParam( ':user_id', $userId );
        $stmt->bindParam( ':password', $password );
        $stmt->execute();
        return $stmt->fetch();
    }
}