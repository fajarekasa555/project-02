<?php
require_once 'config.php';

echo "<h1>TEST LAYANAN DISPLAY</h1>";
echo "<style>
body { font-family: Arial; padding: 20px; background: #f5f5f5; }
.card { background: white; padding: 20px; margin: 10px 0; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-left: 5px solid #007bff; }
.grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
</style>";

try {
    $conn = getConnection();
    
    // Get layanan
    $stmt = $conn->query("SELECT * FROM layanan WHERE status = 'aktif' ORDER BY urutan ASC");
    $layanan_raw = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Raw Data from Database:</h2>";
    echo "<p>Total rows: " . count($layanan_raw) . "</p>";
    
    if (empty($layanan_raw)) {
        echo "<p style='color: red;'>❌ TIDAK ADA DATA!</p>";
        die();
    }
    
    // Process data
    $layanan = [];
    foreach ($layanan_raw as $item) {
        $icon = $item['icon'] ?? 'fa-star';
        if (!empty($icon) && strpos($icon, 'fa-') === false) {
            $icon = 'fa-solid fa-' . $icon;
        } elseif (!empty($icon) && strpos($icon, 'fa-solid') === false && strpos($icon, 'fa-') === 0) {
            $icon = 'fa-solid ' . $icon;
        }
        
        $layanan[] = [
            'id' => $item['id'] ?? 0,
            'nama' => $item['nama'] ?? '',
            'deskripsi' => $item['deskripsi'] ?? '',
            'icon' => $icon,
            'fitur' => $item['fitur'] ?? '',
            'harga_mulai' => $item['harga_mulai'] ?? '',
            'status' => $item['status'] ?? 'aktif',
            'urutan' => $item['urutan'] ?? 0
        ];
    }
    
    echo "<h2>Processed Data:</h2>";
    echo "<p>Total items: " . count($layanan) . "</p>";
    
    if (!empty($layanan)) {
        echo "<h2>Display Test:</h2>";
        echo "<div class='grid'>";
        
        foreach ($layanan as $item) {
            $fitur_list = !empty($item['fitur']) ? explode('|', $item['fitur']) : [];
            
            echo "<div class='card'>";
            echo "<h3>📦 " . htmlspecialchars($item['nama']) . "</h3>";
            echo "<p><strong>Icon:</strong> <i class='" . htmlspecialchars($item['icon']) . "'></i> " . htmlspecialchars($item['icon']) . "</p>";
            echo "<p><strong>Deskripsi:</strong> " . htmlspecialchars(substr($item['deskripsi'], 0, 100)) . "...</p>";
            echo "<p><strong>Harga:</strong> " . htmlspecialchars($item['harga_mulai']) . "</p>";
            echo "<p><strong>Status:</strong> " . htmlspecialchars($item['status']) . "</p>";
            
            if (!empty($fitur_list)) {
                echo "<p><strong>Fitur (" . count($fitur_list) . " items):</strong></p>";
                echo "<ul>";
                foreach ($fitur_list as $fitur) {
                    echo "<li>✓ " . htmlspecialchars(trim($fitur)) . "</li>";
                }
                echo "</ul>";
            }
            
            echo "</div>";
        }
        
        echo "</div>";
        
        echo "<h2>✅ DATA OK!</h2>";
        echo "<p>Data layanan bisa diambil dan ditampilkan dengan benar.</p>";
        echo "<p><strong>Kesimpulan:</strong> Jika data ini tampil tapi di homepage tidak, berarti masalahnya di:</p>";
        echo "<ul>";
        echo "<li>CSS conflict</li>";
        echo "<li>JavaScript error</li>";
        echo "<li>Kondisi if yang salah</li>";
        echo "<li>Section ter-hide</li>";
        echo "</ul>";
        
    } else {
        echo "<p style='color: red;'>❌ Array layanan kosong setelah processing!</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h2>📋 Checklist:</h2>";
echo "<ol>";
echo "<li>✓ Data dari database ada?</li>";
echo "<li>✓ Processing data berhasil?</li>";
echo "<li>✓ Icon format benar?</li>";
echo "<li>✓ Fitur bisa di-explode?</li>";
echo "<li>? Homepage menampilkan data?</li>";
echo "</ol>";

echo "<hr>";
echo "<p><strong>Next Step:</strong></p>";
echo "<ul>";
echo "<li>Jika test ini berhasil tapi homepage tidak, buka browser console (F12) dan cek error JavaScript</li>";
echo "<li>View source (Ctrl+U) di homepage dan cari 'Layanan Kami' - apakah HTML cards ter-render?</li>";
echo "<li>Cek CSS dengan inspect element (F12) - apakah cards ter-hide?</li>";
echo "</ul>";

echo "<p><a href='index.php' style='display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px;'>← Back to Homepage</a></p>";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">