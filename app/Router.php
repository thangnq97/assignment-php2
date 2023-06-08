<?php
    namespace App;


    class Router {
        protected static $routers = [];
        protected $request;

        public function __construct() {
            $this->request = new Request;
        }

        public static function get($path, $callback) {
            static::$routers['get'][$path] = $callback;
        }

        public static function post($path, $callback) {
            static::$routers['post'][$path] = $callback;
        }

        // hàm xử lý resolve

        public function resolve() {
            $method = $this->request->method(); // lấy ra method
            $path = $this->request->path(); // lấy ra đường dẫn hiện tại

            $callback = static::$routers[$method][$path] ?? false;
            if($callback == false) {
                echo '404 FILE NOT FOUND';
                die;
            }

            if(is_callable($callback)) {
                return $callback();
            }

            if(is_array($callback)) {
                $callback[0] = new $callback[0];

                return call_user_func($callback, $this->request);
            }
        }
    }
?>