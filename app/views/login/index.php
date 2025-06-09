<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CMS</title>
    <style>
        :root {
            --primary-color: #8A7AD8;
            --secondary-color: #FF69B4;
            --accent-color: #B19CD9;
            --bg-color: #F8F9FE;
            --text-color: #4A4A4A;
            --border-color: #E0E0E0;
            --shadow: 0 4px 15px rgba(138, 122, 216, 0.1);
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: var(--bg-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            position: relative;
            overflow: hidden;
        }

        /* Efek background */
        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(138, 122, 216, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 105, 180, 0.1) 0%, transparent 50%);
            animation: gradientMove 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradientMove {
            0% { transform: translate(0, 0); }
            50% { transform: translate(-50%, -50%); }
            100% { transform: translate(0, 0); }
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
            border: 1px solid var(--border-color);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .login-header p {
            color: #888;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #F8F9FE;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(138, 122, 216, 0.1);
            background: white;
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--gradient);
            color: white;
            margin-top: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 122, 216, 0.2);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            background: #FFF5F5;
            border: 1px solid #FFE3E3;
            color: #FF6B6B;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="?controller=login&action=login" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html> 