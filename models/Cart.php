<?php 
namespace app\models;

use app\core\Application;

class Cart {

    public static function getCartQuantity($idcustomer) {
        $db = Application::$app->db;

        $stmt = $db->prepare("SELECT SUM(quantity) as total_quantity FROM cart WHERE idcustomer = ?");
        $stmt->bind_param('i', $idcustomer);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result[0]['total_quantity'] ?? 0;
    }
}
