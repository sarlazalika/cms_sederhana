<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id=$id");
$data = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $sql = "UPDATE artikel SET judul='$judul', isi='$isi' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: artikel.php");
}
?>

<h2>Edit Artikel</h2>
<form method="POST">
    Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br><br>
    Isi: <textarea name="isi" rows="5" cols="40"><?= $data['isi'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
