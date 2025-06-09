<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Artikel</title>
  <style>
    body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f8fb; margin: 0; }
    .container { max-width: 500px; margin: 40px auto; background: white; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.08); padding: 32px 24px; }
    h2 { color: #38e4ae; margin-bottom: 20px; }
    form { display: flex; flex-direction: column; }
    input[type="text"], textarea { margin-bottom: 16px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; }
    button { background: #38e4ae; color: white; border: none; padding: 12px; border-radius: 5px; font-size: 1em; cursor: pointer; font-weight: 500; transition: background 0.2s; }
    button:hover { background: #4f8cff; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Tambah Artikel</h2>
    <form method="POST">
      Judul:<br>
      <input type="text" name="judul" required><br>
      Isi:<br>
      <textarea name="isi" rows="5" cols="40" required></textarea><br>
      <button type="submit">Simpan</button>
    </form>
  </div>
</body>
</html>