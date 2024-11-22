<?php

namespace app\core\db;

use mysqli;

class Database {
    public mysqli $connection;

    public function __construct($dbConfig = []) {
        $hostname = $dbConfig['hostname'] ?? '';
        $username = $dbConfig['user'] ??'';
        $password = $dbConfig['password'] ??'';
        $database = $dbConfig['database'] ??'';
        $port = $dbConfig['port'] ??'';

        $this->connection = new mysqli($hostname, $username, $password, $database, $port);
    }

    public function prepare($sql){
        return $this->connection->prepare($sql);
    }
}