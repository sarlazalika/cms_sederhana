<?php
require_once dirname(__DIR__) . '/../config/database.php';

class Kategori {
    public static function getAll() {
        global $conn;
        $sql = "SELECT k.*, COUNT(a.id) as total_artikel 
                FROM kategori k 
                LEFT JOIN artikel a ON k.id = a.kategori_id 
                GROUP BY k.id 
                ORDER BY k.nama ASC";
        return $conn->query($sql);
    }

    public static function getById($id) {
        global $conn;
        $id = (int)$id;
        $sql = "SELECT * FROM kategori WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function tambah($nama, $slug, $deskripsi) {
        global $conn;
        $nama = $conn->real_escape_string($nama);
        $slug = $conn->real_escape_string($slug);
        $deskripsi = $conn->real_escape_string($deskripsi);
        
        $sql = "INSERT INTO kategori (nama, slug, deskripsi) VALUES ('$nama', '$slug', '$deskripsi')";
        return $conn->query($sql);
    }

    public static function edit($id, $nama, $slug, $deskripsi) {
        global $conn;
        $id = (int)$id;
        $nama = $conn->real_escape_string($nama);
        $slug = $conn->real_escape_string($slug);
        $deskripsi = $conn->real_escape_string($deskripsi);
        
        $sql = "UPDATE kategori SET nama='$nama', slug='$slug', deskripsi='$deskripsi' WHERE id=$id";
        return $conn->query($sql);
    }

    public static function hapus($id) {
        global $conn;
        $id = (int)$id;
        // Set kategori_id menjadi NULL untuk artikel yang terkait
        $conn->query("UPDATE artikel SET kategori_id = NULL WHERE kategori_id = $id");
        // Hapus kategori
        return $conn->query("DELETE FROM kategori WHERE id = $id");
    }

    public static function getForSelect() {
        global $conn;
        $sql = "SELECT id, nama FROM kategori ORDER BY nama ASC";
        return $conn->query($sql);
    }
}
?> 