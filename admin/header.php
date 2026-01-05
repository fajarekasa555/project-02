<?php
// Pastikan tidak ada output sebelum ini
require_once '../config.php';

// Check login sebelum ada output HTML
requireLogin();

// Set page variables
$page_title = $page_title ?? 'Dashboard';
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - ArsiRAB CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-xl flex-shrink-0">
            <div class="p-6 border-b">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 w-12 h-12 rounded-xl flex items-center justify-center">
                        <i class="fas fa-building-columns text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">ArsiRAB CMS</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </div>
            </div>

            <nav class="p-4">
                <a href="index.php" class="sidebar-link <?= $current_page === 'index' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="portfolio.php" class="sidebar-link <?= $current_page === 'portfolio' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-images w-5"></i>
                    <span>Portfolio</span>
                </a>
                
                <a href="layanan.php" class="sidebar-link <?= $current_page === 'layanan' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-briefcase w-5"></i>
                    <span>Layanan</span>
                </a>
                
                <a href="paket-harga.php" class="sidebar-link <?= $current_page === 'paket-harga' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-tags w-5"></i>
                    <span>Paket Harga</span>
                </a>
                
                <a href="testimoni.php" class="sidebar-link <?= $current_page === 'testimoni' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-star w-5"></i>
                    <span>Testimoni</span>
                </a>
                
                <a href="tentang.php" class="sidebar-link <?= $current_page === 'tentang' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-info-circle w-5"></i>
                    <span>Tentang Kami</span>
                </a>
                
                <a href="kontak.php" class="sidebar-link <?= $current_page === 'kontak' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-address-book w-5"></i>
                    <span>Kontak Info</span>
                </a>
                
                <a href="pesan.php" class="sidebar-link <?= $current_page === 'pesan' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-envelope w-5"></i>
                    <span>Pesan Masuk</span>
                </a>
                
                <a href="settings.php" class="sidebar-link <?= $current_page === 'settings' ? 'active' : '' ?> flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 hover:bg-gray-100 transition">
                    <i class="fas fa-cog w-5"></i>
                    <span>Pengaturan</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-4 border-t">
                <a href="logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm p-6 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800"><?= $page_title ?></h2>
                    <p class="text-gray-600 text-sm mt-1">Kelola konten website ArsiRAB</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800"><?= $_SESSION['admin_nama'] ?? 'Admin' ?></p>
                        <p class="text-xs text-gray-500"><?= $_SESSION['admin_username'] ?? '' ?></p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                        <?= strtoupper(substr($_SESSION['admin_nama'] ?? 'A', 0, 1)) ?>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <?php
                $alert = getAlert();
                if ($alert):
                    $bg_color = $alert['type'] === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';
                    $icon = $alert['type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
                ?>
                <div class="<?= $bg_color ?> border px-4 py-3 rounded-lg mb-6">
                    <i class="fas <?= $icon ?> mr-2"></i>
                    <?= $alert['message'] ?>
                </div>
                <?php endif; ?>