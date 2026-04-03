<?php
require_once '../config/db.php';
require_once '../app/core/Model.php';

class TestModel extends Model {
    public function testConnection() {
        if ($this->db instanceof PDO) {
            echo "✅ Connection successful!<br>";
            return true;
        }
        echo "❌ Connection failed!<br>";
        return false;
    }
}

$test = new TestModel();
$test->testConnection();
