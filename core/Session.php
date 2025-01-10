<?php

namespace app\core;

use app\models\User;

class Session {

    public static function start() {
        session_start();
        if (isset($_COOKIE['idcustomer'])) {
            self::set('user', User::getUserById($_COOKIE['idcustomer']));
        }
        return;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
        return;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? false;
    }

    public static function getUserId() {
        return $_SESSION['user']['idcustomer'] ?? false;
    }

    public static function isAdmin() {
        return $_SESSION['seller'] != null && $_SESSION['seller'] === 1;
    }

    public static function isLogged() {
        return isset($_SESSION['user']);
    }

    public static function setCookie($time) {
        setcookie('idcustomer', self::getUserId(), time() + $time, '/');
        return;
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
        return;
    }

    public static function destroy() {
        session_destroy();
        self::setCookie(-3600);
        return;
    }
}