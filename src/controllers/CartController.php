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
        Cart::removeCartZero(Session::getUserId());
        $params['cartProduct'] = Cart::getCart(Session::getUserId());
        $params['shipping'] = Cart::getCurrentShipping()['fee'];
        return $this->render('cart', $params);
    }

    public function checkout(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $body = $request->getBody();
            if(Cart::checkStock(Session::getUserId())) {
                Cart::removeCartZero(Session::getUserId());
                if(Cart::getCart(Session::getUserId()) == null) {
                    Cart::setNotification("TennisShop", "No selected items in cart", Session::getUserId());
                    return $response->redirect('/cart');
                }
                Cart::setCreditCard(Session::getUserId(), $body['typeNum'], $body['typeExp'], 
                    $body['typeName'], $body['typeCvv']);
                Cart::checkout($body['idcustomer'], $body['idpersonaldata'], 
                    (Application::$app->db->getLastId() == 0 ? Cart::getCardId($body['typeNum']) : Application::$app->db->getLastId()), 
                    $body['idstatus'], $body['total']);
                Cart::removeStock(Session::getUserId());
                Cart::removeCart(Session::getUserId());
                Cart::setNotification("TennisShop", "Your order has been placed successfully!", Session::getUserId());
                return $response->redirect('/');
            } else {
                Cart::setNotification("TennisShop", "Some products are out of stock!", Session::getUserId());
                return $response->redirect('/cart');
            }
        }
    }

    public function payment(Request $request, Response $response) {
        return $this->render('payment');
    }

    public function updateQuantity(Request $request) {
        if ($request->getMethod() === 'get') {
            Cart::updateQuantity(Session::getUserId(), $request->getBody()['idproduct'], $request->getBody()['quantity']);  
        }
        return;
    }

    public function updateTotalPrice(Request $request, Response $response) {
        return Cart::totalCartPrice(Session::getUserId()); 
    }

    public function removeCartProduct() {
        Cart::removeCartZero(Session::getUserId());
    }
}