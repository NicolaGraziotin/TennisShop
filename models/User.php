<?php

namespace app\models;

use app\core\Application;

class User {
    public int $idcustomer = 0;
    public int $seller = 0;
    public string $email = "";
    public string $password = "";
    public string $name = "";
    public string $surname = "";

    public static function addUser($email, $password, $name, $surname) {
        $statement = self::prepare("INSERT INTO customer (idcustomer, seller, email, password, name, surname) VALUES (NULL, 0, ?, ?, ?, ?)");
        $statement->bind_param("ssss", $email, $password, $name, $surname);
        $statement->execute();
        return;
    }

    public static function prepare($sql) {
        return Application::$app->db->prepare($sql);
    }
}