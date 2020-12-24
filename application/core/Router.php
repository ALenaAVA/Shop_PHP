<?php

namespace application\core;

use application\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {

        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
       
        $route = '#^' . $route . '$#';
    
        $this->routes[$route] = $params;
    }
    /**
     * Проверяем присутствует ли данный запрос в наших маршрутах
     */
    private function match()
    {
        
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            
            if (preg_match($route, $url, $matches)) {
               
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Проверяем существует ли такой класс контроллера и метод в нем 
     * если существует запускаем метод
     */
    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $res = $controller->$action();
                    // ????????????????????????????????????
                    if ($res != null) {
                        return;
                    }

                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}
