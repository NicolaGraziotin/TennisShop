<?php

namespace app\core;

class Session {

    public function __construct() {
        session_start();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? false;
    }

    public function isAdmin() {
        return $_SESSION['seller'] != null && $_SESSION['seller'] === 1;
    }

    public function isLogged() {
        return isset($_SESSION['user']);
    }

    public function remove($key) {
        unset($_SESSION[$key]);
    }

    public function destroy() {
        session_destroy();
    }
}