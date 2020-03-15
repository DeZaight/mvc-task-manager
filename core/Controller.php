<?php

namespace core;

abstract class Controller
{
    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($model)
    {
        $path = 'app\\models\\' . ucfirst($model);
        if (class_exists($path)) {
            return new $path;
        }
    }
}
