<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
$controller = $_GET['controller'] ?? 'artikel';
$action = $_GET['action'] ?? 'index';

require_once "app/controllers/" . ucfirst($controller) . "Controller.php";
$controllerName = ucfirst($controller) . "Controller";
$controllerObj = new $controllerName;
$controllerObj->$action();
?>