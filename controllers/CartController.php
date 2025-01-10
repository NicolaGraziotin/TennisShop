<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Cart;

class CartController extends Controller {

    public function cart(Request $request, Response $response) {
        if(!Session::isLogged()){
            $response->redirect('/login');
        }
        $params['cartProducts'] = Cart::getCart(Session::getUserId());
        return $this->render('cart', $params);
    }

    public function payment() {
        return $this->render('payment');
    }
}