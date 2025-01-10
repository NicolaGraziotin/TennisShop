<?php

namespace app\models;

class Cart extends Model {

    public static function getCart($idcustomer) {
        $statement = self::prepare(
            "SELECT name, price, quantity FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchAll($statement);
    }

    public static function getTotalElements($idcustomer) {
        $statement = self::prepare(
            "SELECT SUM(quantity) as total FROM cart WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement)['total'];
    }

    public static function addProduct($idcustomer, $idproduct, $quantity) {
        $statement = self::prepare(
            "INSERT INTO cart (idcustomer, idproduct, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)",
            "iii",
            [$idcustomer, $idproduct, $quantity]);
        return;
    }

    public static function totalCartPrice($idcustomer) {
        $statement = self::prepare(
            "SELECT SUM(price * quantity) as total FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        
        return self::fetchOne($statement)['total'];
    }

    public static function getCreditCard($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM credit_card WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }

    public static function checkout($idcustomer, $idpersonaldata, $idcreditcard, $idstatus, $total) {
        $statement = self::prepare(
            "INSERT INTO customer_order (idorder, idcustomer, idpersonaldata, idcreditcard, idstatus, totalprice) VALUES (NULL, ?, ?, ?, ?, ?)",
            "iiiii",
            [$idcustomer, $idpersonaldata, $idcreditcard, $idstatus, $total]);
        return;
    }
}