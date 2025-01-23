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
            return $response->redirect('/login');
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
                if ($user['seller'] === 1) {
                    return $response->redirect('/dashboard');
                }
                return $response->redirect('/');
            } else {
                echo 'Invalid login<br>';
            }
        }
        return $this->render('login');
    }

    public function logout(Request $request, Response $response) {
        Session::destroy();
        return $response->redirect('/');
    }

    public function informations(Request $request, Response $response) {
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
        $params['orderComponent'] = User::getOrders(Session::getUserId());
        return $this->render('orders', $params);
    }

    public function cancelOrder(Request $request, Response $response) {
        if ($request->getMethod() === 'post') {
            User::cancelOrder($request->getBody()['idorder']);
            return $response->redirect('/orders');
        }
    }

    public function orderDetails(Request $request, Response $response) {
        $params['orderDetailsComponent'] = User::getOrderDetails($request->getBody()['idorder']);
        return $this->render('orderDetails', $params);
    }

    public function checkMessage(Request $request, Response $response) {
        return User::anyMessage(Session::getUserId());
    }

    public function getMessage(Request $request, Response $response) {
        return User::getMessage(Session::getUserId());
    }

    public function readMessage(Request $request, Response $response) {
        User::readMessage(Session::getUserId() ,$request->getBody()['idnotification']);
        return;
    }

    public function updateOrderStatus(Request $request, Response $response) {
        User::updateOrderStatus($request->getBody()['idorder'],$request->getBody()['idstatus']);
    }
}