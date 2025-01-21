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
            return $response->redirect('/login');
        }
        $params['cartProduct'] = Cart::getCart(Session::getUserId());
        return $this->render('cart', $params);
    }

    public function checkout(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $body = $request->getBody();
            Cart::setCreditCard(Session::getUserId(), $body['typeNum'], $body['typeExp'], 
                $body['typeName'], $body['typeCvv']);
            Cart::checkout($body['idcustomer'], $body['idpersonaldata'], 
                (Application::$app->db->getLastId() == 0 ? Cart::getCardId($body['typeNum']) : Application::$app->db->getLastId()), 
                $body['idstatus'], $body['total']);
            Cart::removeCart(Session::getUserId());
            Cart::setNotification("TennisShop", "Your order has been placed successfully!", Session::getUserId());
            return $response->redirect('/');
        }
    }

    public function payment() {
        return $this->render('payment');
    }
}