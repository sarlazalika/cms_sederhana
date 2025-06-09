<?php
// Aktifkan error agar mudah debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pastikan session sudah dimulai (biasanya di front controller)
// session_start();

// Cek session, jika belum login, redirect ke login
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?controller=login&action=index");
    exit;
}

// Saya asumsikan model Artikel sudah ada, jadi require model tersebut.
require_once __DIR__ . '/../models/Artikel.php';

class DashboardController {
    public function index() {
        // Ambil total artikel dari model (misal dengan fungsi getTotal)
        // Jika belum ada, bisa gunakan query langsung atau tambahkan fungsi di model.
        global $conn;
        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM artikel");
        $data = mysqli_fetch_assoc($result);
        $total_artikel = $data['total'];
        // Tampilkan view dashboard
        include __DIR__ . '/../views/dashboard/index.php';
    }
} 