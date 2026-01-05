<?php
$page_title = 'Kelola Portfolio';
include 'header.php';

$conn = getConnection();

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Get image filename to delete
    $stmt = $conn->prepare("SELECT gambar FROM portfolio WHERE id = ?");
    $stmt->execute([$id]);
    $portfolio = $stmt->fetch();
    
    if ($portfolio) {
        // Delete image file
        if ($portfolio['gambar']) {
            deleteImage($portfolio['gambar']);
        }
        
        // Delete from database
        $stmt = $conn->prepare("DELETE FROM portfolio WHERE id = ?");
        if ($stmt->execute([$id])) {
            setAlert('success', 'Portfolio berhasil dihapus!');
        } else {
            setAlert('error', 'Gagal menghapus portfolio!');
        }
    }
    
    redirect(ADMIN_URL . '/portfolio.php');
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $judul = sanitize($_POST['judul']);
    $deskripsi = sanitize($_POST['deskripsi']);
    $lokasi = sanitize($_POST['lokasi']);
    $tahun = sanitize($_POST['tahun']);
    $luas_bangunan = sanitize($_POST['luas_bangunan']);
    $kategori = sanitize($_POST['kategori']);
    $status = sanitize($_POST['status']);
    $urutan = (int)$_POST['urutan'];
    
    $gambar = null;
    $old_image = $_POST['old_image'] ?? null;
    
    // Handle image upload
    if (!empty($_FILES['gambar']['name'])) {
        $upload = uploadImage($_FILES['gambar'], 'portfolio');
        
        if ($upload['success']) {
            $gambar = $upload['filename'];
            
            // Delete old image if exists
            if ($old_image) {
                deleteImage($old_image);
            }
        } else {
            setAlert('error', $upload['message']);
            redirect(ADMIN_URL . '/portfolio.php');
        }
    } else {
        $gambar = $old_image;
    }
    
    if ($id) {
        // Update
        $stmt = $conn->prepare("UPDATE portfolio SET judul=?, deskripsi=?, gambar=?, lokasi=?, tahun=?, luas_bangunan=?, kategori=?, status=?, urutan=? WHERE id=?");
        $result = $stmt->execute([$judul, $deskripsi, $gambar, $lokasi, $tahun, $luas_bangunan, $kategori, $status, $urutan, $id]);
        $message = 'Portfolio berhasil diupdate!';
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO portfolio (judul, deskripsi, gambar, lokasi, tahun, luas_bangunan, kategori, status, urutan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$judul, $deskripsi, $gambar, $lokasi, $tahun, $luas_bangunan, $kategori, $status, $urutan]);
        $message = 'Portfolio berhasil ditambahkan!';
    }
    
    if ($result) {
        setAlert('success', $message);
    } else {
        setAlert('error', 'Gagal menyimpan portfolio!');
    }
    
    redirect(ADMIN_URL . '/portfolio.php');
}

// Get portfolio list
$stmt = $conn->query("SELECT * FROM portfolio ORDER BY urutan ASC, created_at DESC");
$portfolios = $stmt->fetchAll();

