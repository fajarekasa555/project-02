<?php
$page_title = 'Kelola Paket Harga';
include 'header.php';

$conn = getConnection();

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM paket_harga WHERE id = ?");
    if ($stmt->execute([$id])) {
        setAlert('success', 'Paket harga berhasil dihapus!');
    } else {
        setAlert('error', 'Gagal menghapus paket harga!');
    }
    redirect(ADMIN_URL . '/paket-harga.php');
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nama_paket = sanitize($_POST['nama_paket']);
    $harga = sanitize($_POST['harga']);
    $deskripsi = sanitize($_POST['deskripsi']);
    $fitur = sanitize($_POST['fitur']);
    $badge = sanitize($_POST['badge']);
    $warna_gradient = sanitize($_POST['warna_gradient']);
    $status = sanitize($_POST['status']);
    $urutan = (int)$_POST['urutan'];
    
    if ($id) {
        $stmt = $conn->prepare("UPDATE paket_harga SET nama_paket=?, harga=?, deskripsi=?, fitur=?, badge=?, warna_gradient=?, status=?, urutan=? WHERE id=?");
        $result = $stmt->execute([$nama_paket, $harga, $deskripsi, $fitur, $badge, $warna_gradient, $status, $urutan, $id]);
        $message = 'Paket harga berhasil diupdate!';
    } else {
        $stmt = $conn->prepare("INSERT INTO paket_harga (nama_paket, harga, deskripsi, fitur, badge, warna_gradient, status, urutan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$nama_paket, $harga, $deskripsi, $fitur, $badge, $warna_gradient, $status, $urutan]);
        $message = 'Paket harga berhasil ditambahkan!';
    }
    
    if ($result) {
        setAlert('success', $message);
    } else {
        setAlert('error', 'Gagal menyimpan paket harga!');
    }
    
    redirect(ADMIN_URL . '/paket-harga.php');
}

// Get paket list
$stmt = $conn->query("SELECT * FROM paket_harga ORDER BY urutan ASC");
$pakets = $stmt->fetchAll();

// Get edit data
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM paket_harga WHERE id = ?");
    $stmt->execute([$id]);
    $edit_data = $stmt->fetch();
}
?>

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">
        <?= $edit_data ? 'Edit' : 'Tambah' ?> Paket Harga
    </h3>
    
    <form method="POST" class="space-y-4">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <?php endif; ?>
        
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama Paket</label>
                <input type="text" name="nama_paket" required
                       value="<?= $edit_data['nama_paket'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Desain Basic">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga</label>
                <input type="text" name="harga" required
                       value="<?= $edit_data['harga'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Rp 3jt">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi Singkat</label>
            <input type="text" name="deskripsi" required
                   value="<?= $edit_data['deskripsi'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Desain Sederhana">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Fitur-fitur</label>
            <textarea name="fitur" rows="5" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Pisahkan setiap fitur dengan tanda |"><?= $edit_data['fitur'] ?? '' ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Contoh: Fitur 1|Fitur 2|Fitur 3</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Badge Text</label>
                <input type="text" name="badge" required
                       value="<?= $edit_data['badge'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="DESAIN BASIC">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Warna Gradient</label>
                <select name="warna_gradient" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="gradient-primary" <?= ($edit_data['warna_gradient'] ?? '') === 'gradient-primary' ? 'selected' : '' ?>>Biru (Primary)</option>
                    <option value="gradient-secondary" <?= ($edit_data['warna_gradient'] ?? '') === 'gradient-secondary' ? 'selected' : '' ?>>Hijau (Secondary)</option>
                    <option value="gradient-accent" <?= ($edit_data['warna_gradient'] ?? '') === 'gradient-accent' ? 'selected' : '' ?>>Orange (Accent)</option>
                    <option value="gradient-warm" <?= ($edit_data['warna_gradient'] ?? '') === 'gradient-warm' ? 'selected' : '' ?>>Merah (Warm)</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="aktif" <?= ($edit_data['status'] ?? 'aktif') === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="nonaktif" <?= ($edit_data['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                </select>
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Urutan</label>
            <input type="number" name="urutan" min="0"
                   value="<?= $edit_data['urutan'] ?? 0 ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-500 mt-1">Urutan tampilan (1 = paling kiri)</p>
        </div>
        
        <div class="flex gap-3">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                <i class="fas fa-save mr-2"></i>
                <?= $edit_data ? 'Update' : 'Simpan' ?>
            </button>
            
            <?php if ($edit_data): ?>
                <a href="paket-harga.php" 
                   class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Batal
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Paket List -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Daftar Paket Harga</h3>
    
    <div class="grid md:grid-cols-3 gap-6">
        <?php foreach ($pakets as $paket): 
            $gradient_class = $paket['warna_gradient'];
        ?>
        <div class="border rounded-xl p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs <?= $gradient_class ?> text-white px-3 py-1 rounded-full font-bold">
                    <?= $paket['badge'] ?>
                </span>
                <?php if ($paket['status'] === 'aktif'): ?>
                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Aktif</span>
                <?php else: ?>
                    <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Nonaktif</span>
                <?php endif; ?>
            </div>
            
            <h4 class="text-2xl font-bold mb-2"><?= $paket['nama_paket'] ?></h4>
            <p class="text-gray-600 text-sm mb-3"><?= $paket['deskripsi'] ?></p>
            <div class="text-3xl font-bold text-blue-600 mb-4"><?= $paket['harga'] ?></div>
            
            <div class="space-y-2 mb-4">
                <?php 
                $fiturs = explode('|', $paket['fitur']);
                foreach (array_slice($fiturs, 0, 3) as $fitur): 
                ?>
                <div class="flex items-start text-sm text-gray-600">
                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                    <span><?= $fitur ?></span>
                </div>
                <?php endforeach; ?>
                <?php if (count($fiturs) > 3): ?>
                <p class="text-xs text-gray-500">+<?= count($fiturs) - 3 ?> fitur lainnya</p>
                <?php endif; ?>
            </div>
            
            <div class="flex gap-2">
                <a href="?edit=<?= $paket['id'] ?>" 
                   class="flex-1 bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm text-center hover:bg-blue-200 transition">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="?delete=<?= $paket['id'] ?>" 
                   onclick="return confirmDelete('Hapus paket ini?')"
                   class="bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm hover:bg-red-200 transition">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>