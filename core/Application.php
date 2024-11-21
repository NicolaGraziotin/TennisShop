<?php

namespace app\core;

use app\core\db\Database;

class Application {
    public static Application $app;
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public string $cartQuantity = '0';
    public Router $router;
    public ?Controller $controller = null;
    public Database $db;
    public View $view;

    public function __construct($rootDir, $config) {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->router = new Router();
        $this->db = new Database($config);
        $this->view = new View();
    }

    public function run() {
        echo $this->router->resolve();
    }

    public function setCartQuantity($cartQuantity) {
        $this->cartQuantity = $cartQuantity;
    }
}