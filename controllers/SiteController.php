<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Cart;
use app\models\Product;

class SiteController{
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

    public function cart() {
        return $this->render('cart', Cart::find());
    }

    public function product() {
        return $this->render('product');
    }

    public function render($view, $params = []) {
        return Application::$app->view->renderView($view, $params);
    }
}