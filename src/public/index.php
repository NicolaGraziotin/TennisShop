<?php

use app\core\Application;
use app\controllers\CartController;
use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\controllers\UserController;
use app\controllers\ProductController;

define('ERROR_FORBIDDEN', 403);
define('ERROR_NOT_FOUND', 404);

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'hostname' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'database' => $_ENV['DB_DATABASE'],
    'port' => $_ENV['DB_PORT'],
];

$app = new Application(dirname(__DIR__), $config);

/* Home Controller */
$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/contact', [HomeController::class, 'contact']);
$app->router->get('/category', [HomeController::class, 'category']);
$app->router->get('/search', [HomeController::class, 'search']);

/* Cart Controller */
$app->router->get('/cart', [CartController::class, 'cart']);
$app->router->post('/cart', [CartController::class, 'cart']);
$app->router->post('/checkout', [CartController::class, 'checkout']);
$app->router->get('/updateQuantity', [CartController::class, 'updateQuantity']);
$app->router->get('/updateTotalPrice', [CartController::class, 'updateTotalPrice']);
$app->router->get('/removeProduct', [CartController::class, 'removeCartProduct']);

/* Product Controller */
$app->router->get('/product', [ProductController::class, 'product']);
$app->router->post('/product', [ProductController::class, 'product']);

/* User Controller */
$app->router->get('/register', [UserController::class, 'register']);
$app->router->post('/register', [UserController::class, 'register']);
$app->router->get('/login', [UserController::class, 'login']);
$app->router->post('/login', [UserController::class, 'login']);
$app->router->get('/logout', [UserController::class, 'logout']);
$app->router->get('/informations', [UserController::class, 'informations']);
$app->router->post('/informations', [UserController::class, 'informations']);
$app->router->get('/orders', [UserController::class, 'orders']);
$app->router->post('/cancelOrder', [UserController::class, 'cancelOrder']);
$app->router->get('/checkMessage', [UserController::class, 'checkMessage']);
$app->router->get('/getMessage', [UserController::class, 'getMessage']);
$app->router->get('/orderDetails', [UserController::class, 'orderDetails']);
$app->router->get('/readMessage', [UserController::class, 'readMessage']);
$app->router->get('/updateOrderStatus', [UserController::class, 'updateOrderStatus']);
$app->router->get('/sendNotification', [UserController::class, 'sendNotification']);

/* Dashboard Controller */
$app->router->get('/dashboard', [DashboardController::class, 'dashboard']);
$app->router->get('/dashboard/products', [DashboardController::class, 'products']);
$app->router->get('/dashboard/products/edit', [DashboardController::class, 'edit']);
$app->router->post('/dashboard/products/edit', [DashboardController::class, 'edit']);
$app->router->get('/dashboard/products/delete', [DashboardController::class, 'delete']);
$app->router->get('/dashboard/settings', [DashboardController::class, 'settings']);
$app->router->post('/dashboard/settings', [DashboardController::class, 'settings']);

$app->run();