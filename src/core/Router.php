<?php

namespace app\core;

class Router {
    private Request $request;
    private Response $response;
    private array $routeMap = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    public function get(string $url, $callback) {
        $this->routeMap['get'][$url] = $callback;
    }

    public function post(string $url, $callback) {
        $this->routeMap['post'][$url] = $callback;
    }

    public function resolve() {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();
        $callback = $this->routeMap[$method][$url] ?? false;
        if (!$callback) {
            $callback = $this->response->notFound();
        }
        $callback[0] = new $callback[0];
        return call_user_func($callback, $this->request, $this->response);
    }
}