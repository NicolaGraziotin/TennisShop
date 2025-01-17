<?php

namespace app\core;

use app\db\Database;

class Application {
    public static Application $app;
    public static string $ROOT_DIR;
    public string $title = 'Tennis Shop';
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public View $view;

    public function __construct($rootDir, $config) {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config);
        $this->view = new View();
        Session::start();
    }

    public function run() {
        echo $this->router->resolve();
    }
}