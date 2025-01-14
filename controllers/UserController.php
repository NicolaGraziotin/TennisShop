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
                if (isset($request->getBody()['remind'])) {
                    Session::setCookie(24 * 3600);
                }
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
        $idcustomer = Session::getUserId();
        if($request->getMethod() === 'post') {
            $personal_data = array_values($request->getBody());
            User::setPersonalData($personal_data, $idcustomer);
        }
        $params = User::getPersonalInformations($idcustomer);
        $params += Session::get('user');
        return $this->render('informations', $params);
    }

    public function orders() {
        $params['orders'] = User::getOrders(Session::getUserId());
        return $this->render('orders', $params);
    }
}