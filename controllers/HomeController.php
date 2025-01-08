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
        $params['homeProducts'] = Product::find();
        return $this->render('home', $params);
    }

    public function contact() {
        return $this->render('contact');
    }

    public function payment() {
        return $this->render('payment');
    }

    public function login(Request $request) {
        if ($request->getMethod() === 'post') {
            $user = User::checkUser($request->getBody()['email'], $request->getBody()['password']);
            if ($user) {
                Application::$app->session->set('user', $user);
                Application::$app->response->redirect('/');
            } else {
                echo 'Invalid login<br>';
            }
            var_dump(Application::$app->session->get('user'));
        }
        return $this->render('login');
    }

    public function cart(Request $request) {
        if(!Application::$app->session->isLogged()){
            Application::$app->response->redirect('/login');
        }
        $params['cartProducts'] = Cart::find(Application::$app->session->get('user')['idcustomer']);
        return $this->render('cart', $params);
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
        if ($request->getMethod() === 'post') {
            if(!Application::$app->session->isLogged()){
                Application::$app->response->redirect('/login');
            }
            Cart::addProduct(Application::$app->session->get('user')['idcustomer'], $request->getBody()['idproduct'], $request->getBody()['quantity']);
        }
        $params = $request->getBody();
        $params['homeProducts'] = Product::find();
        return $this->render('product', $params);
    }

    public function categoryProduct(Request $request) {
        if ($request->getMethod() === 'get') {
            
        }
        $params['homeProducts'] = Product::findProductByCategory($request->getBody()['idcategory']);
        return $this->render('home', $params);
    }

    public function logout() {
        Application::$app->session->destroy();
        Application::$app->response->redirect('/');
    }

    public function render($view, $params = []) {
        return Application::$app->view->render($view, $params);
    }
}