<?php

namespace app\models;

class Cart extends Model {

    public static function getCart($idcustomer) {
        $statement = self::prepare(
            "SELECT idcustomer, quantity, product.* FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = ? AND QUANTITY > 0",
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

    public static function setNotification($sender, $description, $idcustomer) {
        $statement = self::prepare(
            "INSERT INTO notification (idnotification, date, timestamp, title, description, seen, idcustomer) VALUES (NULL, ?, ?, ?, ?, 0, ?)",
            "ssssi",
            [date("Y-m-d"), date("H:i:s"), $sender, $description, $idcustomer]);
        return;        
    }

    public static function getCurrentShipping() {
        $statement = self::prepare(
            "SELECT * FROM shipping WHERE active = ?",
            "i",
            [True]);
        return self::fetchOne($statement);
    }

    public static function getAllShippings() {
        $statement = self::prepare(
            "SELECT * FROM shipping",
            "",
            []);
        return self::fetchAll($statement);
    }

    public static function updateQuantity($idcustomer, $idproduct, $quantity) {
        $statement = self::prepare(
            "UPDATE cart SET quantity = ? WHERE idcustomer = ? AND idproduct = ?",
            "iii",
            [$quantity, $idcustomer, $idproduct]);
        return;
    }

    public static function checkStock($idcustomer) {
        $statement = self::prepare(
            "SELECT idproduct, quantity FROM cart WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        $cart = self::fetchAll($statement);
        foreach ($cart as $product) {
            $statement = self::prepare(
                "SELECT stock FROM product WHERE idproduct = ?",
                "i",
                [$product['idproduct']]);
            $stock = self::fetchOne($statement)['stock'];
            if ($stock < $product['quantity']) {
                return false;
            }
        }
        return true;
    }

    public static function removeStock($idcustomer) {
        $statement = self::prepare(
            "SELECT idproduct, quantity FROM cart WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        $cart = self::fetchAll($statement);
        foreach ($cart as $product) {
            self::prepare(
                "UPDATE product SET stock = stock - ? WHERE idproduct = ?",
                "ii",
                [$product['quantity'], $product['idproduct']]);
        }
        return;
    }

    public static function removeCartZero($idcustomer) {
        $statement = self::prepare(
            "DELETE FROM cart WHERE idcustomer = ? AND quantity = 0",
            "i",
            [$idcustomer]);
        return;
    }
}