<?php
session_start();

function requireLogin() {
    if (!isset($_SESSION['admin'])) {
        header('Location: ?controller=login');
        exit;
    }
}

function isLoggedIn() {
    return isset($_SESSION['admin']);
}

function getCurrentUser() {
    return $_SESSION['admin'] ?? null;
}

function logout() {
    session_destroy();
    header('Location: ?controller=login');
    exit;
}
?> 