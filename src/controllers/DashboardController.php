<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Product;

class DashboardController extends Controller {
    
    public function __construct() {
        Application::$app->layout = 'dashboard';
    }

    public function dashboard(Request $request, Response $response) {
        if (!Session::isAdmin()) {
            $response->statusCode(ERROR_FORBIDDEN);
            return $this->render('forbidden');
        }
        return $this->render('dashboard/dashboard');
    }

    public function products() {
        $params = Product::getAllProducts();
        return $this->render('dashboard/products');
    }

    public function edit(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            Product::setProduct($request->getBody());
            return $response->redirect('/dashboard/products');
        }
        $params = [];
        if (isset($request->getBody()['idproduct'])) {
            $params = Product::getProductById($request->getBody()['idproduct']);
        } else {
            $params = [
                'idproduct' => Product::getLastId() + 1,
                'name' => '',
                'idcategory' => '',
                'description' => '',
                'price' => '',
                'stock' => ''
            ];
        }
        return $this->render('dashboard/edit', $params);
    }

    public function settings() {
        return $this->render('dashboard/settings');
    }
}