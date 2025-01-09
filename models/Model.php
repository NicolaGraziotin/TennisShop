<?php

namespace app\models;

use app\core\Application;

class Model{
    public static function prepare($query, $bind="", $params=[]){
        $statement = Application::$app->db->prepare($query);
        if($bind != ""){
            $statement->bind_param($bind, ...$params);
        }
        $statement->execute();
        return $statement;
    }
}