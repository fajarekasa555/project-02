<?php
$page_title = 'Kelola Testimoni';
include 'header.php';

$conn = getConnection();

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Get image filename
    $stmt = $conn->prepare("SELECT foto FROM testimoni WHERE id = ?");
    $stmt->execute([$id]);
    $testimoni = $stmt->fetch();
    
    if ($testimoni && $testimoni['foto']) {
        deleteImage($testimoni['foto']);
    }
    
    $stmt = $conn->prepare("DELETE FROM testimoni WHERE id = ?");
    if ($stmt->execute([$id])) {
        setAlert('success', 'Testimoni berhasil dihapus!');
    } else {
        setAlert('error', 'Gagal menghapus testimoni!');
    }
    
    redirect(ADMIN_URL . '/testimoni.php');
}

// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nama_klien = sanitize($_POST['nama_klien']);
    $jabatan = sanitize($_POST['jabatan']);
    $perusahaan = sanitize($_POST['perusahaan']);
    $testimoni = sanitize($_POST['testimoni']);
    $rating = (int)$_POST['rating'];
    $status = sanitize($_POST['status']);
    $urutan = (int)$_POST['urutan'];
    
    $foto = null;
    $old_image = $_POST['old_image'] ?? null;
    
    // Handle image upload
    if (!empty($_FILES['foto']['name'])) {
        $upload = uploadImage($_FILES['foto'], 'testimoni');
        
        if ($upload['success']) {
            $foto = $upload['filename'];
            if ($old_image) {
                deleteImage($old_image);
            }
        } else {
            setAlert('error', $upload['message']);
            redirect(ADMIN_URL . '/testimoni.php');
        }
    } else {
        $foto = $old_image;
    }
    
    if ($id) {
        $stmt = $conn->prepare("UPDATE testimoni SET nama_klien=?, jabatan=?, perusahaan=?, testimoni=?, foto=?, rating=?, status=?, urutan=? WHERE id=?");
        $result = $stmt->execute([$nama_klien, $jabatan, $perusahaan, $testimoni, $foto, $rating, $status, $urutan, $id]);
        $message = 'Testimoni berhasil diupdate!';
    } else {
        $stmt = $conn->prepare("INSERT INTO testimoni (nama_klien, jabatan, perusahaan, testimoni, foto, rating, status, urutan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$nama_klien, $jabatan, $perusahaan, $testimoni, $foto, $rating, $status, $urutan]);
        $message = 'Testimoni berhasil ditambahkan!';
    }
    
    if ($result) {
        setAlert('success', $message);
    } else {
        setAlert('error', 'Gagal menyimpan testimoni!');
    }
    
    redirect(ADMIN_URL . '/testimoni.php');
}

// Get testimoni list
$stmt = $conn->query("SELECT * FROM testimoni ORDER BY urutan ASC, created_at DESC");
$testimonis = $stmt->fetchAll();

// Get edit data
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM testimoni WHERE id = ?");
    $stmt->execute([$id]);
    $edit_data = $stmt->fetch();
}
?>

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">
        <?= $edit_data ? 'Edit' : 'Tambah' ?> Testimoni
    </h3>
    
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
        <?php if ($edit_data): ?>
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
            <input type="hidden" name="old_image" value="<?= $edit_data['foto'] ?>">
        <?php endif; ?>
        
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama Klien</label>
                <input type="text" name="nama_klien" required
                       value="<?= $edit_data['nama_klien'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Budi Santoso">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                <input type="text" name="jabatan"
                       value="<?= $edit_data['jabatan'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Direktur">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Perusahaan/Instansi</label>
            <input type="text" name="perusahaan"
                   value="<?= $edit_data['perusahaan'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="PT. Example Indonesia">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Testimoni</label>
            <textarea name="testimoni" rows="4" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Testimoni klien tentang layanan kami..."><?= $edit_data['testimoni'] ?? '' ?></textarea>
        </div>
        
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Rating</label>
                <select name="rating" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="5" <?= ($edit_data['rating'] ?? 5) == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4" <?= ($edit_data['rating'] ?? '') == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐ (4)</option>
                    <option value="3" <?= ($edit_data['rating'] ?? '') == 3 ? 'selected' : '' ?>>⭐⭐⭐ (3)</option>
                    <option value="2" <?= ($edit_data['rating'] ?? '') == 2 ? 'selected' : '' ?>>⭐⭐ (2)</option>
                    <option value="1" <?= ($edit_data['rating'] ?? '') == 1 ? 'selected' : '' ?>>⭐ (1)</option>
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
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Foto Klien (Optional)</label>
            <?php if ($edit_data && $edit_data['foto']): ?>
                <div class="mb-3">
                    <img src="<?= UPLOAD_URL . $edit_data['foto'] ?>" alt="Current" 
                         class="w-24 h-24 rounded-full object-cover">
                </div>
            <?php endif; ?>
            <input type="file" name="foto" accept="image/*"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</p>
        </div>
        
        <div class="flex gap-3">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
                <i class="fas fa-save mr-2"></i>
                <?= $edit_data ? 'Update' : 'Simpan' ?>
            </button>
            
            <?php if ($edit_data): ?>
                <a href="testimoni.php" 
                   class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Batal
                </a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Testimoni List -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Daftar Testimoni</h3>
    
    <?php if (empty($testimonis)): ?>
        <p class="text-gray-500 text-center py-8">Belum ada testimoni</p>
    <?php else: ?>
        <div class="space-y-4">
            <?php foreach ($testimonis as $item): ?>
            <div class="border rounded-xl p-6 hover:shadow-lg transition">
                <div class="flex items-start gap-4">
                    <?php if ($item['foto']): ?>
                        <img src="<?= UPLOAD_URL . $item['foto'] ?>" alt="<?= $item['nama_klien'] ?>" 
                             class="w-16 h-16 rounded-full object-cover flex-shrink-0">
                    <?php else: ?>
                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                            <?= strtoupper(substr($item['nama_klien'], 0, 1)) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <h4 class="font-bold text-lg"><?= $item['nama_klien'] ?></h4>
                                <?php if ($item['jabatan'] || $item['perusahaan']): ?>
                                    <p class="text-sm text-gray-600">
                                        <?= $item['jabatan'] ?><?= $item['jabatan'] && $item['perusahaan'] ? ' - ' : '' ?><?= $item['perusahaan'] ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="text-yellow-500">
                                    <?= str_repeat('⭐', $item['rating']) ?>
                                </div>
                                <?php if ($item['status'] === 'aktif'): ?>
                                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Aktif</span>
                                <?php else: ?>
                                    <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Nonaktif</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <p class="text-gray-700 mb-4 italic">"<?= $item['testimoni'] ?>"</p>
                        
                        <div class="flex gap-2">
                            <a href="?edit=<?= $item['id'] ?>" 
                               class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg text-sm hover:bg-blue-200 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="?delete=<?= $item['id'] ?>" 
                               onclick="return confirmDelete('Hapus testimoni ini?')"
                               class="bg-red-100 text-red-600 px-4 py-2 rounded-lg text-sm hover:bg-red-200 transition">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>