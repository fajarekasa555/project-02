<?php
$page_title = 'Dashboard';
include 'header.php';

$conn = getConnection();

// Get statistics
$stats = [];

// Portfolio count
$stmt = $conn->query("SELECT COUNT(*) as total FROM portfolio WHERE status = 'aktif'");
$stats['portfolio'] = $stmt->fetch()['total'];

// Layanan count
$stmt = $conn->query("SELECT COUNT(*) as total FROM layanan WHERE status = 'aktif'");
$stats['layanan'] = $stmt->fetch()['total'];

// Testimoni count
$stmt = $conn->query("SELECT COUNT(*) as total FROM testimoni WHERE status = 'aktif'");
$stats['testimoni'] = $stmt->fetch()['total'];

// Pesan masuk baru
$stmt = $conn->query("SELECT COUNT(*) as total FROM pesan_masuk WHERE status = 'baru'");
$stats['pesan_baru'] = $stmt->fetch()['total'];

// Latest portfolio
$stmt = $conn->query("SELECT * FROM portfolio ORDER BY created_at DESC LIMIT 5");
$latest_portfolio = $stmt->fetchAll();

// Latest messages
$stmt = $conn->query("SELECT * FROM pesan_masuk ORDER BY created_at DESC LIMIT 5");
$latest_messages = $stmt->fetchAll();
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Portfolio Card -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-blue-100 w-14 h-14 rounded-xl flex items-center justify-center">
                <i class="fas fa-images text-blue-600 text-2xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800"><?= $stats['portfolio'] ?></span>
        </div>
        <h3 class="text-gray-600 font-semibold">Portfolio Aktif</h3>
        <a href="portfolio.php" class="text-blue-600 text-sm mt-2 inline-block hover:underline">
            Kelola Portfolio <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Layanan Card -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-green-100 w-14 h-14 rounded-xl flex items-center justify-center">
                <i class="fas fa-briefcase text-green-600 text-2xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800"><?= $stats['layanan'] ?></span>
        </div>
        <h3 class="text-gray-600 font-semibold">Layanan Aktif</h3>
        <a href="layanan.php" class="text-green-600 text-sm mt-2 inline-block hover:underline">
            Kelola Layanan <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Testimoni Card -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-yellow-100 w-14 h-14 rounded-xl flex items-center justify-center">
                <i class="fas fa-star text-yellow-600 text-2xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800"><?= $stats['testimoni'] ?></span>
        </div>
        <h3 class="text-gray-600 font-semibold">Testimoni</h3>
        <a href="testimoni.php" class="text-yellow-600 text-sm mt-2 inline-block hover:underline">
            Kelola Testimoni <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <!-- Pesan Card -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-red-100 w-14 h-14 rounded-xl flex items-center justify-center">
                <i class="fas fa-envelope text-red-600 text-2xl"></i>
            </div>
            <span class="text-3xl font-bold text-gray-800"><?= $stats['pesan_baru'] ?></span>
        </div>
        <h3 class="text-gray-600 font-semibold">Pesan Baru</h3>
        <a href="pesan.php" class="text-red-600 text-sm mt-2 inline-block hover:underline">
            Lihat Pesan <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Latest Portfolio -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Portfolio Terbaru</h3>
            <a href="portfolio.php" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>
        
        <?php if (empty($latest_portfolio)): ?>
            <p class="text-gray-500 text-center py-8">Belum ada portfolio</p>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($latest_portfolio as $item): ?>
                <div class="flex items-center space-x-4 pb-4 border-b last:border-b-0">
                    <?php if ($item['gambar']): ?>
                        <img src="<?= UPLOAD_URL . $item['gambar'] ?>" alt="<?= $item['judul'] ?>" 
                             class="w-16 h-16 object-cover rounded-lg">
                    <?php else: ?>
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                    <?php endif; ?>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800"><?= $item['judul'] ?></h4>
                        <p class="text-sm text-gray-600"><?= $item['lokasi'] ?> • <?= $item['tahun'] ?></p>
                    </div>
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">
                        <?= ucfirst($item['kategori']) ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Latest Messages -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Pesan Terbaru</h3>
            <a href="pesan.php" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>
        
        <?php if (empty($latest_messages)): ?>
            <p class="text-gray-500 text-center py-8">Belum ada pesan</p>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($latest_messages as $msg): ?>
                <div class="pb-4 border-b last:border-b-0">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-gray-800"><?= $msg['nama'] ?></h4>
                        <?php
                        $badge_colors = [
                            'baru' => 'bg-red-100 text-red-600',
                            'dibaca' => 'bg-yellow-100 text-yellow-600',
                            'dibalas' => 'bg-green-100 text-green-600'
                        ];
                        ?>
                        <span class="text-xs <?= $badge_colors[$msg['status']] ?> px-2 py-1 rounded">
                            <?= ucfirst($msg['status']) ?>
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">
                        <?= substr($msg['pesan'], 0, 100) ?><?= strlen($msg['pesan']) > 100 ? '...' : '' ?>
                    </p>
                    <p class="text-xs text-gray-500">
                        <i class="far fa-clock mr-1"></i>
                        <?= timeAgo($msg['created_at']) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>