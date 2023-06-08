<?php
    require_once __DIR__ ."/../vendor/autoload.php";
    require_once __DIR__ ."/../app/config.php";

    use App\Router;


    $router = new Router();

    $router->resolve();
?>