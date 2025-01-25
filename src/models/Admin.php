<?php

namespace app\models;

class Admin extends Model {
    
    public static function getTotalSales() {
        $statement = self::prepare(
            "SELECT SUM(totalprice) FROM customer_order",
            "",
            []);
        return self::fetchOne($statement)['SUM(totalprice)'];
    }

    public static function getTotalOrders() {
        $statement = self::prepare(
            "SELECT COUNT(*) FROM customer_order",
            "",
            []);
        return self::fetchOne($statement)['COUNT(*)'];
    }

    public static function getTotalOrdersById($idcustomer) {
        $statement = self::prepare(
            "SELECT COUNT(*) FROM customer_order WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return self::fetchOne($statement)['COUNT(*)'];
    }

    public static function getTotalUsers() {
        $statement = self::prepare(
            "SELECT COUNT(*) FROM customer WHERE seller = 0",
            "",
            []);
        return self::fetchOne($statement)['COUNT(*)'];
    }

    public static function setShipping($idshipping) {
        self::prepare(
            "UPDATE shipping SET active = ?",
            "i",
            [False]);
        self::prepare(
            "UPDATE shipping SET active = ? WHERE idshipping = ?",
            "is",
            [True, $idshipping]);
        return;
    }

    public static function getAllCustomers() {
        $statement = self::prepare(
            "SELECT * FROM customer",
            "",
            []);
        return self::fetchAll($statement);
    }

    public static function deleteCustomer($idcustomer) {
        self::prepare(
            "DELETE FROM customer WHERE idcustomer = ?",
            "i",
            [$idcustomer]);
        return;
    }
}