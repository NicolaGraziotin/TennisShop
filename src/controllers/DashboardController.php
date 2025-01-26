<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Admin;
use app\models\Cart;
use app\models\Product;

class DashboardController extends Controller {

    public function dashboard(Request $request, Response $response) {
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/dashboard');
    }

    public function products(Request $request, Response $response) {
        $params['products'] = Product::getAllProducts();
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/products', $params);
    }

    public function customers(Request $request, Response $response) {
        $params['customers'] = Admin::getAllCustomers();
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/customers', $params);
    }

    public function edit(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $this->uploadFile($request->getBody());
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
        $params['shippings'] = Cart::getAllShippings();
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/settings', $params);
    }

    public function deleteProduct(Request $request, Response $response) {
        Product::deleteProduct($request->getBody()['idproduct']);
        return $response->redirect('/dashboard/products');
    }

    public function deleteCustomer(Request $request, Response $response) {
        Admin::deleteCustomer($request->getBody()['idcustomer']);
        return $response->redirect('/dashboard/customers');
    }

    private function checkAdmin(Request $request, Response $response) {
        if (!Session::isAdmin()) {
            $response->statusCode(ERROR_FORBIDDEN);
            return $this->render('forbidden');
        }
        Application::$app->layout = 'dashboard';
    }

    private function uploadFile($body) {
        $file = Session::getFileImage();
        $image = 'assets/products/' . $file['name'];
        $path = Application::$ROOT_DIR . '/public/' . $image;
        move_uploaded_file($file['tmp_name'], $path);
        Product::setProduct($body, $image);
        return;
    }

    public function searchProducts(Request $request, Response $response) {
        $params['products'] = Product::searchProducts($request->getBody()['search']);
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/products', $params);
    }

    public function searchCustomers(Request $request, Response $response) {
        $params['customers'] = Admin::searchCustomers($request->getBody()['surname']);
        return $this->checkAdmin($request, $response) ?? $this->render('dashboard/customers', $params);
    }
}