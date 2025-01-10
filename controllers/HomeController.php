<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Request;
use app\models\Product;

class HomeController extends Controller {

    public function home() {
        $params['homeProducts'] = Product::getAllProducts();
        return $this->render('home', $params);
    }

    public function contact() {
        return $this->render('contact');
    }

    public function category(Request $request) {
        $params['homeProducts'] = Product::getProductsByCategory($request->getBody()['idcategory']);
        return $this->render('home', $params);
    }
}