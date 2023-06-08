<?php
    require_once __DIR__ ."/../vendor/autoload.php";
    require_once __DIR__ ."/../app/config.php";

use App\Controllers\ProductController;
use App\Router;


    $router = new Router();

    Router::get('/product-manager', [ProductController::class, 'index']);
    Router::get('/add-product', [ProductController::class, 'add']);
    Router::post('/add-product', [ProductController::class, 'store']);

    $router->resolve();
?>