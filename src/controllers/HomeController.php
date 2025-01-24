<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Product;

class HomeController extends Controller {

    public function home(Request $request, Response $response) {
        $params['homeProduct'] = Product::getAllProducts();
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response) {
        return $this->render('contact');
    }

    public function category(Request $request, Response $response) {
        $params['homeProduct'] = Product::getProductsByCategory($request->getBody()['idcategory']);
        return $this->render('home', $params);
    }

    public function notFound(Request $request, Response $response) {
        return $this->render('notFound');
    }

    public function search(Request $request, Response $response) {
        $params['homeProduct'] = Product::searchProducts($request->getBody()['search']);
        return $this->render('home', $params);
    }
}