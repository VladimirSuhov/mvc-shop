<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 27.09.2017
 * Time: 2:52
 */
class DB
{
    public static function getConnection() {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}