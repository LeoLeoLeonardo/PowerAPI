<?php

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'power_api';

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8";

        try {
            $connection = new PDO($dsn, $this->user, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $e) {
            die("❌ ERROR: " . $e->getMessage());
        }
    }
}

?>
