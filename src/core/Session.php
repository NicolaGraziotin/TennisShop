<?php

namespace app\core;

use app\models\User;

class Session {

    private static $encryption_key = 'sinner';

    public static function start() {
        session_start();
        if (isset($_COOKIE['user'])) {
            $decrypted_id = self::decrypt($_COOKIE['user']);
            self::set('user', User::getUserById($decrypted_id));
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
        return self::isLogged() && $_SESSION['user']['seller'] === 1;
    }

    public static function isLogged() {
        return isset($_SESSION['user']);
    }

    public static function setCookie($time) {
        $encrypted_id = self::encrypt(self::getUserId());
        setcookie('user', $encrypted_id, time() + $time, '/');
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

    public static function getFileImage() {
        return $_FILES['image'] ?? false;
    }

    private static function encrypt($data) {
        return openssl_encrypt($data, 'AES-128-ECB', self::$encryption_key);
    }

    private static function decrypt($data) {
        return openssl_decrypt($data, 'AES-128-ECB', self::$encryption_key);
    }
}