<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load konfigurasi database
require_once 'config/database.php';

// Fungsi untuk mendapatkan controller dan action dari URL
function getControllerAction() {
    $controller = $_GET['controller'] ?? 'login';
    $action = $_GET['action'] ?? 'index';
    
    // Validasi controller dan action
    $validControllers = ['login', 'dashboard', 'artikel'];
    $validActions = ['index', 'login', 'logout', 'tambah', 'edit', 'hapus'];
    
    if (!in_array($controller, $validControllers)) {
        $controller = 'login';
    }
    
    if (!in_array($action, $validActions)) {
        $action = 'index';
    }
    
    return [$controller, $action];
}

// Dapatkan controller dan action
list($controller, $action) = getControllerAction();

// Load controller yang sesuai
$controllerFile = "app/controllers/{$controller}Controller.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerClass();
    
    // Panggil method yang sesuai
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        // Jika method tidak ditemukan, tampilkan halaman 404
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
} else {
    // Jika controller tidak ditemukan, redirect ke login
    header('Location: ?controller=login');
    exit;
}
?> 