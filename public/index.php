<?php

use app\core\Application;
use app\controllers\HomeController;

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

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/cart', [HomeController::class, 'cart']);
$app->router->get('/contact', [HomeController::class, 'contact']);
$app->router->get('/product', [HomeController::class, 'product']);
$app->router->get('/login', [HomeController::class, 'login']);
$app->router->get('/register', [HomeController::class, 'register']);
$app->router->get('/category', [HomeController::class, 'categoryProduct']);
$app->router->get('/payment', [HomeController::class, 'payment']);

$app->router->post('/cart', [HomeController::class,'cart']);
$app->router->post('/login', [HomeController::class, 'login']);
$app->router->post('/register', [HomeController::class, 'register']);

$app->run();