<?php

namespace app\core;

class Router {
    private array $routeMap = [];

    public function get(string $url, $callback) {
        $this->routeMap['get'][$url] = $callback;
    }

    public function post(string $url, $callback) {
        $this->routeMap['post'][$url] = $callback;
    }

    public function resolve() {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'];
        $callback = $this->routeMap[$method][$url] ?? false;
        if (!$callback) {
            return "Error 404";
        }
        if (is_array($callback)) {
            $controller = new $callback[0];
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            $callback[0] = $controller;
        }
        return call_user_func($callback);
    }

    public function renderView($view, $params = []) {
        return Application::$app->view->renderView($view, $params);
    }
}