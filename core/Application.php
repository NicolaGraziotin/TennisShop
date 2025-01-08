<?php

namespace app\core;

use app\core\db\Database;
use app\controllers\HomeController;

class Application {
    public static Application $app;
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
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
}