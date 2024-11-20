<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller {
    public function home() {
        return $this->render('home', [
            'name' => 'Welcome',
        ]);
    }

    public function contact() {
        return $this->render('contact', []);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: /');
        }
        return $this->render('login', []);
    }

    public function cart() {
        return $this->render('cart', []);
    }
}