<?php
$page_title = 'Kelola Layanan';
include 'header.php';

$conn = getConnection();

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM layanan WHERE id = ?");
    if ($stmt->execute([$id])) {
        setAlert('success', 'Layanan berhasil dihapus!');
    } else {
        setAlert('error', 'Gagal menghapus layanan!');
    }
    redirect(ADMIN_URL . '/layanan.php');
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nama = sanitize($_POST['nama']);
    $deskripsi = sanitize($_POST['deskripsi']);
    $icon = sanitize($_POST['icon']);
    $fitur = sanitize($_POST['fitur']);
    $harga_mulai = sanitize($_POST['harga_mulai']);
    $status = sanitize($_POST['status']);
    $urutan = (int)$_POST['urutan'];
    
    if ($id) {
        $stmt = $conn->prepare("UPDATE layanan SET nama=?, deskripsi=?, icon=?, fitur=?, harga_mulai=?, status=?, urutan=? WHERE id=?");
        $result = $stmt->execute([$nama, $deskripsi, $icon, $fitur, $harga_mulai, $status, $urutan, $id]);
        $message = 'Layanan berhasil diupdate!';
    } else {
        $stmt = $conn->prepare("INSERT INTO layanan (nama, deskripsi, icon, fitur, harga_mulai, status, urutan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$nama, $deskripsi, $icon, $fitur, $harga_mulai, $status, $urutan]);
        $message = 'Layanan berhasil ditambahkan!';
    }
    
    if ($result) {
        setAlert('success', $message);
    } else {
        setAlert('error', 'Gagal menyimpan layanan!');
    }
    
    redirect(ADMIN_URL . '/layanan.php');
}

// Get layanan list
$stmt = $conn->query("SELECT * FROM layanan ORDER BY urutan ASC");
$layanans = $stmt->fetchAll();

// Get edit data
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM layanan WHERE id = ?");
    $stmt->execute([$id]);
    $edit_data = $stmt->fetch();
}
?>

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">
        <?= $edit_data ? 'Edit' : 'Tambah' ?> Layanan
    </h3>
    
    <form method="POST" class="space-y-4">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <?php endif; ?>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama Layanan</label>
            <input type="text" name="nama" required
                   value="<?= $edit_data['nama'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="3" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $edit_data['deskripsi'] ?? '' ?></textarea>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Icon (Font Awesome)</label>
                <input type="text" name="icon" required
                       value="<?= $edit_data['icon'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="fa-compass-drafting">
                <p class="text-xs text-gray-500 mt-1">
                    Cari icon di <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600">fontawesome.com</a>
                </p>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga Mulai</label>
                <input type="text" name="harga_mulai"
                       value="<?= $edit_data['harga_mulai'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Rp 3jt / 100m²">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Fitur-fitur</label>
            <textarea name="fitur" rows="5" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Pisahkan setiap fitur dengan tanda | (pipe)"><?= $edit_data['fitur'] ?? '' ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Contoh: Fitur 1|Fitur 2|Fitur 3</p>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="aktif" <?= ($edit_data['status'] ?? 'aktif') === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="nonaktif" <?= ($edit_data['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Urutan</label>
                <input type="number" name="urutan" min="0"
                       value="<?= $edit_data['urutan'] ?? 0 ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="flex gap-3">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                <i class="fas fa-save mr-2"></i>
                <?= $edit_data ? 'Update' : 'Simpan' ?>
            </button>
            
            <?php if ($edit_data): ?>
                <a href="layanan.php" 
                   class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Batal
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Layanan List -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Daftar Layanan</h3>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($layanans as $item): ?>
        <div class="border rounded-xl p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-blue-100 w-12 h-12 rounded-xl flex items-center justify-center">
                    <i class="fas <?= $item['icon'] ?> text-blue-600 text-xl"></i>
                </div>
                <?php if ($item['status'] === 'aktif'): ?>
                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Aktif</span>
                <?php else: ?>
                    <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Nonaktif</span>
                <?php endif; ?>
            </div>
            
            <h4 class="font-bold text-lg mb-2"><?= $item['nama'] ?></h4>
            <p class="text-sm text-gray-600 mb-3"><?= substr($item['deskripsi'], 0, 100) ?>...</p>
            
            <?php if ($item['harga_mulai']): ?>
                <p class="text-sm text-blue-600 font-semibold mb-4"><?= $item['harga_mulai'] ?></p>
            <?php endif; ?>
            
            <div class="flex gap-2">
                <a href="?edit=<?= $item['id'] ?>" 
                   class="flex-1 bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm text-center hover:bg-blue-200 transition">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="?delete=<?= $item['id'] ?>" 
                   onclick="return confirmDelete('Hapus layanan ini?')"
                   class="bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm hover:bg-red-200 transition">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>