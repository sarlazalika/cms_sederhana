<?php
require_once __DIR__ . '/../../config/auth.php';
requireLogin();

$title = $title ?? 'CMS Admin';
$activeMenu = $activeMenu ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
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

        .sidebar-header h3 {
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

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .content-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
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
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 122, 216, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            margin-left: 0.5rem;
        }

        .btn-secondary:hover {
            background: var(--gradient);
            color: white;
            border-color: transparent;
        }

        .btn-danger {
            background: #FF6B6B;
            color: white;
        }

        .btn-danger:hover {
            background: #FF5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.2);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            background: #FFF3F3;
            border: 1px solid #FFE0E0;
            color: #FF6B6B;
        }

        .alert-success {
            background: #F0FFF4;
            border-color: #C6F6D5;
            color: #48BB78;
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

            .content-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .content-header .btn {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    
    <aside class="sidebar">
        <div class="sidebar-header">
            <h1>CMS Panel</h1>
            <p>Welcome, <?= htmlspecialchars($_SESSION['admin'] ?? 'Admin') ?></p>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="?controller=dashboard" class="nav-link <?= $activeMenu === 'dashboard' ? 'active' : '' ?>">
                        <i>📊</i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=artikel" class="nav-link <?= $activeMenu === 'artikel' ? 'active' : '' ?>">
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
        <?php if(isset($_GET['status'])): ?>
            <?php if($_GET['status'] == 'success'): ?>
                <div class="alert alert-success">
                    <?php
                    if(isset($_GET['action'])) {
                        switch($_GET['action']) {
                            case 'tambah':
                                echo "Artikel berhasil ditambahkan!";
                                break;
                            case 'edit':
                                echo "Artikel berhasil diperbarui!";
                                break;
                            case 'hapus':
                                echo "Artikel berhasil dihapus!";
                                break;
                        }
                    }
                    ?>
                </div>
            <?php else: ?>
                <div class="alert">
                    <?php
                    if(isset($_GET['action'])) {
                        switch($_GET['action']) {
                            case 'tambah':
                                echo "Gagal menambahkan artikel!";
                                break;
                            case 'edit':
                                echo "Gagal memperbarui artikel!";
                                break;
                            case 'hapus':
                                echo "Gagal menghapus artikel!";
                                break;
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php echo $content ?? ''; ?>
    </main>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html> 