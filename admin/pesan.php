<?php
$page_title = 'Pesan Masuk';
include 'header.php';

$conn = getConnection();

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM pesan_masuk WHERE id = ?");
    if ($stmt->execute([$id])) {
        setAlert('success', 'Pesan berhasil dihapus!');
    } else {
        setAlert('error', 'Gagal menghapus pesan!');
    }
    redirect(ADMIN_URL . '/pesan.php');
}

// Handle Status Update
if (isset($_GET['status']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $status = sanitize($_GET['status']);
    
    $stmt = $conn->prepare("UPDATE pesan_masuk SET status = ? WHERE id = ?");
    if ($stmt->execute([$status, $id])) {
        setAlert('success', 'Status pesan berhasil diupdate!');
    } else {
        setAlert('error', 'Gagal update status!');
    }
    redirect(ADMIN_URL . '/pesan.php');
}

// Get pesan list
$filter = $_GET['filter'] ?? 'all';
$sql = "SELECT * FROM pesan_masuk";

if ($filter === 'baru') {
    $sql .= " WHERE status = 'baru'";
} elseif ($filter === 'dibaca') {
    $sql .= " WHERE status = 'dibaca'";
} elseif ($filter === 'dibalas') {
    $sql .= " WHERE status = 'dibalas'";
}

$sql .= " ORDER BY created_at DESC";

$stmt = $conn->query($sql);
$pesans = $stmt->fetchAll();

// Count by status
$stmt = $conn->query("SELECT status, COUNT(*) as total FROM pesan_masuk GROUP BY status");
$counts = ['baru' => 0, 'dibaca' => 0, 'dibalas' => 0];
while ($row = $stmt->fetch()) {
    $counts[$row['status']] = $row['total'];
}
?>

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <h3 class="text-xl font-bold text-gray-800">Filter Pesan</h3>
        
        <div class="flex gap-2">
            <a href="?filter=all" 
               class="<?= $filter === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' ?> px-4 py-2 rounded-lg hover:shadow transition">
                Semua (<?= array_sum($counts) ?>)
            </a>
            <a href="?filter=baru" 
               class="<?= $filter === 'baru' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700' ?> px-4 py-2 rounded-lg hover:shadow transition">
                Baru (<?= $counts['baru'] ?>)
            </a>
            <a href="?filter=dibaca" 
               class="<?= $filter === 'dibaca' ? 'bg-yellow-600 text-white' : 'bg-gray-200 text-gray-700' ?> px-4 py-2 rounded-lg hover:shadow transition">
                Dibaca (<?= $counts['dibaca'] ?>)
            </a>
            <a href="?filter=dibalas" 
               class="<?= $filter === 'dibalas' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700' ?> px-4 py-2 rounded-lg hover:shadow transition">
                Dibalas (<?= $counts['dibalas'] ?>)
            </a>
        </div>
    </div>
</div>

<?php if (empty($pesans)): ?>
    <div class="bg-white rounded-xl shadow-md p-12 text-center">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <p class="text-gray-500 text-lg">Tidak ada pesan</p>
    </div>
<?php else: ?>
    <div class="space-y-4">
        <?php foreach ($pesans as $pesan): 
            $badge_colors = [
                'baru' => 'bg-red-100 text-red-600',
                'dibaca' => 'bg-yellow-100 text-yellow-600',
                'dibalas' => 'bg-green-100 text-green-600'
            ];
        ?>
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h4 class="font-bold text-lg"><?= $pesan['nama'] ?></h4>
                        <span class="text-xs <?= $badge_colors[$pesan['status']] ?> px-3 py-1 rounded-full font-semibold">
                            <?= ucfirst($pesan['status']) ?>
                        </span>
                    </div>
                    
                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-3">
                        <?php if ($pesan['email']): ?>
                            <div>
                                <i class="fas fa-envelope mr-2"></i>
                                <a href="mailto:<?= $pesan['email'] ?>" class="hover:text-blue-600"><?= $pesan['email'] ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($pesan['telepon']): ?>
                            <div>
                                <i class="fas fa-phone mr-2"></i>
                                <a href="tel:<?= $pesan['telepon'] ?>" class="hover:text-blue-600"><?= $pesan['telepon'] ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <div>
                            <i class="far fa-clock mr-2"></i>
                            <?= timeAgo($pesan['created_at']) ?>
                        </div>
                    </div>
                    
                    <?php if ($pesan['subjek']): ?>
                        <p class="font-semibold text-gray-800 mb-2">
                            <i class="fas fa-tag mr-2"></i><?= $pesan['subjek'] ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700"><?= nl2br($pesan['pesan']) ?></p>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-2 pt-4 border-t">
                <?php if ($pesan['status'] !== 'dibaca'): ?>
                    <a href="?status=dibaca&id=<?= $pesan['id'] ?>" 
                       class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm hover:bg-yellow-200 transition">
                        <i class="fas fa-eye"></i> Tandai Dibaca
                    </a>
                <?php endif; ?>
                
                <?php if ($pesan['status'] !== 'dibalas'): ?>
                    <a href="?status=dibalas&id=<?= $pesan['id'] ?>" 
                       class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm hover:bg-green-200 transition">
                        <i class="fas fa-check"></i> Tandai Dibalas
                    </a>
                <?php endif; ?>
                
                <?php if ($pesan['email']): ?>
                    <a href="mailto:<?= $pesan['email'] ?>?subject=Re: <?= urlencode($pesan['subjek'] ?? '') ?>" 
                       class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm hover:bg-blue-200 transition">
                        <i class="fas fa-reply"></i> Balas Email
                    </a>
                <?php endif; ?>
                
                <?php if ($pesan['telepon']): ?>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pesan['telepon']) ?>" 
                       target="_blank"
                       class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm hover:bg-green-200 transition">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                <?php endif; ?>
                
                <a href="?delete=<?= $pesan['id'] ?>" 
                   onclick="return confirmDelete('Hapus pesan ini?')"
                   class="bg-red-100 text-red-600 px-4 py-2 rounded-lg text-sm hover:bg-red-200 transition ml-auto">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>