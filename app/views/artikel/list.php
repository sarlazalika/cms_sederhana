<?php
$title = 'Daftar Artikel - CMS';
$activeMenu = 'artikel';

ob_start();
?>

<div class="content-header">
    <h1>Daftar Artikel</h1>
    <div>
        <a href="?controller=artikel&action=tambah" class="btn btn-primary">Tambah Artikel</a>
    </div>
</div>

<style>
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

    @media (max-width: 768px) {
        .articles-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="articles-grid">
    <?php 
    if ($artikels && $artikels->num_rows > 0):
        while($artikel = $artikels->fetch_assoc()): 
    ?>
        <article class="article-card">
            <?php if($artikel['gambar']): ?>
                <img src="uploads/<?= htmlspecialchars($artikel['gambar']) ?>" 
                     alt="<?= htmlspecialchars($artikel['judul']) ?>" 
                     class="article-image">
            <?php endif; ?>
            <div class="article-content">
                <h2 class="article-title"><?= htmlspecialchars($artikel['judul']) ?></h2>
                <div class="article-date"><?= date('d F Y', strtotime($artikel['tanggal'])) ?></div>
                <p class="article-excerpt"><?= htmlspecialchars(substr($artikel['isi'], 0, 150)) ?>...</p>
                <div class="article-actions">
                    <a href="?controller=artikel&action=edit&id=<?= $artikel['id'] ?>" 
                       class="btn btn-secondary">Edit</a>
                    <a href="?controller=artikel&action=hapus&id=<?= $artikel['id'] ?>" 
                       class="btn btn-danger" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                </div>
            </div>
        </article>
    <?php 
        endwhile;
    else:
    ?>
        <div class="alert">
            Belum ada artikel. Silakan tambah artikel baru.
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
require_once dirname(__DIR__) . '/layouts/main.php';
?> 