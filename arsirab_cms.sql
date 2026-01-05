-- Database untuk ArsiRAB CMS
-- Jalankan script ini untuk membuat database dan tabel yang diperlukan

CREATE DATABASE IF NOT EXISTS arsirab_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE arsirab_cms;

-- Tabel Admin
CREATE TABLE IF NOT EXISTS admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    nama_lengkap VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin (username: admin, password: admin123)
INSERT INTO admin (username, password, email, nama_lengkap) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@arsirab.com', 'Administrator');

-- Tabel Portfolio
CREATE TABLE IF NOT EXISTS portfolio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(200) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255),
    lokasi VARCHAR(100),
    tahun YEAR,
    luas_bangunan VARCHAR(50),
    kategori ENUM('rumah', 'gedung', 'ruko', 'villa', 'renovasi', 'klinik', 'lainnya') DEFAULT 'rumah',
    status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data portfolio
INSERT INTO portfolio (judul, deskripsi, gambar, lokasi, tahun, luas_bangunan, kategori, urutan) VALUES
('Rumah Modern Minimalis', 'Desain rumah 2 lantai dengan konsep minimalis modern di Kedungwaru. Luas bangunan 250m²', 'portfolio1.jpg', 'Kedungwaru, Tulungagung', 2023, '250m²', 'rumah', 1),
('Gedung Perkantoran', 'Desain gedung kantor 5 lantai dengan RAB lengkap dan perhitungan struktur. Luas 1200m²', 'portfolio2.jpg', 'Tulungagung Kota', 2023, '1200m²', 'gedung', 2),
('Ruko 3 Lantai', 'Desain ruko komersial dengan lahan terbatas di area strategis. Luas bangunan 180m²', 'portfolio3.jpg', 'Boyolangu', 2022, '180m²', 'ruko', 3),
('Villa Modern', 'Desain villa dengan konsep modern di area pegunungan Tulungagung. Luas bangunan 350m²', 'portfolio4.jpg', 'Campurdarat', 2023, '350m²', 'villa', 4),
('Renovasi Rumah', 'Renovasi total rumah lama menjadi modern minimalis. Luas renovasi 180m²', 'portfolio5.jpg', 'Kauman', 2022, '180m²', 'renovasi', 5),
('Klinik 3 Lantai', 'Desain klinik kesehatan dengan fasilitas lengkap. Luas bangunan 400m²', 'portfolio6.jpg', 'Kedungwaru', 2023, '400m²', 'klinik', 6);

-- Tabel Layanan
CREATE TABLE IF NOT EXISTS layanan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(200) NOT NULL,
    deskripsi TEXT,
    icon VARCHAR(100),
    fitur TEXT,
    harga_mulai VARCHAR(50),
    status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data layanan
INSERT INTO layanan (nama, deskripsi, icon, fitur, harga_mulai, urutan) VALUES
('Desain Arsitektur', 'Desain bangunan modern dan fungsional dengan mempertimbangkan estetika, efisiensi ruang, dan kebutuhan klien.', 'fa-compass-drafting', 'Desain rumah tinggal (1-3 lantai)|Desain gedung komersial & perkantoran|Renovasi & remodeling|Gambar kerja lengkap (DED)|3D Rendering & Visualisasi', 'Rp 3jt / 100m²', 1),
('RAB & Anggaran', 'Perhitungan rencana anggaran biaya yang detail, akurat, dan transparan untuk perencanaan keuangan proyek Anda.', 'fa-calculator', 'Rencana Anggaran Biaya (RAB) detail|Bill of Quantity (BoQ) lengkap|Analisa harga satuan pekerjaan|Time schedule & kurva S|Estimasi biaya material & upah', 'Rp 2jt / 100m²', 2),
('Desain Struktur', 'Perhitungan dan desain struktur bangunan yang aman, kuat, dan sesuai dengan standar konstruksi nasional.', 'fa-helmet-safety', 'Perhitungan struktur (SAP/ETABS)|Gambar struktur detail|Analisa pondasi & soil test|Desain MEP (Mekanikal, Elektrikal, Plumbing)|Konsultasi engineering', 'Rp 4jt / 100m²', 3);

