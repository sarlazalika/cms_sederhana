<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login CMS MVC</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .login-container { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
    h2 { text-align: center; color: #333; }
    form { display: flex; flex-direction: column; }
    input[type="text"], input[type="password"] { margin: 10px 0; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
    button { background: #4CAF50; color: white; border: none; padding: 10px; border-radius: 4px; cursor: pointer; }
    button:hover { background: #45a049; }
    .error { color: red; text-align: center; margin: 10px 0; }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login CMS MVC</h2>
    <?php if (isset($_SESSION['error'])) { ?>
      <div class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php } ?>
    <form method="POST" action="index.php?controller=login&action=login">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html> 