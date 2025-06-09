<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Artikel</title>
  <style>
    body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f8fb; margin: 0; }
    .container { max-width: 800px; margin: 40px auto; background: white; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.08); padding: 32px 24px; }
    h2 { color: #4f8cff; margin-bottom: 20px; }
    .add-btn { background: #38e4ae; color: white; padding: 10px 18px; border: none; border-radius: 5px; text-decoration: none; font-weight: 500; margin-bottom: 20px; display: inline-block; transition: background 0.2s; }
    .add-btn:hover { background: #4f8cff; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 12px 8px; text-align: left; }
    th { background: #f0f4fa; color: #333; }
    tr:nth-child(even) { background: #f9fbfd; }
    .aksi-btn { background: #4f8cff; color: white; border: none; border-radius: 4px; padding: 6px 14px; text-decoration: none; margin-right: 6px; transition: background 0.2s; }
    .aksi-btn.edit { background: #38e4ae; }
    .aksi-btn.delete { background: #ff4f4f; }
    .aksi-btn:hover { opacity: 0.85; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Daftar Artikel</h2>
    <a href="index.php?controller=artikel&action=tambah" class="add-btn">+ Tambah Artikel</a>
    <table>
      <tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Aksi</th></tr>
      <?php $no = 1; while ($row = $data->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td><?= $row['tanggal'] ?></td>
        <td>
          <a href="index.php?controller=artikel&action=edit&id=<?= $row['id'] ?>" class="aksi-btn edit">Edit</a>
          <a href="index.php?controller=artikel&action=hapus&id=<?= $row['id'] ?>" class="aksi-btn delete" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>