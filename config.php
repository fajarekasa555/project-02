<?php
// config.php - Konfigurasi Database dan Aplikasi

// Start output buffering to prevent "headers already sent" errors
ob_start();

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'arsirab_cms');

// Site Configuration
define('SITE_URL', 'http://localhost/project-02');
define('ADMIN_URL', SITE_URL . '/admin');
define('UPLOAD_PATH', __DIR__ . '/uploads/');
define('UPLOAD_URL', SITE_URL . '/uploads/');

// Security
define('SESSION_LIFETIME', 3600); // 1 hour
define('MAX_UPLOAD_SIZE', 5242880); // 5MB

// Koneksi Database
function getConnection() {
    static $conn = null;
    
    if ($conn === null) {
        try {
            $conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch(PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
    
    return $conn;
}

// Helper Functions
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function redirect($url) {
    // Clear any output buffer
    if (ob_get_length()) {
        ob_end_clean();
    }
    
    // Check if headers already sent
    if (!headers_sent()) {
        header("Location: $url");
        exit();
    } else {
        // Fallback: use JavaScript redirect
        echo "<script>window.location.href='$url';</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=$url'></noscript>";
        exit();
    }
}

function isLoggedIn() {
    return isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        redirect(ADMIN_URL . '/login.php');
    }
}

function uploadImage($file, $folder = 'portfolio') {
    $target_dir = UPLOAD_PATH . $folder . '/';
    
    // Buat folder jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    
    if (!in_array($file['type'], $allowed_types)) {
        return ['success' => false, 'message' => 'Tipe file tidak diizinkan. Hanya JPG, PNG, GIF, WEBP.'];
    }
    
    if ($file['size'] > MAX_UPLOAD_SIZE) {
        return ['success' => false, 'message' => 'Ukuran file terlalu besar. Maksimal 5MB.'];
    }
    
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '_' . time() . '.' . $extension;
    $target_file = $target_dir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return ['success' => true, 'filename' => $folder . '/' . $filename];
    } else {
        return ['success' => false, 'message' => 'Gagal upload file.'];
    }
}

function deleteImage($filename) {
    if ($filename && file_exists(UPLOAD_PATH . $filename)) {
        unlink(UPLOAD_PATH . $filename);
        return true;
    }
    return false;
}

function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function timeAgo($timestamp) {
    $time = strtotime($timestamp);
    $diff = time() - $time;
    
    if ($diff < 60) {
        return $diff . ' detik yang lalu';
    } elseif ($diff < 3600) {
        return floor($diff / 60) . ' menit yang lalu';
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . ' jam yang lalu';
    } elseif ($diff < 604800) {
        return floor($diff / 86400) . ' hari yang lalu';
    } else {
        return date('d M Y', $time);
    }
}

// Alert Messages
function setAlert($type, $message) {
    $_SESSION['alert'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getAlert() {
    if (isset($_SESSION['alert'])) {
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
        return $alert;
    }
    return null;
}

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>