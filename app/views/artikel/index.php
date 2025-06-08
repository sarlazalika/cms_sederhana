<h2>Daftar Artikel</h2>
<a href="index.php?controller=artikel&action=tambah">Tambah Artikel</a><br><br>
<table border="1" cellpadding="10">
    <tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Aksi</th></tr>
<?php $no = 1; while ($row = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tanggal'] ?></td>
    <td>
        <a href="index.php?controller=artikel&action=edit&id=<?= $row['id'] ?>">Edit</a> |
        <a href="index.php?controller=artikel&action=hapus&id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>