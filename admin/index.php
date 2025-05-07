<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Total artikel
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM artikel");
$data = mysqli_fetch_assoc($result);
$total_artikel = $data['total'];
?>

<h2>Dashboard Admin</h2>
<p>Selamat datang, <?= $_SESSION['admin']; ?>!</p>
<p>Total Artikel: <?= $total_artikel ?></p>

<a href="artikel.php">Kelola Artikel</a><br>
<a href="logout.php">Logout</a>
