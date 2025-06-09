<?php
// Aktifkan error agar mudah debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Saya asumsikan model login belum ada, jadi logika login di sini.
// Jika nanti ada model Login, bisa require_once __DIR__ . '/../models/Login.php';

class LoginController {
    public function index() {
        // Jika sudah login, redirect ke dashboard
        if (isset($_SESSION['admin'])) {
            header("Location: index.php?controller=dashboard&action=index");
            exit;
        }
        // Tampilkan view login
        include __DIR__ . '/../views/login/index.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            // Contoh sederhana: jika username dan password adalah "admin", login berhasil.
            if ($username === 'admin' && $password === 'admin') {
                $_SESSION['admin'] = $username;
                header("Location: index.php?controller=dashboard&action=index");
                exit;
            } else {
                $_SESSION['error'] = "Username atau password salah.";
                header("Location: index.php?controller=login&action=index");
                exit;
            }
        } else {
            header("Location: index.php?controller=login&action=index");
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=login&action=index");
        exit;
    }
} 