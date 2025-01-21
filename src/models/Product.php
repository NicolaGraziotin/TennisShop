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

    public static function getProductById($idproduct) {
        $statement = self::prepare(
            "SELECT * FROM product WHERE idproduct = ?",
            "i",
            [$idproduct]);
        return self::fetchOne($statement);
    }

    public static function getLastId() {
        $statement = self::prepare(
            "SELECT MAX(idproduct) AS idproduct FROM product");
        return self::fetchOne($statement)['idproduct'];
    }

    public static function setProduct($product) {
        $statement = self::prepare(
            "INSERT INTO product (idproduct, name, idcategory, description, price, stock) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), idcategory = VALUES(idcategory), description = VALUES(description), price = VALUES(price), stock = VALUES(stock)",
            "isisdi",
            [$product['idproduct'], $product['name'], $product['idcategory'], $product['description'], $product['price'], $product['stock']]);
        return;
    }
}