<?php
namespace App;
class Router {
    public static $routes = [];
    public Request $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    public static function get($path, $callback){
        static::$routes['get'][$path] = $callback;
    }
    public static function post($path, $callback){
        static::$routes['post'][$path] = $callback;
    }
    public function resole(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = static::$routes[$method][$path] ?? false;
        if($callback === false){
            echo "404 NOT FOUND";
        }
        if(is_callable($callback)){
            $callback();
        }
        if(is_array($callback)){
            $callback[0] = new $callback[0];
            print_r($callback);
            return call_user_func($callback, $this->request);
        }
    }
}
?>