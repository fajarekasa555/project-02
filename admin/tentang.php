<?php
$page_title = 'Tentang Kami';
include 'header.php';

$conn = getConnection();

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = sanitize($_POST['judul']);
    $deskripsi_1 = sanitize($_POST['deskripsi_1']);
    $deskripsi_2 = sanitize($_POST['deskripsi_2']);
    $tahun_berdiri = sanitize($_POST['tahun_berdiri']);
    $visi = sanitize($_POST['visi']);
    $misi = sanitize($_POST['misi']);
    
    $stmt = $conn->prepare("UPDATE tentang SET judul=?, deskripsi_1=?, deskripsi_2=?, tahun_berdiri=?, visi=?, misi=? WHERE id=1");
    
    if ($stmt->execute([$judul, $deskripsi_1, $deskripsi_2, $tahun_berdiri, $visi, $misi])) {
        setAlert('success', 'Tentang kami berhasil diupdate!');
    } else {
        setAlert('error', 'Gagal update tentang kami!');
    }
    
    redirect(ADMIN_URL . '/tentang.php');
}

// Get tentang data
$stmt = $conn->query("SELECT * FROM tentang WHERE id = 1");
$tentang = $stmt->fetch();
?>

<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Update Tentang Perusahaan</h3>
    
    <form method="POST" class="space-y-6">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
            <input type="text" name="judul" required
                   value="<?= $tentang['judul'] ?? '' ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi Paragraf 1</label>
            <textarea name="deskripsi_1" rows="4" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $tentang['deskripsi_1'] ?? '' ?></textarea>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi Paragraf 2</label>
            <textarea name="deskripsi_2" rows="4" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $tentang['deskripsi_2'] ?? '' ?></textarea>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Tahun Berdiri</label>
            <input type="number" name="tahun_berdiri" min="1900" max="2099"
                   value="<?= $tentang['tahun_berdiri'] ?? date('Y') ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Visi</label>
            <textarea name="visi" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $tentang['visi'] ?? '' ?></textarea>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Misi</label>
            <textarea name="misi" rows="4"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Pisahkan setiap misi dengan tanda | (pipe)"><?= $tentang['misi'] ?? '' ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Contoh: Misi 1|Misi 2|Misi 3</p>
        </div>
        
        <button type="submit" 
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition">
            <i class="fas fa-save mr-2"></i>Simpan Perubahan
        </button>
    </form>
</div>

<!-- Preview -->
<div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Preview</h3>
    
    <div class="prose max-w-none">
        <h2 class="text-3xl font-bold mb-4"><?= $tentang['judul'] ?? '' ?></h2>
        
        <p class="text-gray-700 mb-4"><?= $tentang['deskripsi_1'] ?? '' ?></p>
        <p class="text-gray-700 mb-6"><?= $tentang['deskripsi_2'] ?? '' ?></p>
        
        <?php if ($tentang['visi']): ?>
        <div class="bg-blue-50 p-6 rounded-xl mb-4">
            <h3 class="font-bold text-lg mb-2">Visi</h3>
            <p class="text-gray-700"><?= $tentang['visi'] ?></p>
        </div>
        <?php endif; ?>
        
        <?php if ($tentang['misi']): ?>
        <div class="bg-green-50 p-6 rounded-xl">
            <h3 class="font-bold text-lg mb-3">Misi</h3>
            <ul class="space-y-2">
                <?php 
                $misis = explode('|', $tentang['misi']);
                foreach ($misis as $misi): 
                ?>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                    <span><?= trim($misi) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <?php if ($tentang['tahun_berdiri']): ?>
        <div class="mt-6 text-center">
            <p class="text-gray-600">Berdiri sejak tahun <strong class="text-blue-600 text-2xl"><?= $tentang['tahun_berdiri'] ?></strong></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>