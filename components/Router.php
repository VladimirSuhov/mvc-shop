<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 25.09.2017
 * Time: 16:31
 */
class Router {

    private $routes;

    public function __construct() {
        $route_path = ROOT.'/config/routes.php';
        $this->routes = include ($route_path);
    }

    /**
     * @return string
     */
    private function getUri() {
        if($_SERVER['REQUEST_URI']) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run () {

        // Get query string
            $uri = $this->getUri();

        //Check for request in routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Compare $uriPattern and $uri
           if(preg_match("@$uriPattern@", $uri)) {

           //Get the internal path from external by the rule
                $internalRoute = preg_replace("@$uriPattern@", $path, $uri);

           // If there is a match, determine which controller and
           // action handles the request
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;

//                echo '<br>Controller name:' . $controllerName;
//                echo '<br>Action name:' . $actionName;




           // Connect class-controller file
               $controllerFile = ROOT.'/controllers/' .
                    $controllerName . '.php';

               if(file_exists($controllerFile)) {
                   include_once ($controllerFile);
               }


               // Create an object, call the method (action)
               $controllerObject = new $controllerName;
               $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
               echo '<pre>';
               print_r($controllerObject);
               if ($result != null) {
                   break;
               }
           }
        }
    }
}