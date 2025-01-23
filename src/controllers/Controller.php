<?php

namespace app\controllers;

use app\core\Application;

class Controller {
    protected function render($view, $params = []) {
        return Application::$app->view->render($view, $params);
    }
}