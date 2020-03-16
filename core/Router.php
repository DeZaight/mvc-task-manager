<?php

namespace core;

class Router
{
    private $routes  = [];
    private $params = [];

    function __construct()
    {
        $routes = require 'config/routes.php';
        foreach ($routes as $route => $params) {
            $this->add($route, $params);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $url = trim($url['path'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'app\\controllers\\' . ucfirst($this->params['controller'])  . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::error(404);
                }
            } else {
                View::error(404);
            }
        } else {
            View::error(404);
        }
    }
}
