<?php
// Aktifkan error agar mudah debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Menggunakan koneksi database
require_once dirname(__DIR__, 2) . '/config/database.php';
require_once dirname(__DIR__) . '/models/admin.php';

class LoginController {
    public function index() {
        // Jika sudah login, redirect ke dashboard
        if (isset($_SESSION['admin'])) {
            header('Location: ?controller=dashboard');
            exit;
        }
        
        // Jika ada error dari proses login sebelumnya
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']); // Hapus error setelah ditampilkan
        
        // Tampilkan view login
        require_once dirname(__DIR__) . '/views/login/index.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                header('Location: ?controller=login&status=error');
                exit;
            }

            if (Admin::login($username, $password)) {
                $_SESSION['admin'] = $username;
                header('Location: ?controller=dashboard');
            } else {
                header('Location: ?controller=login&status=error');
            }
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ?controller=login');
        exit;
    }
} 