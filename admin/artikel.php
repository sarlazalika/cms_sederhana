<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM artikel");
?>

<h2>Daftar Artikel</h2>
<a href="tambah.php">Tambah Artikel</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['judul']}</td>
                <td>{$row['tanggal']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='hapus.php?id={$row['id']}'>Hapus</a>
                </td>
            </tr>";
        $no++;
    }
    ?>
</table>
