<?php

namespace app\models;

use app\core\Application;

class Product {
    public int $idproduct = 0;
    public int $idcategory = 0;
    public string $name = "";
    public string $description = "";
    public int $price = 0;

    public static function find() {
        $statement = Application::$app->db->prepare("SELECT * FROM product");
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function findProductByCategory() {
        $statement = Application::$app->db->prepare("SELECT * FROM product WHERE idcategory=1");
        //$statement->bind_param("i", $idcategory);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}