<?php
$page_title = 'Pengaturan Website';
include 'header.php';

$conn = getConnection();

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        if ($key !== 'submit') {
            $value = sanitize($value);
            
            // Check if setting exists
            $stmt = $conn->prepare("SELECT id FROM settings WHERE setting_key = ?");
            $stmt->execute([$key]);
            
            if ($stmt->fetch()) {
                // Update
                $stmt = $conn->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
                $stmt->execute([$value, $key]);
            } else {
                // Insert
                $stmt = $conn->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)");
                $stmt->execute([$key, $value]);
            }
        }
    }
    
    setAlert('success', 'Pengaturan berhasil disimpan!');
    redirect(ADMIN_URL . '/settings.php');
}

// Get all settings
$stmt = $conn->query("SELECT * FROM settings");
$settings = [];
while ($row = $stmt->fetch()) {
    $settings[$row['setting_key']] = $row['setting_value'];
}
?>

<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Pengaturan Umum Website</h3>
    
    <form method="POST" class="space-y-6">
        <div class="border-b pb-6">
            <h4 class="font-bold text-gray-800 mb-4">Informasi Website</h4>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nama Website</label>
                    <input type="text" name="site_name" required
                           value="<?= $settings['site_name'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tagline</label>
                    <input type="text" name="site_tagline" required
                           value="<?= $settings['site_tagline'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            
            <div class="mt-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi Website</label>
                <textarea name="site_description" rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $settings['site_description'] ?? '' ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Digunakan untuk meta description SEO</p>
            </div>
            
            <div class="mt-4">
                <label class="block text-gray-700 font-semibold mb-2">Meta Keywords</label>
                <input type="text" name="meta_keywords"
                       value="<?= $settings['meta_keywords'] ?? '' ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="keyword1, keyword2, keyword3">
                <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma</p>
            </div>
        </div>
        
        <div class="border-b pb-6">
            <h4 class="font-bold text-gray-800 mb-4">Kontak</h4>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fab fa-whatsapp text-green-600 mr-2"></i>WhatsApp
                    </label>
                    <input type="text" name="whatsapp_number"
                           value="<?= $settings['whatsapp_number'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="+6281234567890">
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-envelope text-blue-600 mr-2"></i>Email
                    </label>
                    <input type="email" name="email"
                           value="<?= $settings['email'] ?? '' ?>"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>
        
        <div>
            <h4 class="font-bold text-gray-800 mb-4">Footer</h4>
            
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Teks Footer</label>
                <textarea name="footer_text" rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $settings['footer_text'] ?? '' ?></textarea>
            </div>
        </div>
        
        <button type="submit" name="submit"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition">
            <i class="fas fa-save mr-2"></i>Simpan Pengaturan
        </button>
    </form>
</div>

<!-- Preview Settings -->
<div class="bg-white rounded-xl shadow-md p-6 mt-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Preview Pengaturan</h3>
    
    <div class="space-y-4">
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <span class="font-semibold">Nama Website:</span>
            <span><?= $settings['site_name'] ?? '-' ?></span>
        </div>
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <span class="font-semibold">Tagline:</span>
            <span><?= $settings['site_tagline'] ?? '-' ?></span>
        </div>
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <span class="font-semibold">WhatsApp:</span>
            <span><?= $settings['whatsapp_number'] ?? '-' ?></span>
        </div>
        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <span class="font-semibold">Email:</span>
            <span><?= $settings['email'] ?? '-' ?></span>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>