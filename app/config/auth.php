<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getAdminUsername() {
    return isset($_SESSION['admin']) ? $_SESSION['admin'] : 'Admin';
}

function isLoggedIn() {
    return isset($_SESSION['admin']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ?controller=login');
        exit;
    }
}

function getSidebarUsername() {
    $username = getAdminUsername();
    return htmlspecialchars($username);
}
?> 