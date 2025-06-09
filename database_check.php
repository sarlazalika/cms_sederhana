<?php
require_once 'config/database.php';

echo "<h2>Status Database</h2>";

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "<p>✅ Koneksi database berhasil</p>";

// Cek tabel artikel
$result = $conn->query("SHOW TABLES LIKE 'artikel'");
if ($result->num_rows > 0) {
    echo "<p>✅ Tabel artikel ditemukan</p>";
    
    // Cek struktur tabel
    $result = $conn->query("DESCRIBE artikel");
    echo "<h3>Struktur Tabel Artikel:</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['Field']} - {$row['Type']}</li>";
    }
    echo "</ul>";
    
    // Cek jumlah data
    $result = $conn->query("SELECT COUNT(*) as total FROM artikel");
    $row = $result->fetch_assoc();
    echo "<p>Jumlah artikel: {$row['total']}</p>";
    
    // Tampilkan data artikel
    $result = $conn->query("SELECT * FROM artikel ORDER BY tanggal DESC");
    if ($result->num_rows > 0) {
        echo "<h3>Daftar Artikel:</h3>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['judul']} (ID: {$row['id']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>❌ Tidak ada artikel dalam database</p>";
    }
} else {
    echo "<p>❌ Tabel artikel tidak ditemukan</p>";
    
    // Buat tabel artikel jika belum ada
    $sql = "CREATE TABLE IF NOT EXISTS artikel (
        id INT AUTO_INCREMENT PRIMARY KEY,
        judul VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL,
        isi TEXT NOT NULL,
        gambar VARCHAR(255),
        tanggal DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql)) {
        echo "<p>✅ Tabel artikel berhasil dibuat</p>";
    } else {
        echo "<p>❌ Gagal membuat tabel artikel: " . $conn->error . "</p>";
    }
}

// Tambah data contoh jika tabel kosong
$result = $conn->query("SELECT COUNT(*) as total FROM artikel");
$row = $result->fetch_assoc();
if ($row['total'] == 0) {
    $sql = "INSERT INTO artikel (judul, slug, isi, tanggal) VALUES 
        ('Artikel Pertama', 'artikel-pertama', 'Ini adalah artikel pertama dalam sistem CMS.', CURDATE()),
        ('Artikel Kedua', 'artikel-kedua', 'Ini adalah artikel kedua dalam sistem CMS.', CURDATE())";
    
    if ($conn->query($sql)) {
        echo "<p>✅ Data contoh berhasil ditambahkan</p>";
    } else {
        echo "<p>❌ Gagal menambahkan data contoh: " . $conn->error . "</p>";
    }
}

$conn->close();
?> 