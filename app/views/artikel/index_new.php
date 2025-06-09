<?php
require_once dirname(__DIR__) . '/config/session.php';
require_once dirname(__DIR__) . '/helpers/view_helper.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel - CMS</title>
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

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(138, 122, 216, 0.15);
        }

        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-title {
            color: var(--primary-color);
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .article-date {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .article-excerpt {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-actions {
            display: flex;
            gap: 0.5rem;
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

            .articles-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    
    <?php renderSidebar(); ?>

    <main class="main-content">
        <div class="content-header">
            <h1>Daftar Artikel</h1>
            <div>
                <a href="?controller=artikel&action=tambah" class="btn btn-primary">Tambah Artikel</a>
            </div>
        </div>

        <?php if(isset($_GET['status'])): ?>
            <?php if($_GET['status'] == 'success'): ?>
                <div class="alert alert-success">
                    <?php
                    if($_GET['action'] == 'tambah') echo "Artikel berhasil ditambahkan!";
                    else if($_GET['action'] == 'edit') echo "Artikel berhasil diperbarui!";
                    else if($_GET['action'] == 'hapus') echo "Artikel berhasil dihapus!";
                    ?>
                </div>
            <?php else: ?>
                <div class="alert">
                    <?php
                    if($_GET['action'] == 'tambah') echo "Gagal menambahkan artikel!";
                    else if($_GET['action'] == 'edit') echo "Gagal memperbarui artikel!";
                    else if($_GET['action'] == 'hapus') echo "Gagal menghapus artikel!";
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="articles-grid">
            <?php while($artikel = $artikels->fetch_assoc()): ?>
                <article class="article-card">
                    <?php if($artikel['gambar']): ?>
                        <img src="uploads/<?= $artikel['gambar'] ?>" alt="<?= htmlspecialchars($artikel['judul']) ?>" class="article-image">
                    <?php endif; ?>
                    <div class="article-content">
                        <h2 class="article-title"><?= htmlspecialchars($artikel['judul']) ?></h2>
                        <div class="article-date"><?= date('d F Y', strtotime($artikel['tanggal'])) ?></div>
                        <p class="article-excerpt"><?= htmlspecialchars(substr($artikel['isi'], 0, 150)) ?>...</p>
                        <div class="article-actions">
                            <a href="?controller=artikel&action=edit&id=<?= $artikel['id'] ?>" class="btn btn-secondary">Edit</a>
                            <a href="?controller=artikel&action=hapus&id=<?= $artikel['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html> 