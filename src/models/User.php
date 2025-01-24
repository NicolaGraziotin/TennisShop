<?php

namespace app\models;

class User extends Model {

    public static function addUser($email, $password, $name, $surname) {
        $statement = self::prepare(
            "INSERT INTO customer (idcustomer, seller, email, password, name, surname) VALUES (NULL, 0, ?, ?, ?, ?)",
            "ssss",
            [$email, $password, $name, $surname]);
        $statement = self::prepare(
            "SELECT idcustomer FROM customer WHERE email = ?",
            "s",
            [$email]);
        $idcustomer = self::fetchOne($statement)['idcustomer'];
        self::setPersonalData(['', '', '', '', '', ''], $idcustomer);
        return;
    }

    public static function setPersonalData($personal_data, $idcustomer) {
        $statement = self::prepare(
            "INSERT INTO personal_data (idpersonaldata, country, state, city, address, cap, phone, idcustomer) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE country = VALUES(country), state = VALUES(state), city = VALUES(city), address = VALUES(address), cap = VALUES(cap), phone = VALUES(phone)",
            "ssssssi",
            [...$personal_data, $idcustomer]);
        return;
    }

    public static function getPersonalInformations($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM personal_data WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }

    public static function getUser($email) {
        $statement = self::prepare(
            "SELECT * FROM customer WHERE email = ?",
            "s",
            [$email]);
        return self::fetchOne($statement);
    }

    public static function getUserById($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM customer WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }

    public static function getOrders($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM customer_order WHERE idcustomer = ? ORDER BY idorder DESC",
            "i",
            [$idcustomer]);
        return self::fetchAll($statement);
    }

    public static function getStatusOrder($idorder) {
        $statement = self::prepare(
            "SELECT * FROM status JOIN customer_order WHERE idorder = ? AND status.idstatus = customer_order.idstatus",
            "i",
            [$idorder]);
        return self::fetchOne($statement);
    }

    public static function cancelOrder($idorder) {
        $statement = self::prepare(
            "DELETE FROM customer_order WHERE idorder = ?",
            "i",
            [$idorder]);
        return;
    }

    public static function getOrderDetails($idorder) {
        $statement = self::prepare(
            "SELECT * FROM customer_order WHERE idorder = ?",
            "i",
            [$idorder]);
        return self::fetchAll($statement);
    }

    public static function updateOrderStatus($idorder, $statusorder) {
        $statement = self::prepare(
            "UPDATE customer_order SET idstatus = ?  WHERE idorder = ?",
            "ii",
            [$statusorder, $idorder]);
        return;
    }

    public static function anyMessage($idcustomer) {
        $statement = self::prepare(
            "SELECT COUNT(*) as total FROM notification WHERE idcustomer = ? AND seen = 0",
            "i",
            [$idcustomer]);
    
        return self::fetchOne($statement)['total'];
        
    }

    public static function readMessage($idcustomer, $idnotification) {
        $statement = self::prepare(
            "UPDATE notification SET seen = 1 WHERE idcustomer = ? AND idnotification = ?",
            "ii",
            [$idcustomer, $idnotification]);
        return;
    }

    public static function getMessage($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM notification WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return json_encode(self::fetchAll($statement));
    }

    public static function sendNotification($title, $message, $idcustomer) {
        self::prepare("INSERT INTO notification (idnotification, date, timestamp, title, description, seen, idcustomer) VALUES (NULL, ?, ?, ?, ?, 0, ?)",
            "ssssi",
            [date("Y-m-d"), date("H:i:s"), $title, $message, $idcustomer]);
        return;
    }

    public static function getUserAnag($idcustomer) {
        $statement = self::prepare(
            "SELECT name, surname FROM customer WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }
}