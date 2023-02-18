<?php
session_start();
use App\Controllers\ProductController;
use App\Router;
require_once __DIR__ . "/../vendor/autoload.php";
$router = new Router();
Router::get('/', [ProductController::class, 'index']);
Router::get('/detail-product', [ProductController::class, 'detailproduct']);
Router::get('/shop', [ProductController::class, 'shop']);
Router::get('/login', [ProductController::class, 'login']);
Router::post('/login', [ProductController::class, 'loginPost']);
Router::get('/register', [ProductController::class, 'register']);
Router::get('/admin/list', [ProductController::class, 'listProduct']);
Router::get('/delete-product', [ProductController::class, 'deleteProduct']);
Router::get('/create-product', [ProductController::class, 'createget']);
Router::post('/create-product', [ProductController::class, 'createProduct']);
Router::get('/update-product', [ProductController::class, 'updateget']);
Router::post('/update-product', [ProductController::class, 'updateProduct']);
$router->resole();
?>
