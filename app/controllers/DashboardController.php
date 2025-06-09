<?php
// Aktifkan error agar mudah debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Pastikan session sudah dimulai (biasanya di front controller)
// session_start();

// Path benar ke model
require_once dirname(__DIR__) . '/models/artikel.php';

class DashboardController {
    public function __construct() {
        // Cek session
        if (!isset($_SESSION['admin'])) {
            header('Location: ?controller=login');
            exit;
        }
    }

    public function index() {
        // Ambil total artikel
        $total_artikel = Artikel::getTotal();
        
        // Ambil artikel terbaru (5 artikel terakhir)
        $artikels = Artikel::getLatest(5);
        
        // Kirim data ke view
        require_once dirname(__DIR__) . '/views/dashboard/index.php';
    }
} 