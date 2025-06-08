<h2>Edit Artikel</h2>
<form method="POST">
    Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br><br>
    Isi: <textarea name="isi" rows="5" cols="40"><?= $data['isi'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>