-- Tabel Paket Harga
CREATE TABLE IF NOT EXISTS paket_harga (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_paket VARCHAR(100) NOT NULL,
    harga VARCHAR(50) NOT NULL,
    deskripsi TEXT,
    fitur TEXT,
    badge VARCHAR(50),
    warna_gradient VARCHAR(100),
    status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data paket harga
INSERT INTO paket_harga (nama_paket, harga, deskripsi, fitur, badge, warna_gradient, urutan) VALUES
('Desain Basic', 'Rp 3jt', 'Desain Sederhana', 'Desain denah 2D|Tampak & potongan|3D eksterior (2 angle)|RAB sederhana|2x revisi', 'DESAIN BASIC', 'gradient-primary', 1),
('Desain Profesional', 'Rp 5jt', 'Desain Lengkap', 'Semua fitur Desain Basic|3D interior (4 ruang)|Gambar kerja lengkap (DED)|RAB detail + BoQ|Perhitungan struktur|5x revisi', 'DESAIN PROFESIONAL', 'gradient-secondary', 2),
('Desain Premium', 'Rp 8jt', 'Desain Eksklusif', 'Semua fitur Profesional|3D interior semua ruangan|Video walkthrough|Desain MEP lengkap|Time schedule proyek|Revisi unlimited|Konsultasi pembangunan', 'DESAIN PREMIUM', 'gradient-accent', 3);

-- Tabel Testimoni
CREATE TABLE IF NOT EXISTS testimoni (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_klien VARCHAR(100) NOT NULL,
    jabatan VARCHAR(100),
    perusahaan VARCHAR(100),
    testimoni TEXT NOT NULL,
    foto VARCHAR(255),
    rating INT DEFAULT 5,
    status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Statistik
CREATE TABLE IF NOT EXISTS statistik (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(100) NOT NULL,
    nilai VARCHAR(50) NOT NULL,
    icon VARCHAR(100),
    urutan INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data statistik
INSERT INTO statistik (label, nilai, icon, urutan) VALUES
('Klien Puas', '500+', 'fa-users', 1),
('Proyek Selesai', '150+', 'fa-building', 2),
('Tahun Berpengalaman', '10+', 'fa-calendar', 3);

-- Tabel Kontak Info
CREATE TABLE IF NOT EXISTS kontak_info (
    id INT PRIMARY KEY AUTO_INCREMENT,
    whatsapp VARCHAR(20),
    email VARCHAR(100),
    telepon VARCHAR(20),
    alamat TEXT,
    jam_kerja VARCHAR(100),
    facebook_url VARCHAR(255),
    instagram_url VARCHAR(255),
    linkedin_url VARCHAR(255),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data kontak
INSERT INTO kontak_info (whatsapp, email, telepon, alamat, jam_kerja) VALUES
('+6281234567890', 'info@arsirab.com', '+6281234567890', 'Jln. Rosalia, Mekarsari, Desa Tunggulsari, Kedungwaru, Tulungagung 66229', 'Senin - Jumat: 08:00 - 17:00');

-- Tabel Tentang Kami
CREATE TABLE IF NOT EXISTS tentang (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(200) NOT NULL,
    deskripsi_1 TEXT,
    deskripsi_2 TEXT,
    gambar VARCHAR(255),
    tahun_berdiri YEAR,
    visi TEXT,
    misi TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data tentang
INSERT INTO tentang (judul, deskripsi_1, deskripsi_2, tahun_berdiri, visi, misi) VALUES
('Tentang ArsiRAB Tulungagung', 
'ArsiRAB Tulungagung adalah penyedia jasa konsultan desain arsitektur dan perencanaan konstruksi yang telah berpengalaman lebih dari 10 tahun melayani masyarakat Tulungagung dan sekitarnya. Kami menangani berbagai proyek dari skala rumah tinggal hingga gedung komersial.',
'Tim kami terdiri dari arsitek bersertifikat, civil engineer, quantity surveyor, dan drafter berpengalaman. Komitmen kami adalah memberikan solusi desain terbaik dengan harga terjangkau dan pelayanan yang memuaskan untuk seluruh masyarakat Tulungagung.',
2014,
'Menjadi konsultan desain dan perencanaan konstruksi terdepan dan terpercaya di Tulungagung',
'Memberikan solusi desain berkualitas tinggi|Melayani dengan profesional dan transparan|Menggunakan teknologi terkini dalam desain|Memberikan harga yang kompetitif dan terjangkau');

-- Tabel Keunggulan
CREATE TABLE IF NOT EXISTS keunggulan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    icon VARCHAR(100),
    status ENUM('aktif', 'nonaktif') DEFAULT 'aktif',
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data keunggulan
INSERT INTO keunggulan (judul, deskripsi, icon, urutan) VALUES
('Profesional', 'Tim profesional dengan sertifikasi resmi', 'fa-certificate', 1),
('Terjamin', 'Garansi hasil dan revisi sampai puas', 'fa-shield-halved', 2),
('Support 24/7', 'Konsultasi kapan saja Anda butuhkan', 'fa-headset', 3),
('Terpercaya', 'Ratusan klien puas di Tulungagung', 'fa-handshake', 4);

-- Tabel Pesan Masuk
CREATE TABLE IF NOT EXISTS pesan_masuk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telepon VARCHAR(20),
    subjek VARCHAR(200),
    pesan TEXT NOT NULL,
    status ENUM('baru', 'dibaca', 'dibalas') DEFAULT 'baru',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Settings
CREATE TABLE IF NOT EXISTS settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    setting_type VARCHAR(50) DEFAULT 'text',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data settings
INSERT INTO settings (setting_key, setting_value, setting_type) VALUES
('site_name', 'ArsiRAB Tulungagung', 'text'),
('site_tagline', 'Jasa Desain & RAB Profesional', 'text'),
('site_description', 'Jasa desain arsitektur dan RAB profesional di Tulungagung. Layanan desain rumah, gedung, dan bangunan dengan tim berpengalaman.', 'textarea'),
('meta_keywords', 'arsitek tulungagung, desain rumah tulungagung, RAB tulungagung, jasa arsitek', 'text'),
('whatsapp_number', '+6281234567890', 'text'),
('email', 'info@arsirab.com', 'text'),
('footer_text', 'Konsultan desain arsitektur dan perencanaan konstruksi terpercaya di Tulungagung sejak 2014. Mewujudkan visi bangunan impian Anda dengan layanan profesional dan berkualitas.', 'textarea');