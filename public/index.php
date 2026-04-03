<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('PROJECT_ROOT', dirname(__DIR__));
define('BASEURL', PROJECT_ROOT . '/app');

try {
    require_once PROJECT_ROOT . '/config/db.php';
    require_once BASEURL . '/core/Model.php';
    require_once BASEURL . '/core/Controller.php';
    require_once BASEURL . '/core/App.php';

    $app = new App();
} catch (Exception $e) {
    die("System Error: Critical system failure. Details: " . $e->getMessage());
}
