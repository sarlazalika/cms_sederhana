<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');

    $sql = "INSERT INTO artikel (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')";
    mysqli_query($conn, $sql);
    header("Location: artikel.php");
}
?>

<h2>Tambah Artikel</h2>
<form method="POST">
    Judul: <input type="text" name="judul"><br><br>
    Isi: <textarea name="isi" rows="5" cols="40"></textarea><br><br>
    <button type="submit">Simpan</button>
</form>
