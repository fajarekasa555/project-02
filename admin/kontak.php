<?php
$page_title = 'Kontak Info';
include 'header.php';

$conn = getConnection();

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $whatsapp = sanitize($_POST['whatsapp']);
    $email = sanitize($_POST['email']);
    $telepon = sanitize($_POST['telepon']);
    $alamat = sanitize($_POST['alamat']);
    $jam_kerja = sanitize($_POST['jam_kerja']);
    $facebook_url = sanitize($_POST['facebook_url']);
    $instagram_url = sanitize($_POST['instagram_url']);
    $linkedin_url = sanitize($_POST['linkedin_url']);
    
    $stmt = $conn->prepare("UPDATE kontak_info SET whatsapp=?, email=?, telepon=?, alamat=?, jam_kerja=?, facebook_url=?, instagram_url=?, linkedin_url=? WHERE id=1");
    
    if ($stmt->execute([$whatsapp, $email, $telepon, $alamat, $jam_kerja, $facebook_url, $instagram_url, $linkedin_url])) {
        setAlert('success', 'Kontak info berhasil diupdate!');
    } else {
        setAlert('error', 'Gagal update kontak info!');
    }
    
    redirect(ADMIN_URL . '/kontak.php');
}

// Get kontak info
$stmt = $conn->query("SELECT * FROM kontak_info WHERE id = 1");
$kontak = $stmt->fetch();
?>

<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Update Kontak Informasi</h3>
    
    <form method="POST" class="space-y-6">
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fab fa-whatsapp text-green-600 mr-2"></i>WhatsApp
                </label>
                <input type="text" name="whatsapp" required
                       value="<?= $kontak['whatsapp'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="+6281234567890">
                <p class="text-xs text-gray-500 mt-1">Format: +62xxx (dengan kode negara)</p>
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fas fa-envelope text-blue-600 mr-2"></i>Email
                </label>
                <input type="email" name="email" required
                       value="<?= $kontak['email'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="info@arsirab.com">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fas fa-phone text-purple-600 mr-2"></i>Telepon
                </label>
                <input type="text" name="telepon"
                       value="<?= $kontak['telepon'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="+6281234567890">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fas fa-clock text-orange-600 mr-2"></i>Jam Kerja
                </label>
                <input type="text" name="jam_kerja"
                       value="<?= $kontak['jam_kerja'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Senin - Jumat: 08:00 - 17:00">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>Alamat
            </label>
            <textarea name="alamat" rows="3" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $kontak['alamat'] ?? '' ?></textarea>
        </div>
        
        <div class="border-t pt-6">
            <h4 class="font-bold text-gray-800 mb-4">Media Sosial</h4>
            
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook
                    </label>
                    <input type="url" name="facebook_url"
                           value="<?= $kontak['facebook_url'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="https://facebook.com/...">
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fab fa-instagram text-pink-600 mr-2"></i>Instagram
                    </label>
                    <input type="url" name="instagram_url"
                           value="<?= $kontak['instagram_url'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="https://instagram.com/...">
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fab fa-linkedin text-blue-700 mr-2"></i>LinkedIn
                    </label>
                    <input type="url" name="linkedin_url"
                           value="<?= $kontak['linkedin_url'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="https://linkedin.com/...">
                </div>
            </div>
        </div>
        
        <button type="submit" 
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition">
            <i class="fas fa-save mr-2"></i>Simpan Perubahan
        </button>
    </form>
</div>

<!-- Preview -->
<div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Preview Kontak</h3>
    
    <div class="grid md:grid-cols-3 gap-6">
        <div class="border rounded-xl p-6 text-center">
            <div class="bg-green-100 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fab fa-whatsapp text-green-600 text-2xl"></i>
            </div>
            <h4 class="font-bold mb-2">WhatsApp</h4>
            <p class="text-gray-600 text-sm"><?= $kontak['whatsapp'] ?? '-' ?></p>
        </div>
        
        <div class="border rounded-xl p-6 text-center">
            <div class="bg-blue-100 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-envelope text-blue-600 text-2xl"></i>
            </div>
            <h4 class="font-bold mb-2">Email</h4>
            <p class="text-gray-600 text-sm"><?= $kontak['email'] ?? '-' ?></p>
        </div>
        
        <div class="border rounded-xl p-6 text-center">
            <div class="bg-red-100 w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-map-marker-alt text-red-600 text-2xl"></i>
            </div>
            <h4 class="font-bold mb-2">Alamat</h4>
            <p class="text-gray-600 text-sm"><?= $kontak['alamat'] ?? '-' ?></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>