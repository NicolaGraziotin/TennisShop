<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Cart;
use app\models\Product;
use app\models\User;

class HomeController{
    public string $layout = 'main';
    public string $action = '';
    public function home() {
        return $this->render('home', Product::find());
    }

    public function contact() {
        return $this->render('contact');
    }

    public function login(Request $request) {
        if ($request->getMethod() === 'post') {
            //User->loadData($request->getBody());
            Application::$app->response->redirect('/');
            return;
        }
        return $this->render('login');
    }

    public function cart(Request $request) {
        if ($request->getMethod() === 'post') {
            Cart::addProduct($request->getBody()['idproduct'], $request->getBody()['quantity']);
        }
        return $this->render('cart', Cart::find());
    }

    public function register(Request $request) {
        if ($request->getMethod() === 'post') {
            User::addUser($request->getBody()['email'], $request->getBody()['password'], $request->getBody()['name'], $request->getBody()['surname']);
            Application::$app->response->redirect('/login');
            return;
        }
        return $this->render('register');
    }

    public function product(Request $request) {
        if ($request->getMethod() === 'get') {
            $params['item'] = $request->getBody();
        }
        $params['components'] = Product::find();
        return $this->render('product', $params);
    }

    public function categoryProduct(Request $request) {
        if ($request->getMethod() === 'get') {
            $params['idcategory'] = $request->getBody()['idcategory'];
        }
        
        
        var_dump($_GET["idcategory"]);
        return $this->render('home', Product::findProductByCategory($params['idcategory']));
    }

    public function render($view, $params = []) {
        return Application::$app->view->renderView($view, $params);
    }
}