// Get edit data if edit mode
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM portfolio WHERE id = ?");
    $stmt->execute([$id]);
    $edit_data = $stmt->fetch();
}
?>

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800">
            <?= $edit_data ? 'Edit' : 'Tambah' ?> Portfolio
        </h3>
        <?php if ($edit_data): ?>
            <a href="portfolio.php" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-times"></i> Batal Edit
            </a>
        <?php endif; ?>
    </div>
    
    <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
            <input type="hidden" name="old_image" value="<?= $edit_data['gambar'] ?>">
        <?php endif; ?>
        
        <div class="md:col-span-2">
            <label class="block text-gray-700 font-semibold mb-2">Judul Portfolio</label>
            <input type="text" name="judul" required
                   value="<?= $edit_data['judul'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Rumah Modern Minimalis">
        </div>
        
        <div class="md:col-span-2">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="3" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Deskripsi singkat tentang portfolio ini"><?= $edit_data['deskripsi'] ?? '' ?></textarea>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
            <input type="text" name="lokasi" required
                   value="<?= $edit_data['lokasi'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Kedungwaru, Tulungagung">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tahun</label>
            <input type="number" name="tahun" required min="2000" max="2099"
                   value="<?= $edit_data['tahun'] ?? date('Y') ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Luas Bangunan</label>
            <input type="text" name="luas_bangunan"
                   value="<?= $edit_data['luas_bangunan'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: 250m²">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
            <select name="kategori" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="rumah" <?= ($edit_data['kategori'] ?? '') === 'rumah' ? 'selected' : '' ?>>Rumah</option>
                <option value="gedung" <?= ($edit_data['kategori'] ?? '') === 'gedung' ? 'selected' : '' ?>>Gedung</option>
                <option value="ruko" <?= ($edit_data['kategori'] ?? '') === 'ruko' ? 'selected' : '' ?>>Ruko</option>
                <option value="villa" <?= ($edit_data['kategori'] ?? '') === 'villa' ? 'selected' : '' ?>>Villa</option>
                <option value="renovasi" <?= ($edit_data['kategori'] ?? '') === 'renovasi' ? 'selected' : '' ?>>Renovasi</option>
                <option value="klinik" <?= ($edit_data['kategori'] ?? '') === 'klinik' ? 'selected' : '' ?>>Klinik</option>
                <option value="lainnya" <?= ($edit_data['kategori'] ?? '') === 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
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
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Urutan</label>
            <input type="number" name="urutan" min="0"
                   value="<?= $edit_data['urutan'] ?? 0 ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="0">
            <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin di depan</p>
        </div>
        
        <div class="md:col-span-2">
            <label class="block text-gray-700 font-semibold mb-2">Gambar Portfolio</label>
            <?php if ($edit_data && $edit_data['gambar']): ?>
                <div class="mb-3">
                    <img src="<?= UPLOAD_URL . $edit_data['gambar'] ?>" alt="Current" 
                         class="h-32 rounded-lg object-cover">
                </div>
            <?php endif; ?>
            <input type="file" name="gambar" accept="image/*"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</p>
        </div>
        
        <div class="md:col-span-2 flex gap-3">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                <i class="fas fa-save mr-2"></i>
                <?= $edit_data ? 'Update' : 'Simpan' ?> Portfolio
            </button>
            
            <?php if ($edit_data): ?>
                <a href="portfolio.php" 
                   class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Batal
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Portfolio List -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Daftar Portfolio</h3>
    
    <?php if (empty($portfolios)): ?>
        <p class="text-gray-500 text-center py-8">Belum ada portfolio</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Gambar</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Judul</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Lokasi</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kategori</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Urutan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($portfolios as $item): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <?php if ($item['gambar']): ?>
                                <img src="<?= UPLOAD_URL . $item['gambar'] ?>" alt="<?= $item['judul'] ?>" 
                                     class="w-16 h-16 object-cover rounded-lg">
                            <?php else: ?>
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="font-semibold text-gray-800"><?= $item['judul'] ?></div>
                            <div class="text-sm text-gray-600"><?= $item['tahun'] ?> • <?= $item['luas_bangunan'] ?></div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600"><?= $item['lokasi'] ?></td>
                        <td class="px-4 py-3">
                            <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">
                                <?= ucfirst($item['kategori']) ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if ($item['status'] === 'aktif'): ?>
                                <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Aktif</span>
                            <?php else: ?>
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Nonaktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600"><?= $item['urutan'] ?></td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="?edit=<?= $item['id'] ?>" 
                                   class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-sm hover:bg-blue-200 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?delete=<?= $item['id'] ?>" 
                                   onclick="return confirmDelete('Hapus portfolio ini?')"
                                   class="bg-red-100 text-red-600 px-3 py-1 rounded-lg text-sm hover:bg-red-200 transition">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>