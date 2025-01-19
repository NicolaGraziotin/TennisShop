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

    public static function getCreditCard($idcustomer, $idcreditcard) {
        $statement = self::prepare(
            "SELECT * FROM credit_card WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }

    public static function checkout($idcustomer, $idpersonaldata, $idcreditcard, $idstatus, $total) {
        $statement = self::prepare(
            "INSERT INTO customer_order (idorder, idcustomer, idpersonaldata, idcreditcard, idstatus, date, totalprice) VALUES (NULL, ?, ?, ?, ?, ?, ?)",
            "iiiisi",
            [$idcustomer, $idpersonaldata, $idcreditcard, $idstatus, date('Y-m-d'), $total]);
        return;
    }

    public static function setCreditCard($idcustomer, $number, $expiration, $holder, $cvv) {
        $statement = self::prepare(
            "INSERT INTO credit_card (idcreditcard, number, expire, cvv, holder, idcustomer) VALUES (NULL, ?, ?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE expire = VALUES(expire), holder = VALUES(holder), cvv = VALUES(cvv)",
            "ssssi",
            [$number, $expiration, $cvv, $holder, $idcustomer]);
        return;
    }

    public static function removeCart($idcustomer) {
        $statement = self::prepare(
            "DELETE FROM cart WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return;
    }

    public static function getCardId($number) {
        $statement = self::prepare(
            "SELECT idcreditcard FROM credit_card WHERE number = ?",
            "s",
            [$number]);
        return self::fetchOne($statement)['idcreditcard'];
    }
}