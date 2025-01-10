<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\User;

class UserController extends Controller {

    public function register(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            User::addUser($request->getBody()['email'], $request->getBody()['password'], $request->getBody()['name'], $request->getBody()['surname']);
            $response->redirect('/login');
            return;
        }
        return $this->render('register');
    }

    public function login(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            $user = User::checkUser($request->getBody()['email'], $request->getBody()['password']);
            if ($user) {
                Session::set('user', $user);
                $response->redirect('/');
            } else {
                echo 'Invalid login<br>';
            }
        }
        return $this->render('login');
    }

    public function logout(Request $request, Response $response) {
        Session::destroy();
        $response->redirect('/');
    }

    public function informations(Request $request) {
        if($request->getMethod() === 'post') {
            $body = $request->getBody();
            User::setPersonalData($body['country'], $body['state'], $body['city'], $body['address'], $body['cap'], $body['phone'], Session::get('user')['idcustomer']);
        }
        $params = User::getPersonalInformations(Session::get('user')['idcustomer']);
        $params['name'] = Session::get('user')['name'];
        $params['surname'] = Session::get('user')['surname'];
        return $this->render('informations', $params);
    }

    public function orders() {
        // $params['orders'] = Cart::findOrders(Session::get('user')['idcustomer']);
        return $this->render('orders');
    }
}