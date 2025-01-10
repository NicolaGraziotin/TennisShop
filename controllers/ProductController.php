<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Product;
use app\models\Cart;

class ProductController extends Controller {

    public function product(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            if(!Session::isLogged()){
                $response->redirect('/login');
            }
            Cart::addProduct(Session::getUserId(), $request->getBody()['idproduct'], $request->getBody()['quantity']);
        }
        $params = $request->getBody();
        $params['homeProducts'] = Product::getAllProducts();
        return $this->render('product', $params);
    }
}