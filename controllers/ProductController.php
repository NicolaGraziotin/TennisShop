<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\models\Product;
use app\models\Cart;

class ProductController extends Controller {

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
}