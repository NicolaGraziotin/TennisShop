<?php

namespace app\models;

class Product extends Model {

    public static function find() {
        $statement = self::prepare(
            "SELECT * FROM product");
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function findProductByCategory($idcategory) {
        $statement = self::prepare(
            "SELECT * FROM product WHERE idcategory = ?",
            "i",
            [$idcategory]);
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function getIdCategory($name) {
        $statement = self::prepare(
            "SELECT idcategory FROM category WHERE name = ?",
            "s",
            [$name]);
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]["idcategory"];
    }
}