<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$controller = $_GET['controller'] ?? 'login';
$action = $_GET['action'] ?? 'index';

$controllerFile = "../app/controllers/" . ucfirst($controller) . "Controller.php";
if (!file_exists($controllerFile)) {
    die("Controller tidak ditemukan.");
}
require_once $controllerFile;

$controllerName = ucfirst($controller) . "Controller";
$controllerObj = new $controllerName;
if (!method_exists($controllerObj, $action)) {
    die("Action tidak ditemukan.");
}
$controllerObj->$action();
?>
