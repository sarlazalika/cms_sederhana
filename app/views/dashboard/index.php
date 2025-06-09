<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
  <style>
    body { font-family: 'Segoe UI', Arial, sans-serif; background: linear-gradient(120deg, #4f8cff, #38e4ae); margin: 0; min-height: 100vh; }
    .dashboard-container { background: white; max-width: 400px; margin: 60px auto; border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.2); padding: 32px 24px; text-align: center; }
    h2 { color: #4f8cff; margin-bottom: 10px; }
    .welcome { font-size: 1.1em; margin-bottom: 20px; color: #333; }
    .stat { font-size: 2.5em; color: #38e4ae; margin: 20px 0; font-weight: bold; }
    .label { color: #888; font-size: 1em; }
    .actions { margin-top: 30px; }
    .actions a { display: inline-block; margin: 0 10px; padding: 10px 22px; border-radius: 5px; text-decoration: none; color: white; background: #4f8cff; transition: background 0.2s; font-weight: 500; }
    .actions a.logout { background: #ff4f4f; }
    .actions a:hover { background: #38e4ae; }
    .actions a.logout:hover { background: #d32f2f; }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h2>Dashboard Admin</h2>
    <div class="welcome">Selamat datang, <b><?= $_SESSION['admin']; ?></b>!</div>
    <div class="stat"><?= $total_artikel ?></div>
    <div class="label">Total Artikel</div>
    <div class="actions">
      <a href="index.php?controller=artikel&action=index">Kelola Artikel</a>
      <a href="index.php?controller=login&action=logout" class="logout">Logout</a>
    </div>
  </div>
</body>
</html> 