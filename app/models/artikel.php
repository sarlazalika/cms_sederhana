<?php
// Menggunakan path absolut dari root project
require_once dirname(__DIR__) . '/../config/database.php';

class Artikel {
    public static function getAll($cari = '') {
        global $conn;
        $cari = $conn->real_escape_string($cari);
        $sql = "SELECT * FROM artikel 
                WHERE judul LIKE '%$cari%' 
                ORDER BY tanggal DESC";
        return $conn->query($sql);
    }
    public static function getById($id) {
        global $conn;
        $id = (int)$id;
        $sql = "SELECT * FROM artikel WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }
    public static function tambah($judul, $isi, $gambar = null) {
        global $conn;
        $judul = $conn->real_escape_string($judul);
        $isi = $conn->real_escape_string($isi);
        $slug = self::createSlug($judul);
        $tanggal = date('Y-m-d');
        $gambar = $gambar ? "'" . $conn->real_escape_string($gambar) . "'" : 'NULL';
        
        $sql = "INSERT INTO artikel (judul, slug, isi, gambar, tanggal) 
                VALUES ('$judul', '$slug', '$isi', $gambar, '$tanggal')";
        return $conn->query($sql);
    }
    public static function edit($id, $judul, $isi, $gambar = null) {
        global $conn;
        $id = (int)$id;
        $judul = $conn->real_escape_string($judul);
        $isi = $conn->real_escape_string($isi);
        $slug = self::createSlug($judul);
        $gambar = $gambar ? "'" . $conn->real_escape_string($gambar) . "'" : 'NULL';
        
        $sql = "UPDATE artikel 
                SET judul='$judul', slug='$slug', isi='$isi', gambar=$gambar 
                WHERE id=$id";
        return $conn->query($sql);
    }
    public static function hapus($id) {
        global $conn;
        $id = (int)$id;
        return $conn->query("DELETE FROM artikel WHERE id=$id");
    }
    public static function getTotal() {
        global $conn;
        $result = $conn->query("SELECT COUNT(*) as total FROM artikel");
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    public static function getLatest($limit = 5) {
        global $conn;
        $limit = (int)$limit;
        $sql = "SELECT * FROM artikel 
                ORDER BY tanggal DESC 
                LIMIT $limit";
        return $conn->query($sql);
    }
    private static function createSlug($string) {
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
        $string = preg_replace('/[\s-]+/', ' ', $string);
        $string = preg_replace('/\s/', '-', $string);
        return $string;
    }
}
?>