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

    public function edit(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            Product::setProduct($request->getBody());
            return $response->redirect('/dashboard/products');
        }
        Application::$app->layout = 'dashboard';
        $params['product'] = Product::getProductById($request->getBody()['idproduct']);
        return $this->render('dashboard/edit', $params);
    }
}