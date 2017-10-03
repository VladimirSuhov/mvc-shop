<?php

class User
{
    public static function register($name, $email, $password) {

        $db = DB::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkUserData($email, $password) {

        $db = DB::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password',$password, PDO::PARAM_STR);

        $result->execute();

        $user = $result->Fetch();
        if($user) {
            return $user['id'];
        }
            return false;
    }

    public static function auth($userId) {
        session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {
        session_start();

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header('location: /user/login');
    }

    public static function isGuest() {

        if (isset($_SESSION['user'])) {
            return false;
        }
            return true;
    }

    public static function getUserById($userId) {

        $id = intval($userId);

        if($id) {

            $db = DB::getConnection();

            $result = $db->query('SELECT * FROM user WHERE id=' . $userId);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();

        }
    }



    /*
     * Check if name less than 2 symbols
     */

    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /*
 * Check if password less than 6 symbols
 */

    public static function checkPassword($name) {
        if (strlen($name) >= 6) {
            return true;
        }
        return false;
    }

    /*
 * Check email
 */

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExsists($email) {

        $db = DB::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function edit($userId, $name, $password) {

        $db = DB::getConnection();

        $sql = 'UPDATE user SET name = :name, password = :';

        $result = $db->prepare($sql);
        $result->bindParam(':id',$userId, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
}