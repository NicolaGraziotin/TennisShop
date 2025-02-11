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

    public static function setProduct($product, $image) {
        $statement = self::prepare(
            "INSERT INTO product (idproduct, name, idcategory, description, price, stock, image) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), idcategory = VALUES(idcategory), description = VALUES(description), price = VALUES(price), stock = VALUES(stock), image = VALUES(image)",
            "isisdis",
            [$product['idproduct'], $product['name'], $product['idcategory'], $product['description'], $product['price'], $product['stock'], $image]);
        return;
    }

    public static function getAllCategories() {
        $statement = self::prepare(
            "SELECT * FROM category");
        return self::fetchAll($statement);
    }

    public static function getCategoryById($idcategory) {
        $statement = self::prepare(
            "SELECT * FROM category WHERE idcategory = ?",
            "i",
            [$idcategory]);
        return self::fetchOne($statement);
    }

    public static function deleteProduct($idproduct) {
        $statement = self::prepare(
            "DELETE FROM product WHERE idproduct = ?",
            "i",
            [$idproduct]);
        return;
    }

    public static function searchProducts($name) {
        $statement = self::prepare(
            "SELECT * FROM product WHERE name LIKE ?",
            "s",
            ["%$name%"]);
        return self::fetchAll($statement);
    }
}