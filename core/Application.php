<?php

namespace app\core;

use app\core\db\Database;
use app\controllers\HomeController;
use app\models\Cart;

class Application {
    public static Application $app;
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public string $cartQuantity = '0';
    public Router $router;
    public Request $request;
    public Response $response;
    public HomeController $controller;
    public Database $db;
    public View $view;
    public Cart $cart;
    public Session $session;

    public function __construct($rootDir, $config) {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config);
        $this->view = new View();
        $this->session = new Session();
    }

    public function run() {
        echo $this->router->resolve();
    }

    public function setCartQuantity($cartQuantity) {
        $this->cartQuantity = $cartQuantity;
    }
}