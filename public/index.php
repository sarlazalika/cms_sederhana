<?php
include '../admin/koneksi.php';
$artikel = mysqli_query($conn, "SELECT * FROM artikel ORDER BY tanggal DESC");
?>

<h2>Artikel Publik</h2>
<?php while ($row = mysqli_fetch_assoc($artikel)): ?>
    <h3><?= $row['judul'] ?></h3>
    <p><small><?= $row['tanggal'] ?></small></p>
    <p><?= substr($row['isi'], 0, 100) ?>...</p>
    <hr>
<?php endwhile; ?>
