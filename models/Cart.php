<?php

namespace app\models;

use app\core\Application;

class Cart {
    public int $idcustomer = 0;
    public int $idproduct = 0;
    public int $quantity = 0;

    public static function find() {
        $statement = self::prepare("SELECT name, price, quantity FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = 1");
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function totalElements() {
        $total = 0;
        $statement = self::prepare("SELECT SUM(quantity) as total FROM cart WHERE idcustomer = 1");
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]['total'];
    }

    public static function prepare($sql) {
        return Application::$app->db->prepare($sql);
    }
}