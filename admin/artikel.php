<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Daftar Artikel</h2>

<form method="GET" action="artikel.php">
    <input type="text" name="cari" placeholder="Cari judul..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
    <button type="submit">Cari</button>
</form>

<a href="tambah.php">Tambah Artikel</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php
    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
    $sql = "SELECT * FROM artikel WHERE judul LIKE '%$cari%' ORDER BY tanggal DESC";
    $result = mysqli_query($conn, $sql);
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['judul']}</td>
                <td>{$row['tanggal']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin?')\">Hapus</a>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>
