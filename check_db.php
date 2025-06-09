<?php
require_once 'config/database.php';

// Fungsi untuk menampilkan pesan
function showMessage($message, $isError = false) {
    $color = $isError ? 'red' : 'green';
    echo "<p style='color: $color'>$message</p>";
}

// Cek koneksi database
if ($conn->connect_error) {
    showMessage("Koneksi database gagal: " . $conn->connect_error, true);
    exit;
}
showMessage("✅ Koneksi database berhasil");

// Cek dan buat tabel artikel jika belum ada
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
    showMessage("✅ Tabel artikel siap digunakan");
} else {
    showMessage("❌ Gagal membuat tabel artikel: " . $conn->error, true);
    exit;
}

// Cek jumlah artikel
$result = $conn->query("SELECT COUNT(*) as total FROM artikel");
$row = $result->fetch_assoc();
$total = $row['total'];

if ($total == 0) {
    // Tambah artikel contoh
    $sql = "INSERT INTO artikel (judul, slug, isi, tanggal) VALUES 
        ('Selamat Datang di CMS', 'selamat-datang-di-cms', 'Ini adalah artikel pertama dalam sistem CMS. Silakan edit atau hapus artikel ini untuk memulai.', CURDATE()),
        ('Cara Menggunakan CMS', 'cara-menggunakan-cms', 'Berikut adalah panduan singkat cara menggunakan CMS:\n\n1. Tambah artikel baru\n2. Edit artikel yang ada\n3. Hapus artikel yang tidak diperlukan', CURDATE())";
    
    if ($conn->query($sql)) {
        showMessage("✅ Artikel contoh berhasil ditambahkan");
    } else {
        showMessage("❌ Gagal menambahkan artikel contoh: " . $conn->error, true);
    }
} else {
    showMessage("✅ Ditemukan $total artikel dalam database");
    
    // Tampilkan daftar artikel
    $result = $conn->query("SELECT * FROM artikel ORDER BY tanggal DESC");
    echo "<h3>Daftar Artikel:</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['judul']} (ID: {$row['id']}) - " . date('d/m/Y', strtotime($row['tanggal'])) . "</li>";
    }
    echo "</ul>";
}

$conn->close();
?> 