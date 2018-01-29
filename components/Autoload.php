<?php

function __autoload($class_name) {

    // List of all class directories

    $array_path = array(
        '/models/',
        '/components/',
        '/libs/PHPExcel',
        '/libs/'
    );

    foreach ($array_path as $path) {
        $path = ROOT . $path .$class_name . '.php';
        if(is_file($path)) {
            include_once $path;
        }
    }
}