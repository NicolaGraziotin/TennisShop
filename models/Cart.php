<?php

namespace app\models;

class Cart extends Model {

    public static function find($idcustomer) {
        $statement = self::prepare(
            "SELECT name, price, quantity FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function totalElements($idcustomer) {
        $statement = self::prepare("SELECT SUM(quantity) as total FROM cart WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]['total'];
    }

    public static function addProduct($idcustomer, $idproduct, $quantity) {
        $statement = self::prepare(
            "INSERT INTO cart (idcustomer, idproduct, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)",
            "iii",
            [$idcustomer, $idproduct, $quantity]);
        return;
    }
}