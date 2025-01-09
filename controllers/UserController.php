<?php

namespace app\controllers;

use app\controllers\Controller;
use app\core\Application;
use app\core\Request;
use app\models\User;

class UserController extends Controller {

    public function register(Request $request) {
        if ($request->getMethod() === 'post') {
            User::addUser($request->getBody()['email'], $request->getBody()['password'], $request->getBody()['name'], $request->getBody()['surname']);
            Application::$app->response->redirect('/login');
            return;
        }
        return $this->render('register');
    }

    public function login(Request $request) {
        if ($request->getMethod() === 'post') {
            $user = User::checkUser($request->getBody()['email'], $request->getBody()['password']);
            if ($user) {
                Application::$app->session->set('user', $user);
                Application::$app->response->redirect('/');
            } else {
                echo 'Invalid login<br>';
            }
        }
        return $this->render('login');
    }

    public function logout() {
        Application::$app->session->destroy();
        Application::$app->response->redirect('/');
    }

    public function informations(Request $request) {
        if($request->getMethod() === 'post') {
            $body = $request->getBody();
            User::setPersonalData($body['country'], $body['state'], $body['city'], $body['address'], $body['cap'], $body['phone'], Application::$app->session->get('user')['idcustomer']);
        }
        $params = User::getPersonalData(Application::$app->session->get('user')['idcustomer']);
        $params['name'] = Application::$app->session->get('user')['name'];
        $params['surname'] = Application::$app->session->get('user')['surname'];
        return $this->render('informations', $params);
    }

    public function orders() {
        // $params['orders'] = Cart::findOrders(Application::$app->session->get('user')['idcustomer']);
        return $this->render('orders');
    }
}