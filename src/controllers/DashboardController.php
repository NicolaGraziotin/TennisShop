<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Admin;
use app\models\Product;

class DashboardController extends Controller {

    public function dashboard(Request $request, Response $response) {
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/dashboard');
    }

    public function products(Request $request, Response $response) {
        $params = Product::getAllProducts();
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/products');
    }

    public function edit(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $file = Session::getFileImage();
            if (!$file) {
                return $response->redirect('/dashboard/products');
            }
            $image = $file['name'];
            $path = Application::$ROOT_DIR . '/public/assets/' . $image;
            move_uploaded_file($file['tmp_name'], $path);
            Product::setProduct($request->getBody(), $image);
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
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/edit', $params);
    }

    public function settings(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $body = $request->getBody();
            Admin::setShipping($body['idshipping']);
            return $response->redirect('/dashboard/settings');
        }
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/settings');
    }

    private function checkAdmin(Request $request, Response $response) {
        if (!Session::isAdmin()) {
            $response->statusCode(ERROR_FORBIDDEN);
            return $this->render('forbidden');
        }
        Application::$app->layout = 'dashboard';
    }
}