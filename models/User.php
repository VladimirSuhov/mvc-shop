<?php

class User
{
    public static function register($name, $email, $password) {

        $db = DB::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name',$email, PDO::PARAM_STR);
        $result->bindParam(':email',$email, PDO::PARAM_STR);
        $result->bindParam(':password',$email, PDO::PARAM_STR);

        return $result->execute();
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
}