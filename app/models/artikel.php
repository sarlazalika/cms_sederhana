<?php
require_once 'config/database.php';

class Artikel {
    public static function getAll($cari = '') {
        global $conn;
        $sql = "SELECT * FROM artikel WHERE judul LIKE '%$cari%' ORDER BY tanggal DESC";
        return $conn->query($sql);
    }
    public static function getById($id) {
        global $conn;
        return $conn->query("SELECT * FROM artikel WHERE id = $id")->fetch_assoc();
    }
    public static function tambah($judul, $isi) {
        global $conn;
        $tanggal = date('Y-m-d');
        $conn->query("INSERT INTO artikel (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')");
    }
    public static function edit($id, $judul, $isi) {
        global $conn;
        $conn->query("UPDATE artikel SET judul='$judul', isi='$isi' WHERE id=$id");
    }
    public static function hapus($id) {
        global $conn;
        $conn->query("DELETE FROM artikel WHERE id=$id");
    }
}
?>