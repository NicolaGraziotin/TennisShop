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
        $idcustomer = $statement->get_result()->fetch_assoc();
        self::setPersonalData('', '', '', '', '', '', $idcustomer['idcustomer']);
        return;
    }

    public static function setPersonalData($country, $state, $city, $address, $cap, $phone, $idcustomer) {
        $statement = self::prepare(
            "INSERT INTO personal_data (idpersonaldata, country, state, city, address, cap, phone, idcustomer) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE country = VALUES(country), state = VALUES(state), city = VALUES(city), address = VALUES(address), cap = VALUES(cap), phone = VALUES(phone)",
            "ssssssi",
            [$country, $state, $city, $address, $cap, $phone, $idcustomer]);
        return;
    }

    public static function getPersonalData($idcustomer) {
        $statement = self::prepare(
            "SELECT * FROM personal_data WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public static function checkUser($email, $password) {
        $statement = self::prepare(
            "SELECT * FROM customer WHERE email = ? AND password = ?",
            "ss",
            [$email, $password]);
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }
}