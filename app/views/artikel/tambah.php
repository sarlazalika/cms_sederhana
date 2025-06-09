<?php
$title = 'Tambah Artikel - CMS';
$activeMenu = 'artikel';

ob_start();
?>

<div class="form-container">
    <div class="form-header">
        <h1>Tambah Artikel Baru</h1>
        <p>Buat artikel baru dengan mengisi form di bawah ini</p>
    </div>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
        <div class="alert">
            Gagal menambahkan artikel. Silakan coba lagi.
        </div>
    <?php endif; ?>

    <form action="?controller=artikel&action=tambah" method="POST">
        <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" id="judul" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel</label>
            <textarea id="isi" name="isi" class="form-control" required></textarea>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Tambah Artikel</button>
            <a href="?controller=artikel" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<style>
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

    .form-footer {
        margin-top: 2rem;
        text-align: center;
    }
</style>

<?php
$content = ob_get_clean();
require_once dirname(__DIR__) . '/layouts/main.php';
?>