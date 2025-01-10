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
        $statement = self::prepare("SELECT SUM(quantity) as total FROM cart WHERE idcustomer = ?",
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
        $statement = self::prepare("SELECT SUM(price * quantity) as total FROM cart JOIN product ON cart.idproduct = product.idproduct WHERE idcustomer = ?");
        $statement->bind_param("i", $idcustomer);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]['total'];
    }

    public static function getCreditCard($idcustomer, $idcreditcard) {
        $statement = self::prepare("SELECT * FROM credit_card WHERE idcustomer = ? AND idcreditcard = ?");
        $statement->bind_param("ii", $idcustomer, $idcreditcard);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public static function checkout($idcustomer, $idpersonaldata, $idcreditcard, $idstatus, $total) {
        $statement = self::prepare("INSERT INTO customer_order (idorder, idcustomer, idpersonaldata, idcreditcard, idstatus, totalprice) VALUES (NULL, ?, ?, ?, ?, ?)");
        $statement->bind_param("iiiii", $idcustomer, $idpersonaldata, $idcreditcard, $idstatus, $total);
        $statement->execute();
        return;
    }

    public static function prepare($sql) {
        return Application::$app->db->prepare($sql);
    }
}