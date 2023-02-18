<?php

namespace App;

class Router
{
    public static $routes = [];
     public $request;
    public function __construct()
    {
        $this->request = new Request();
    }

    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }
    public static function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $path = str_replace('/php2/PHP-MVC/bai4/public/', "/", $path);
        $postion = strpos($path, '?');
        if ($postion) {
            $path = substr($path, 0, $postion);
            return $path;
        }
        return $path;
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function resolve()
    {
        $path = $this->getPath();
        $method = $this->getMethod();
        $callback = false;
        if (isset(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }

        if ($callback === false) {
            echo "404 FILE NOT found!";
            return 0;
        }

        if (is_callable($callback)) {
            return $callback();
        }

        if (is_array($callback)) {
            [$class, $action] = $callback;
            $class = new $class;
            return call_user_func([$class, $action], $this->request);
        }
    }
}
