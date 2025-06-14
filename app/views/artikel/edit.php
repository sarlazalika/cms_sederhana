<?php
require_once dirname(__DIR__, 2) . '/models/kategori.php';
$kategoris = Kategori::getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - CMS</title>
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
            color: var(--text-color);
            display: flex;
        }

        .sidebar {
            width: 250px;
            background: white;
            padding: 2rem;
            box-shadow: var(--shadow);
            position: fixed;
            height: 100vh;
            border-right: 1px solid var(--border-color);
        }

        .sidebar-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .sidebar-header h1 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--gradient);
            color: white;
        }

        .nav-link i {
            margin-right: 0.8rem;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid var(--border-color);
        }

        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #888;
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
            padding: 0.8rem;
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

        textarea.form-control {
            min-height: 200px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 122, 216, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            margin-top: 1rem;
        }

        .btn-secondary:hover {
            background: var(--gradient);
            color: white;
            border-color: transparent;
        }

        .form-footer {
            margin-top: 2rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1001;
                background: var(--gradient);
                color: white;
                border: none;
                padding: 0.5rem;
                border-radius: 5px;
                cursor: pointer;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h1>CMS Panel</h1>
            <p>Welcome, <?= $_SESSION['username'] ?></p>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="?controller=dashboard" class="nav-link">
                        <i>📊</i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=artikel" class="nav-link active">
                        <i>📝</i> Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=login&action=logout" class="nav-link">
                        <i>🚪</i> Logout
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <div class="form-container">
            <div class="form-header">
                <h1>Edit Artikel</h1>
                <p>Edit artikel yang sudah ada</p>
            </div>

            <form action="?controller=artikel&action=edit&id=<?= $artikel['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="judul">Judul Artikel</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="<?= htmlspecialchars($artikel['judul']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="isi">Isi Artikel</label>
                    <textarea id="isi" name="isi" class="form-control" required><?= htmlspecialchars($artikel['isi']) ?></textarea>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?controller=artikel" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>