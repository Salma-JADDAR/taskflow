<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): PDO {
        if (Database::$instance === null) {
            try {
                Database::$instance = new PDO(
                    "mysql:host=localhost;dbname=taskflow;charset=utf8","root","",
                  
                );
            } catch (PDOException $e) {
                die("erreur: " . $e->getMessage());
            }
        }
        return Database::$instance;
    }
}
