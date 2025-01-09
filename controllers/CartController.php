<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\models\Cart;

class CartController extends Controller {

    public function cart(Request $request) {
        if(!Application::$app->session->isLogged()){
            Application::$app->response->redirect('/login');
        }
        $params['cartProducts'] = Cart::find(Application::$app->session->get('user')['idcustomer']);
        return $this->render('cart', $params);
    }

    public function payment() {
        return $this->render('payment');
    }
}