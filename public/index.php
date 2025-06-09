<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definisikan root path
define('ROOT_PATH', dirname(__DIR__));

// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set default controller dan action
$controller = $_GET['controller'] ?? 'login';
$action = $_GET['action'] ?? 'index';

// Jika sudah login dan mencoba akses login page, redirect ke dashboard
if (isset($_SESSION['admin']) && $controller === 'login' && $action === 'index') {
    header("Location: index.php?controller=dashboard");
    exit;
}

// Gunakan path absolut untuk controller
$controllerFile = ROOT_PATH . "/app/controllers/" . ucfirst($controller) . "Controller.php";

if (!file_exists($controllerFile)) {
    die("Controller tidak ditemukan: " . $controllerFile);
}

require_once $controllerFile;

$controllerName = ucfirst($controller) . "Controller";
$controllerObj = new $controllerName;

if (!method_exists($controllerObj, $action)) {
    die("Action tidak ditemukan: " . $action);
}

$controllerObj->$action();
?>
