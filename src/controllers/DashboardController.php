<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Product;

class DashboardController extends Controller {

    public function dashboard(Request $request, Response $response) {
        if (!Session::isAdmin()) {
            $response->statusCode(ERROR_FORBIDDEN);
            return $this->render('forbidden');
        }
        return $response->redirect('/dashboard/statistics');
    }

    public function statistics() {
        Application::$app->layout = 'dashboard';
        return $this->render('dashboard/statistics');
    }

    public function products() {
        Application::$app->layout = 'dashboard';
        $params = Product::getAllProducts();
        return $this->render('dashboard/products');
    }
}