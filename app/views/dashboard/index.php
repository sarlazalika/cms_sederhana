<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CMS</title>
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

        /* Sidebar Styles */
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

        .sidebar-header p {
            color: #888;
            font-size: 0.9rem;
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

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .dashboard-header p {
            color: #888;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(138, 122, 216, 0.15);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #888;
            font-size: 0.9rem;
        }

        .recent-articles {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
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

        .article-list {
            list-style: none;
        }

        .article-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .article-item:last-child {
            border-bottom: none;
        }

        .article-info h3 {
            color: var(--text-color);
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .article-date {
            color: #888;
            font-size: 0.9rem;
        }

        .article-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .btn-secondary:hover {
            background: var(--gradient);
            color: white;
            border-color: transparent;
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .article-item {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .article-actions {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h1>CMS Panel</h1>
            <p>Welcome, <?= isset($_SESSION['admin']) ? $_SESSION['admin'] : 'Admin' ?></p>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="?controller=dashboard" class="nav-link active">
                        <i>📊</i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=artikel" class="nav-link">
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
        <div class="dashboard-header">
            <h1>Dashboard</h1>
            <p>Selamat datang di panel admin CMS</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-value"><?= isset($total_artikel) ? $total_artikel : 0 ?></div>
                <div class="stat-label">Total Artikel</div>
            </div>
        </div>

        <div class="recent-articles">
            <div class="section-header">
                <h2>Artikel Terbaru</h2>
                <a href="?controller=artikel&action=tambah" class="btn btn-primary">Tambah Artikel</a>
            </div>

            <?php if(isset($artikels) && $artikels): ?>
                <ul class="article-list">
                    <?php while($artikel = $artikels->fetch_assoc()): ?>
                        <li class="article-item">
                            <div class="article-info">
                                <h3><?= htmlspecialchars($artikel['judul']) ?></h3>
                                <div class="article-date"><?= date('d F Y', strtotime($artikel['tanggal'])) ?></div>
                            </div>
                            <div class="article-actions">
                                <a href="?controller=artikel&action=edit&id=<?= $artikel['id'] ?>" class="btn btn-secondary">Edit</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p style="text-align: center; color: #888; padding: 2rem;">Belum ada artikel</p>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html> 