<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM artikel WHERE id=$id");
header("Location: artikel.php");
