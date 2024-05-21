<?php

namespace App;

use Exception;
class Router {
    private array $routes = [];
    private static Router $instance;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance(): Router
    {
        if(!isset(self::$instance)){
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function addRoute(string $path, string $controller, string $action, string $method) : void
    {
        $uri = URL_ROOT . $path ;
        //echo '<pre>';
        //echo __DIR__;
        //echo $_SERVER['DOCUMENT_ROOT'];
        //var_dump($uri);
        $this->routes[$method][$uri] = [
            'controller' => $controller,
            'action' => $action
        ];
    }
    public function get(string $path, string $controller, string $action): void
    {
        $this->addRoute($path, $controller, $action, 'GET');
    }
    public function post(string $path, string $controller, string $action)
    {
        $this->addRoute($path, $controller, $action, 'POST');
    }

    public function dispatch(): void
    {
        $path = strtok ($_SERVER['REQUEST_URI'] , '?');
        $method = $_SERVER['REQUEST_METHOD'];
        // echo '<pre>';
        // var_dump($path);
        // var_dump($method);
        // var_dump($this->routes);
        // echo '</pre>';
        
        if(isset ($this->routes [$method][$path])) 
        {
            $controller = $this->routes[$method][$path]['controller'];
            $action = $this->routes[$method][$path]['action'];

            $controllerInstance = new $controller();
            $controllerInstance->$action();
        }else{
            throw new Exception ( "404 - Not Found");
        }
    }
   /* [
        "GET" => [
            "Algebra/Napredno%20Prog/AlgebraCRM" => [
                "controller" => "HomeController",
                "action" => "index"
            ],
            "/create" =>
        ]
    ]*/

}