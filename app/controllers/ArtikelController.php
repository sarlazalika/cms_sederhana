<?php
// Aktifkan error agar mudah debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Path benar ke model
require_once __DIR__ . '/../models/Artikel.php';

class ArtikelController {
    public function index() {
        $cari = $_GET['cari'] ?? '';
        $data = Artikel::getAll($cari);
        include __DIR__ . '/../views/artikel/index.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Artikel::tambah($_POST['judul'], $_POST['isi']);
            header("Location: index.php?controller=artikel&action=index");
            exit;
        }
        include __DIR__ . '/../views/artikel/tambah.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $data = Artikel::getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Artikel::edit($id, $_POST['judul'], $_POST['isi']);
            header("Location: index.php?controller=artikel&action=index");
            exit;
        }
        include __DIR__ . '/../views/artikel/edit.php';
    }

    public function hapus() {
        $id = $_GET['id'];
        Artikel::hapus($id);
        header("Location: index.php?controller=artikel&action=index");
        exit;
    }
}
?>
