<?php

namespace app\core;

use app\controllers\HomeController;

class Response {
    public function statusCode(int $code) {
        http_response_code($code);
    }

    public function redirect($url) {
        header("Location: $url");
    }

    public function notFound() {
        return [HomeController::class, 'notFound'];
    }
}