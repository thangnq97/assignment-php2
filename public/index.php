<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");

    require_once __DIR__ ."/../vendor/autoload.php";
    require_once __DIR__ ."/../app/config.php";

use App\Controllers\AdminController;
use App\Controllers\BillController;
use App\Controllers\CategoryController;
use App\Controllers\ColorController;
use App\Controllers\CommentController;
use App\Controllers\HomeController;
use App\Controllers\ProductColorController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\VoucherController;
use App\Router;


    $router = new Router();

    // admin

    Router::get('/admin', [AdminController::class, 'index']);
    Router::get('/product-manager', [ProductController::class, 'index']);
    Router::get('/add-product', [ProductController::class, 'add']);
    Router::post('/add-product', [ProductController::class, 'store']);
    Router::get('/edit-product', [ProductController::class, 'show']);
    Router::post('/edit-product', [ProductController::class, 'edit']);
    Router::get('/delete-product', [ProductController::class, 'delete']);
    Router::get('/category-manager', [CategoryController::class, 'index']);
    Router::get('/add-category', [CategoryController::class, 'add']);
    Router::post('/add-category', [CategoryController::class, 'store']);
    Router::get('/edit-category', [CategoryController::class, 'show']);
    Router::post('/edit-category', [CategoryController::class, 'edit']);
    Router::get('/delete-category', [CategoryController::class, 'delete']);
    Router::get('/color-manager', [ColorController::class, 'index']);
    Router::get('/add-color', [ColorController::class, 'add']);
    Router::post('/add-color', [ColorController::class, 'store']);
    Router::get('/edit-color', [ColorController::class, 'show']);
    Router::post('/edit-color', [ColorController::class, 'edit']);
    Router::get('/delete-color', [ColorController::class, 'delete']);
    Router::get('/comment-manager', [CommentController::class, 'index']);
    Router::get('/delete-cmt', [CommentController::class, 'delete']);
    Router::get('/user-manager', [UserController::class, 'index']);
    Router::get('/delete-user', [UserController::class, 'delete']);
    Router::get('/voucher-manager', [VoucherController::class, 'index']);
    Router::get('/add-voucher', [VoucherController::class, 'add']);
    Router::post('/add-voucher', [VoucherController::class, 'store']);
    Router::get('/edit-voucher', [VoucherController::class, 'show']);
    Router::post('/edit-voucher', [VoucherController::class, 'edit']);
    Router::get('/delete-voucher', [VoucherController::class, 'delete']);
    Router::get('/pro_color-manager', [ProductColorController::class, 'index']);
    Router::get('/add-pro_color', [ProductColorController::class, 'add']);
    Router::post('/add-pro_color', [ProductColorController::class, 'store']);
    Router::get('/edit-pro_color', [ProductColorController::class, 'show']);
    Router::post('/edit-pro_color', [ProductColorController::class, 'edit']);
    Router::get('/delete-pro_color', [ProductColorController::class, 'delete']);
    Router::get('/bill-manager', [BillController::class, 'index']);
    Router::get('/bill-detail', [BillController::class, 'show']);
    Router::get('/update-bill', [BillController::class, 'update']);
    Router::get('/cancel-bill', [BillController::class, 'cancel']);

    // client
    Router::get('/', [HomeController::class, 'index']);
    Router::get('/shop', [HomeController::class, 'shop']);
    Router::get('/product-detail', [HomeController::class, 'detail']);

    $router->resolve();
?>