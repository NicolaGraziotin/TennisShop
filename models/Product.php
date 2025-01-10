<?php

namespace app\models;

class Product extends Model {

    public static function getAllProducts() {
        $statement = self::prepare(
            "SELECT * FROM product");
        return self::fetchAll($statement);
    }

    public static function getProductsByCategory($idcategory) {
        $statement = self::prepare(
            "SELECT * FROM product WHERE idcategory = ?",
            "i",
            [$idcategory]);
        return self::fetchAll($statement);
    }
}