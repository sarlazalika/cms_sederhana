<?php
include '../admin/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM artikel ORDER BY tanggal DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row['judul'] . "</h2>";
    echo "<p>" . $row['isi'] . "</p>";
    echo "<hr>";
}
?>