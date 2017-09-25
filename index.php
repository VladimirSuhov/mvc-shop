<?php

//FORNT CONTROLLER

// 1. Common settings
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

// 2. Connecting system files
    define('ROOT', dirname(__FILE__));
    require_once (ROOT.'/components/Router.php');

// 3. Enable DB connection

// 4. Call the router
    $router = new Router();
    $router->run();