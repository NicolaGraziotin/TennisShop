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
        self::setPersonalData('', '', '', '', '', '', $idcustomer);
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

    public static function checkUser($email, $password) {
        $statement = self::prepare(
            "SELECT * FROM customer WHERE email = ? AND password = ?",
            "ss",
            [$email, $password]);
        return self::fetchOne($statement);
    }

    public static function getUserById($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM customer WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement);
    }
}