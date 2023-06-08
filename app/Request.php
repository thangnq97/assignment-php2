<?php
    namespace App;

    class Request {
        public function method() {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public function path() {
            $path = $_SERVER['REQUEST_URI'];
            $path = str_replace('/wd18103/assignment-php2/public/', '/', $path);

            // tìm vị trí ? ở $path
            $position = strpos($path, '?');
            // nếu tìm thấy
            if($position) {
                $path = substr($path, 0, $position);
            }
            return $path;
        }
        // lấy dữ liệu các tham số từ URL và từ form
        public function body() {
            $body = [];
            
            if($this->method() === 'get') {
                foreach($_GET as $key => $value) {
                    $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }

            if($this->method() === 'post') {
                foreach($_POST as $key => $value) {
                    $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }

            return $body;
        }
    }
?>