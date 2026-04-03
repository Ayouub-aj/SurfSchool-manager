<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'surf_manager');
define('DB_USER', 'root');
define('DB_PASS', '');

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script = $_SERVER['SCRIPT_NAME'];
$publicPath = strpos($script, '/public/index.php') !== false ? str_replace('/public/index.php', '/public', $script) : str_replace('/index.php', '/public', $script);
define('URLROOT', $protocol . '://' . $host . $publicPath);
