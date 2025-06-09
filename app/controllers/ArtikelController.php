<?php
require_once dirname(__DIR__) . '/config/auth.php';
require_once dirname(__DIR__) . '/models/artikel.php';

class ArtikelController {
    private $artikelModel;
    
    public function __construct() {
        $this->artikelModel = new Artikel();
        requireLogin();
    }

    public function index() {
        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
        $artikels = Artikel::getAll($cari);
        
        // Debugging
        if ($artikels === false) {
            die("Error mengambil data artikel: " . $GLOBALS['conn']->error);
        }
        
        // Debugging jumlah artikel
        $total = $artikels->num_rows;
        error_log("Jumlah artikel: " . $total);
        
        require_once dirname(__DIR__) . '/views/artikel/list.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            
            if (empty($judul) || empty($isi)) {
                header('Location: ?controller=artikel&action=tambah&status=error');
                exit;
            }

            if (Artikel::tambah($judul, $isi)) {
                header('Location: ?controller=artikel&status=success&action=tambah');
            } else {
                header('Location: ?controller=artikel&action=tambah&status=error');
            }
            exit;
        }
        require_once dirname(__DIR__) . '/views/artikel/tambah.php';
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            header('Location: ?controller=artikel');
            exit;
        }

        $id = $_GET['id'];
        $artikel = Artikel::getById($id);

        if (!$artikel) {
            header('Location: ?controller=artikel&status=error&action=edit');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            
            if (empty($judul) || empty($isi)) {
                header("Location: ?controller=artikel&action=edit&id=$id&status=error");
                exit;
            }

            if (Artikel::edit($id, $judul, $isi)) {
                header('Location: ?controller=artikel&status=success&action=edit');
            } else {
                header("Location: ?controller=artikel&action=edit&id=$id&status=error");
            }
            exit;
        }

        require_once dirname(__DIR__) . '/views/artikel/edit.php';
    }

    public function hapus() {
        if (!isset($_GET['id'])) {
            header('Location: ?controller=artikel');
            exit;
        }

        $id = $_GET['id'];
        
        if (Artikel::hapus($id)) {
            header('Location: ?controller=artikel&status=success&action=hapus');
        } else {
            header('Location: ?controller=artikel&status=error&action=hapus');
        }
        exit;
    }
}
?>
