<?php

namespace app\core;

class Session {

    public static function start() {
        session_start();
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

    public static function remove($key) {
        unset($_SESSION[$key]);
        return;
    }

    public static function destroy() {
        session_destroy();
        return;
    }
}