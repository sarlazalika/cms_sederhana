<?php
require_once 'app/models/Artikel.php';

class ArtikelController {
    public function index() {
        $cari = $_GET['cari'] ?? '';
        $data = Artikel::getAll($cari);
        include 'app/views/artikel/index.php';
    }
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Artikel::tambah($_POST['judul'], $_POST['isi']);
            header("Location: index.php?controller=artikel&action=index");
        }
        include 'app/views/artikel/tambah.php';
    }
    public function edit() {
        $id = $_GET['id'];
        $data = Artikel::getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Artikel::edit($id, $_POST['judul'], $_POST['isi']);
            header("Location: index.php?controller=artikel&action=index");
        }
        include 'app/views/artikel/edit.php';
    }
    public function hapus() {
        Artikel::hapus($_GET['id']);
        header("Location: index.php?controller=artikel&action=index");
    }
}
?>