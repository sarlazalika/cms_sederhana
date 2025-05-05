<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
echo "<h1>Selamat datang di Dashboard Admin</h1>";
echo "<a href='logout.php'>Logout</a>";
?>