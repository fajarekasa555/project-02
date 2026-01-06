<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsiRAB Tulungagung - Jasa Desain & RAB Gedung Profesional Tulungagung</title>
    <link rel="icon" href="./img/image.png" type="image/png">
    <meta name="description" content="Jasa desain arsitektur dan RAB profesional di Tulungagung. Layanan desain rumah, gedung, dan bangunan dengan tim berpengalaman.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');
        
        * {
            font-family: 'Montserrat', sans-serif;
        }
        
        h1, h2, h3, .heading-font {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #1e40af 100%);
        }
        
        .gradient-secondary {
            background: linear-gradient(135deg, #059669 0%, #10b981 50%, #047857 100%);
        }
        
        .gradient-accent {
            background: linear-gradient(135deg, #d97706 0%, #f59e0b 50%, #b45309 100%);
        }
        
        .gradient-warm {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 50%, #b91c1c 100%);
        }
        
        .card-3d {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }
        
        .card-3d:hover {
            transform: translateY(-16px) scale(1.03);
            box-shadow: 0 40px 80px rgba(0,0,0,0.12);
        }
        
        @media (max-width: 768px) {
            .card-3d:hover {
                transform: translateY(-8px) scale(1.01);
            }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-green {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-orange {
            background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .pricing-card {
            position: relative;
            overflow: hidden;
        }
        
        .pricing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6, #60a5fa);
        }
        
        .nav-link {
            position: relative;
            font-weight: 500;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .feature-icon {
            transition: all 0.4s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.15) rotate(8deg);
        }
        
        .stats-counter {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #FFFFFF 0%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Montserrat', sans-serif;
        }
        
        @media (max-width: 640px) {
            .stats-counter {
                font-size: 2.5rem;
            }
        }
        
        .testimonial-card {
            background: linear-gradient(145deg, #FFFFFF, #F9FAFB);
            border-left: 5px solid #3b82f6;
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            border-left-color: #2563eb;
            transform: translateX(8px);
        }
        
        .portfolio-overlay {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.95) 0%, rgba(59, 130, 246, 0.95) 100%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }
        
        .wa-float {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 1000;
            animation: pulse 2.5s infinite;
            box-shadow: 0 10px 40px rgba(34, 197, 94, 0.4);
        }
        
        @media (max-width: 640px) {
            .wa-float {
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
            }
            .wa-float i {
                font-size: 2rem;
            }
        }
        
        @keyframes pulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 10px 40px rgba(34, 197, 94, 0.4);
            }
            50% { 
                transform: scale(1.08);
                box-shadow: 0 15px 50px rgba(34, 197, 94, 0.6);
            }
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6, #60a5fa);
            margin: 24px auto 0;
            border-radius: 3px;
        }
        
        .benefit-card {
            background: linear-gradient(145deg, #FFFFFF, #F8FAFC);
            border-radius: 24px;
            transition: all 0.4s ease;
            border: 2px solid transparent;
        }
        
        .benefit-card:hover {
            background: linear-gradient(145deg, #1e3a8a, #1e40af);
            color: white;
            border-color: #3b82f6;
            transform: translateY(-8px);
        }
        
        .benefit-card:hover .benefit-icon {
            background: white;
            color: #1e3a8a;
        }
        
        .benefit-card:hover h4,
        .benefit-card:hover p {
            color: white;
        }
        
        .scroll-smooth {
            scroll-behavior: smooth;
        }
        
        .process-step {
            position: relative;
        }
        
        .process-line {
            position: absolute;
            top: 32px;
            left: 32px;
            width: 3px;
            height: calc(100% - 64px);
            background: linear-gradient(180deg, #1e3a8a, #10b981);
        }
        
        @media (max-width: 1024px) {
            .process-line {
                left: 24px;
            }
        }
        
        .icon-rotate {
            transition: transform 0.3s ease;
        }
        
        .card-3d:hover .icon-rotate {
            transform: rotate(360deg);
        }
        
        .hero-badge {
            backdrop-filter: blur(12px);
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .container-custom {
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 4rem;
            padding-right: 4rem;
        }
        
        @media (max-width: 1024px) {
            .container-custom {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (max-width: 640px) {
            .container-custom {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        
        /* Mobile Typography */
        @media (max-width: 640px) {
            h1 {
                font-size: 2.5rem;
                line-height: 1.2;
            }
            h2 {
                font-size: 2rem;
                line-height: 1.3;
            }
            h3 {
                font-size: 1.5rem;
            }
            .text-xl {
                font-size: 1rem;
            }
            .text-6xl {
                font-size: 3rem;
            }
            .text-5xl {
                font-size: 2.5rem;
            }
        }
        
        /* Mobile Spacing */
        @media (max-width: 640px) {
            .py-16 md:py-28 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
            .pt-40 {
                padding-top: 7rem;
            }
            .pb-24 {
                padding-bottom: 3rem;
            }
            .gap-20 {
                gap: 2rem;
            }
            .mb-24 {
                margin-bottom: 2rem;
            }
            .mb-16 {
                margin-bottom: 1.5rem;
            }
        }
        
        /* Hide hover effects on mobile */
        @media (hover: none) {
            .card-3d:hover {
                transform: none;
            }
            .benefit-card:hover {
                transform: translateY(-4px);
            }
        }
        
        /* Scroll Reveal Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .fade-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in-left.active {
            opacity: 1;
            transform: translateX(0);
        }
        
        .fade-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in-right.active {
            opacity: 1;
            transform: translateX(0);
        }
        
        .scale-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .scale-in.active {
            opacity: 1;
            transform: scale(1);
        }
        
        /* Stagger animation delays */
        .fade-in:nth-child(1) { transition-delay: 0.1s; }
        .fade-in:nth-child(2) { transition-delay: 0.2s; }
        .fade-in:nth-child(3) { transition-delay: 0.3s; }
        .fade-in:nth-child(4) { transition-delay: 0.4s; }
        .fade-in:nth-child(5) { transition-delay: 0.5s; }
        .fade-in:nth-child(6) { transition-delay: 0.6s; }
    </style>
</head>
<body class="scroll-smooth">
    
    <?php
    // Include config file
    require_once 'config.php';
    
    // Get database connection
    $conn = getConnection();
    
    // Fetch data from database
    try {
        // Get statistics
        $stmt = $conn->query("SELECT * FROM statistik ORDER BY urutan ASC");
        $statistik = $stmt->fetchAll();
        
        // Get services
        $stmt = $conn->query("SELECT * FROM layanan WHERE status = 'aktif' ORDER BY urutan ASC");
        $layanan = $stmt->fetchAll();
        
        // Get about info
        $stmt = $conn->query("SELECT * FROM tentang LIMIT 1");
        $tentang = $stmt->fetch();
        
        // Get advantages
        $stmt = $conn->query("SELECT * FROM keunggulan WHERE status = 'aktif' ORDER BY urutan ASC");
        $keunggulan = $stmt->fetchAll();
        
        // Get portfolio
        $stmt = $conn->query("SELECT * FROM portfolio WHERE status = 'aktif' ORDER BY urutan ASC LIMIT 6");
        $portfolio = $stmt->fetchAll();
        
        // Get testimonials
        $stmt = $conn->query("SELECT * FROM testimoni WHERE status = 'aktif' ORDER BY urutan ASC LIMIT 6");
        $testimoni = $stmt->fetchAll();
        
        // Get price packages
        $stmt = $conn->query("SELECT * FROM paket_harga WHERE status = 'aktif' ORDER BY urutan ASC");
        $paket_harga = $stmt->fetchAll();
        
        // Get contact info
        $stmt = $conn->query("SELECT * FROM kontak_info LIMIT 1");
        $kontak = $stmt->fetch();
        
        // Get settings
        $stmt = $conn->query("SELECT * FROM settings");
        $settings = [];
        while ($row = $stmt->fetch()) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        
    } catch(PDOException $e) {
        die("Error fetching data: " . $e->getMessage());
    }
    ?>
    
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <div class="container-custom py-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="gradient-primary w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-building-columns text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-gradient heading-font">ArsiRAB Tulungagung</div>
                        <div class="text-xs text-gray-500 font-medium tracking-wide">Jasa Desain & RAB Profesional</div>
                    </div>
                </div>
                
                <div class="hidden lg:flex items-center space-x-10">
                    <a href="#beranda" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Beranda</a>
                    <a href="#layanan" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Layanan</a>
                    <a href="#tentang" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Tentang</a>
                    <a href="#portfolio" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Portfolio</a>
                    <a href="#proses" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Proses</a>
                    <a href="#harga" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Harga</a>
                    <a href="#kontak" class="nav-link text-gray-700 hover:text-gray-900 transition text-sm">Kontak</a>
                </div>
                
                <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20ingin%20konsultasi" 
                   target="_blank"
                   class="hidden lg:flex items-center gradient-primary text-white px-7 py-3.5 rounded-full font-semibold hover:shadow-2xl transition-all duration-300 hover:scale-105 text-sm">
                    <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                    <span>Konsultasi Gratis</span>
                </a>
                
                <button class="lg:hidden text-gray-700 p-2" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                    <a href="#beranda" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Beranda</a>
                    <a href="#layanan" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Layanan</a>
                    <a href="#tentang" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Tentang</a>
                    <a href="#portfolio" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Portfolio</a>
                    <a href="#proses" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Proses</a>
                    <a href="#harga" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Harga</a>
                    <a href="#kontak" class="block px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">Kontak</a>
                    
                    <div class="pt-4 pb-2">
                        <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20ingin%20konsultasi" 
                           target="_blank"
                           class="block w-full text-center gradient-primary text-white px-4 py-3 rounded-full font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                            Konsultasi Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="pt-32 md:pt-40 pb-16 md:pb-24 relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-50">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-96 h-96 bg-blue-600 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-green-600 rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center">
                <div>
                    <div class="inline-flex items-center bg-blue-50 border border-blue-200 text-blue-800 px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-semibold mb-6 md:mb-8 hero-badge">
                        <i class="fa-solid fa-medal text-blue-600 mr-2"></i>
                        <span class="text-xs md:text-sm">Terpercaya di Tulungagung</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-7xl font-black mb-6 md:mb-8 leading-tight heading-font">
                        Jasa Desain <span class="text-gradient">Arsitektur & RAB</span> Tulungagung
                    </h1>
                    <p class="text-base md:text-xl text-gray-600 mb-8 md:mb-10 leading-relaxed font-normal">
                        Solusi lengkap desain arsitektur dan RAB gedung profesional di Tulungagung dengan tim berpengalaman. 
                        Dari konsep hingga eksekusi, kami siap mewujudkan visi bangunan impian Anda.
                    </p>
                    
                    <div class="flex flex-wrap gap-3 md:gap-5 mb-8 md:mb-12">
                        <div class="flex items-center bg-white shadow-lg rounded-2xl px-4 md:px-6 py-3 md:py-4 border border-gray-100">
                            <i class="fa-solid fa-circle-check text-blue-600 text-lg md:text-xl mr-2 md:mr-3"></i>
                            <span class="font-semibold text-gray-800 text-sm md:text-base">100+ Proyek Sukses</span>
                        </div>
                        <div class="flex items-center bg-white shadow-lg rounded-2xl px-4 md:px-6 py-3 md:py-4 border border-gray-100">
                            <i class="fa-solid fa-users-gear text-green-600 text-lg md:text-xl mr-2 md:mr-3"></i>
                            <span class="font-semibold text-gray-800 text-sm md:text-base">Tim Profesional</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row flex-wrap gap-4 md:gap-5">
                        <a href="#layanan" class="gradient-primary text-white px-6 md:px-9 py-4 md:py-5 rounded-2xl font-bold text-sm md:text-base hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center justify-center">
                            <span>Lihat Layanan</span>
                            <i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                        <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20ingin%20konsultasi%20mengenai%20proyek%20saya%20di%20Tulungagung" 
                           target="_blank"
                           class="bg-white border-2 border-gray-800 text-gray-800 px-6 md:px-9 py-4 md:py-5 rounded-2xl font-bold text-sm md:text-base hover:bg-gray-800 hover:text-white transition-all duration-300 inline-flex items-center justify-center shadow-lg">
                            <i class="fa-brands fa-whatsapp text-lg md:text-xl mr-2 md:mr-3"></i>
                            <span>Chat WhatsApp</span>
                        </a>
                    </div>
                </div>
                
                <div class="relative mt-12 lg:mt-0">
                    <div class="absolute -top-10 -right-10 w-80 h-80 gradient-primary opacity-10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-80 h-80 gradient-secondary opacity-10 rounded-full blur-3xl"></div>
                    <img src="./img/thisisengineering-hoivM01c-vg-unsplash.jpg" 
                         alt="Modern Architecture" 
                         class="rounded-3xl shadow-2xl relative z-10 w-full border-4 md:border-8 border-white">
                    
                    <div class="absolute -bottom-6 md:-bottom-10 -left-6 md:-left-10 bg-white rounded-3xl shadow-2xl p-6 md:p-8 z-20 border-2 md:border-2 border-gray-100">
                        <div class="flex items-center space-x-3 md:space-x-5">
                            <div class="gradient-secondary w-16 md:w-20 h-16 md:h-20 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fa-solid fa-trophy text-white text-2xl md:text-3xl"></i>
                            </div>
                            <div>
                                <div class="text-3xl md:text-4xl font-black text-gradient heading-font">10+</div>
                                <div class="text-gray-600 font-semibold text-xs md:text-sm">Tahun Pengalaman</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 gradient-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzBoLTJ2Mmgydi0yem0tMiAyaC0ydjJoMnYtMnptMi0yaDJ2LTJoLTJ2MnoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        </div>
        
        <div class="container-custom relative z-10">
            <div class="grid md:grid-cols-3 gap-12">
                <?php foreach ($statistik as $stat): ?>
                <div class="text-center">
                    <div class="stats-counter mb-3"><?php echo htmlspecialchars($stat['nilai']); ?></div>
                    <div class="text-blue-100 text-lg font-semibold tracking-wide"><?php echo htmlspecialchars($stat['label']); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-16 md:py-28 bg-gradient-to-br from-gray-50 via-white to-blue-50">
        <div class="container-custom">
            <div class="text-center mb-16 md:mb-24">
                <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-4 md:mb-6 section-title heading-font">Layanan Kami</h2>
                <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">
                    Solusi lengkap dan terintegrasi untuk semua kebutuhan desain dan perencanaan bangunan Anda di Tulungagung
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">
                <?php foreach ($layanan as $index => $service): ?>
                <?php 
                    $gradients = ['gradient-primary', 'gradient-accent', 'gradient-secondary'];
                    $gradient = $gradients[$index % 3];
                    $features = explode('|', $service['fitur']);
                    ?>
                    <div class="card-3d feature-card bg-white rounded-3xl shadow-xl p-6 md:p-10 hover:shadow-2xl border border-gray-100 fade-in">
                        <div class="<?php echo $gradient; ?> w-20 h-20 md:w-24 md:h-24 rounded-3xl flex items-center justify-center mb-6 md:mb-8 feature-icon shadow-lg icon-rotate">
                            <i class="fa-solid <?php echo htmlspecialchars($service['icon']); ?> text-white text-3xl md:text-4xl"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold mb-4 md:mb-5 heading-font"><?php echo htmlspecialchars($service['nama']); ?></h3>
                        <p class="text-gray-600 mb-6 md:mb-8 leading-relaxed text-sm md:text-base">
                            <?php echo htmlspecialchars($service['deskripsi']); ?>
                        </p>
                        <ul class="space-y-3 md:space-y-4 mb-8 md:mb-10">
                            <?php foreach ($features as $feature): ?>
                            <li class="flex items-start">
                                <div class="<?php echo $gradient; ?> w-6 h-6 md:w-7 md:h-7 rounded-full flex items-center justify-center mr-2 md:mr-3 mt-0.5 flex-shrink-0">
                                    <i class="fa-solid fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-gray-700 text-sm md:text-base"><?php echo htmlspecialchars(trim($feature)); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20tertarik%20dengan%20layanan%20<?php echo urlencode($service['nama']); ?>" 
                        target="_blank"
                        class="block text-center <?php echo $gradient; ?> text-white py-3 md:py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105 text-sm md:text-base">
                            Konsultasi Sekarang
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-16 md:py-16 md:py-28 bg-white">
        <div class="container-custom">
            <div class="grid lg:grid-cols-2 gap-12 md:gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800" 
                             alt="Tim ArsiRAB Tulungagung" 
                             class="rounded-3xl shadow-2xl border-4 md:border-8 border-white">
                        <div class="absolute -bottom-6 md:-bottom-10 -right-6 md:-right-10 gradient-secondary p-6 md:p-10 rounded-3xl shadow-2xl border-2 md:border-4 border-white">
                            <div class="text-white text-center">
                                <div class="text-4xl md:text-5xl font-black mb-2 md:mb-3 heading-font">ISO</div>
                                <div class="text-xl md:text-2xl font-bold mb-1">9001</div>
                                <div class="text-xs md:text-sm font-semibold tracking-wider">Certified</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-6 md:mb-8 heading-font">Tentang <span class="text-gradient"><?php echo htmlspecialchars($settings['site_name'] ?? 'ArsiRAB Tulungagung'); ?></span></h2>
                    <p class="text-base md:text-lg text-gray-600 mb-4 md:mb-6 leading-relaxed">
                        <?php echo htmlspecialchars($tentang['deskripsi_1'] ?? ''); ?>
                    </p>
                    <p class="text-base md:text-lg text-gray-600 mb-8 md:mb-10 leading-relaxed">
                        <?php echo htmlspecialchars($tentang['deskripsi_2'] ?? ''); ?>
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 md:gap-6 mb-8 md:mb-10">
                        <?php foreach ($keunggulan as $index => $unggul): ?>
                        <div class="benefit-card p-5 md:p-7 shadow-lg fade-in">
                            <div class="benefit-icon gradient-primary w-12 h-12 md:w-16 md:h-16 rounded-2xl flex items-center justify-center mb-4 md:mb-5 shadow-md">
                                <i class="fa-solid <?php echo htmlspecialchars($unggul['icon']); ?> text-white text-xl md:text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-base md:text-lg mb-1 md:mb-2"><?php echo htmlspecialchars($unggul['judul']); ?></h4>
                            <p class="text-gray-600 text-xs md:text-sm"><?php echo htmlspecialchars($unggul['deskripsi']); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <a href="#kontak" class="inline-flex items-center gradient-primary text-white px-6 md:px-9 py-4 md:py-5 rounded-2xl font-bold text-sm md:text-base hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <span>Hubungi Kami</span>
                        <i class="fa-solid fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-16 md:py-28 bg-gradient-to-br from-gray-50 via-blue-50 to-white">
        <div class="container-custom">
            <div class="text-center mb-16 md:mb-24">
                <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-4 md:mb-6 section-title heading-font">Portfolio Kami</h2>
                <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">
                    Beberapa karya terbaik kami yang telah berhasil diwujudkan di Tulungagung dan sekitarnya
                </p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <?php foreach ($portfolio as $item): ?>
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group scale-in">
                    <img src="<?php echo htmlspecialchars($item['gambar'] ? 'uploads/' . $item['gambar'] : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&h=600&fit=crop'); ?>" 
                         alt="<?php echo htmlspecialchars($item['judul']); ?>" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font"><?php echo htmlspecialchars($item['judul']); ?></h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed"><?php echo htmlspecialchars($item['deskripsi']); ?></p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm"><?php echo htmlspecialchars($item['tahun'] . ' • ' . $item['lokasi']); ?></span>
                                <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-16">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20melihat%20portfolio%20lengkap" 
                   target="_blank"
                   class="inline-flex items-center gradient-primary text-white px-9 py-5 rounded-2xl font-bold text-base hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <span>Lihat Portfolio Lengkap</span>
                    <i class="fa-solid fa-arrow-right ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Proses Kerja Section -->
    <section id="proses" class="py-16 md:py-28 bg-white">
        <div class="container-custom">
            <div class="text-center mb-16 md:mb-24">
                <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-4 md:mb-6 section-title heading-font">Proses Kerja Kami</h2>
                <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">
                    Alur kerja yang terstruktur dan transparan untuk memastikan proyek Anda berjalan lancar
                </p>
            </div>
            
            <div class="relative">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                    <div class="flex gap-4 md:gap-6 items-start process-step fade-in-left">
                        <div class="gradient-primary w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center text-white font-black text-xl md:text-2xl flex-shrink-0 shadow-xl z-10">
                            1
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-white p-6 md:p-8 rounded-3xl shadow-lg flex-1 border border-blue-100">
                            <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-4 heading-font">Konsultasi & Brief</h3>
                            <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                                Kami melakukan meeting awal untuk memahami kebutuhan, visi, budget, dan ekspektasi Anda. 
                                Diskusi mendalam mengenai konsep, fungsi ruang, dan preferensi desain.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step fade-in-right">
                        <div class="gradient-accent w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            2
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-orange-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Survey Lokasi</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Tim kami melakukan survey langsung ke lokasi untuk mengukur lahan, menganalisa kondisi tanah, 
                                orientasi bangunan, dan potensi kendala yang mungkin terjadi.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start process-step fade-in-left">
                        <div class="gradient-secondary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            3
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-green-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Desain Konsep</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Pembuatan desain konsep awal berupa sketsa, denah, tampak, dan 3D rendering untuk memberikan 
                                gambaran visual yang jelas tentang hasil akhir bangunan.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step fade-in-right">
                        <div class="gradient-primary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            4
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-blue-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Revisi & Approval</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Presentasi desain kepada klien untuk mendapat feedback. Kami melakukan revisi hingga desain 
                                sesuai dengan keinginan dan mendapat persetujuan final dari Anda.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start process-step fade-in-left">
                        <div class="gradient-accent w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            5
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-orange-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Gambar Kerja & RAB</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Pembuatan gambar kerja detail (DED), perhitungan struktur, dan RAB lengkap dengan spesifikasi 
                                material yang detail dan akurat untuk keperluan pelaksanaan.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step fade-in-right">
                        <div class="gradient-secondary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            6
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-green-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Serah Terima</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Penyerahan semua dokumen lengkap beserta file digital. Kami juga memberikan konsultasi 
                                lanjutan selama proses pembangunan jika diperlukan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Harga & Layanan Section -->
    <section id="harga" class="py-16 md:py-28 gradient-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzBoLTJ2Mmgydi0yem0tMiAyaC0ydjJoMnYtMnptMi0yaDJ2LTJoLTJ2MnoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        </div>
        
        <div class="container-custom relative z-10">
            <div class="text-center mb-16 text-white">
                <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-6 heading-font">Estimasi Harga Layanan</h2>
                <p class="text-xl text-blue-100 max-w-4xl mx-auto leading-relaxed mb-8">
                    Kami bekerja berdasarkan kebutuhan proyek Anda. Berikut adalah referensi harga untuk berbagai jenis layanan desain dan RAB
                </p>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/30 text-white px-6 py-3 rounded-full">
                    <i class="fa-solid fa-circle-info text-yellow-300 mr-3"></i>
                    <span class="text-sm font-medium">Harga dapat disesuaikan dengan kompleksitas proyek</span>
                </div>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-10 mb-16">
                <?php foreach ($paket_harga as $index => $paket): ?>
                <?php 
                $isRecommended = $index == 1; // Paket kedua sebagai recommended
                $cardClass = $isRecommended ? 'bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 rounded-3xl p-10 shadow-2xl relative fade-in' : 'pricing-card bg-white rounded-3xl p-10 shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-3 fade-in';
                $textClass = $isRecommended ? 'text-white' : '';
                $badgeClass = $isRecommended ? 'bg-white/20 backdrop-blur-sm text-white' : 'bg-blue-100 text-blue-700';
                $features = explode('|', $paket['fitur']);
                ?>
                <div class="<?php echo $cardClass; ?>">
                    <div class="text-center mb-10 <?php echo $textClass; ?>">
                        <div class="inline-block <?php echo $badgeClass; ?> px-5 py-2 rounded-full text-sm font-bold mb-8 tracking-wide">
                            <?php echo htmlspecialchars($paket['badge']); ?>
                        </div>
                        <h3 class="text-3xl font-black mb-5 heading-font"><?php echo htmlspecialchars($paket['nama_paket']); ?></h3>
                        <div class="text-6xl font-black mb-3 heading-font <?php echo $isRecommended ? '' : 'text-gradient'; ?>"><?php echo htmlspecialchars($paket['harga']); ?></div>
                        <p class="<?php echo $isRecommended ? 'text-blue-100' : 'text-gray-500'; ?> font-medium"><?php echo htmlspecialchars($paket['harga_mulai'] ?? 'mulai dari'); ?></p>
                    </div>
                    
                    <ul class="space-y-4 mb-10 <?php echo $textClass; ?>">
                        <?php foreach ($features as $feature): ?>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check <?php echo $isRecommended ? 'text-yellow-300' : 'text-green-500'; ?> text-xl mr-3 mt-0.5"></i>
                            <span><?php echo htmlspecialchars(trim($feature)); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20ingin%20konsultasi%20untuk%20<?php echo urlencode($paket['nama_paket']); ?>" 
                       target="_blank"
                       class="block text-center <?php echo $isRecommended ? 'bg-white text-blue-700 hover:bg-yellow-300' : 'gradient-primary text-white'; ?> py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300">
                        Konsultasi Sekarang
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center">
                <p class="text-white text-lg mb-6 font-medium">Setiap proyek unik dan memiliki kebutuhan berbeda</p>
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20dan%20request%20desain" 
                   target="_blank"
                   class="inline-flex items-center bg-white text-blue-600 px-9 py-5 rounded-2xl font-bold text-base hover:shadow-xl transition-all duration-300 hover:scale-105">
                    <i class="fa-brands fa-whatsapp text-xl mr-3"></i>
                    <span>Konsultasi & Request Desain</span>
                </a>
                <p class="text-blue-100 text-sm mt-4">
                    <i class="fa-solid fa-clock mr-2"></i>Respon cepat dalam 1-2 jam kerja
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-28 gradient-primary text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-8 heading-font">Siap Wujudkan Bangunan Impian Anda?</h2>
            <p class="text-xl text-blue-100 mb-14 max-w-3xl mx-auto leading-relaxed">
                Konsultasikan proyek Anda dengan tim ahli kami sekarang juga. Gratis dan tanpa komitmen!
            </p>
            
            <div class="flex flex-wrap justify-center gap-6">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20gratis" 
                   target="_blank"
                   class="bg-white text-gray-800 px-6 md:px-10 py-5 md:py-6 rounded-2xl font-bold text-base hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center shadow-xl">
                    <i class="fa-brands fa-whatsapp text-2xl mr-3"></i>
                    <span>Konsultasi Gratis via WhatsApp</span>
                </a>
                <a href="tel:+6281234567890" 
                   class="bg-white/20 backdrop-blur-sm border-2 border-white text-white px-6 md:px-10 py-5 md:py-6 rounded-2xl font-bold text-base hover:bg-white hover:text-gray-800 transition-all duration-300 inline-flex items-center">
                    <i class="fa-solid fa-phone text-xl mr-3"></i>
                    <span>Telepon Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-16 md:py-28 bg-white">
        <div class="container-custom">
            <div class="text-center mb-24">
                <h2 class="text-3xl md:text-4xl lg:text-6xl font-black mb-6 section-title heading-font">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Kami siap membantu mewujudkan proyek bangunan Anda di Tulungagung dan sekitarnya
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-blue-100 fade-in">
                    <div class="gradient-primary w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">WhatsApp</h3>
                    <p class="text-gray-600 mb-5">Chat langsung dengan tim kami</p>
                    <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>" target="_blank" class="text-blue-700 font-bold hover:text-blue-900 text-lg">
                        <?php echo htmlspecialchars('+'.$kontak['whatsapp'] ?? '+62 812-3456-7890'); ?>
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-green-100 fade-in">
                    <div class="gradient-secondary w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-solid fa-envelope text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">Email</h3>
                    <p class="text-gray-600 mb-5">Kirim detail proyek Anda</p>
                    <a href="mailto:<?php echo htmlspecialchars($kontak['email'] ?? 'info@arsirab.com'); ?>" class="text-green-700 font-bold hover:text-green-900 text-lg">
                        <?php echo htmlspecialchars($kontak['email'] ?? 'info@arsirab.com'); ?>
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-orange-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-orange-100 fade-in">
                    <div class="gradient-accent w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-solid fa-location-dot text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">Kantor</h3>
                    <p class="text-gray-600 mb-5">Kunjungi kantor kami</p>
                    <p class="text-orange-700 font-bold text-base leading-relaxed">
                        <?php echo nl2br(htmlspecialchars($kontak['alamat'] ?? 'Jln. Rosalia, Mekarsari<br>Desa Tunggulsari, Kedungwaru<br>Tulungagung 66229')); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-20 bg-gradient-to-br from-gray-900 to-gray-800">
        <div class="container-custom">
            <div class="grid lg:grid-cols-4 gap-12 mb-12">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="gradient-primary w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-building-columns text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-white heading-font">ArsiRAB Tulungagung</div>
                            <div class="text-xs text-gray-400 tracking-wide">Jasa Desain & RAB Profesional</div>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Konsultan desain arsitektur dan perencanaan konstruksi terpercaya di Tulungagung sejak 2014.
                        Mewujudkan visi bangunan impian Anda dengan layanan profesional dan berkualitas.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-gray-300 hover:bg-gray-600 hover:text-white transition-all duration-300 hover:scale-110">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-gray-300 hover:bg-gradient-to-br hover:from-pink-600 hover:to-orange-600 hover:text-white transition-all duration-300 hover:scale-110">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-gray-300 hover:bg-gray-600 hover:text-white transition-all duration-300 hover:scale-110">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>" target="_blank" class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 hover:scale-110">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-8 heading-font">Layanan</h4>
                    <ul class="space-y-4">
                        <li><a href="#layanan" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Desain Arsitektur</a></li>
                        <li><a href="#layanan" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> RAB & Anggaran</a></li>
                        <li><a href="#layanan" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Desain Struktur</a></li>
                        <li><a href="#harga" class="text-gray-300 hover:text-blue-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Harga Layanan</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-8 heading-font">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fa-solid fa-location-dot text-blue-400 mt-1"></i>
                            <span class="text-gray-300 text-sm leading-relaxed"><?php echo nl2br(htmlspecialchars($kontak['alamat'] ?? 'Alamat belum diatur')); ?></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-phone text-blue-400"></i>
                            <span class="text-gray-300 text-sm"><?php echo htmlspecialchars('+' . $kontak['whatsapp'] ?? '+62 812-3456-7890'); ?></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-envelope text-blue-400"></i>
                            <span class="text-gray-300 text-sm"><?php echo htmlspecialchars($kontak['email'] ?? 'info@arsirab.com'); ?></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-clock text-blue-400"></i>
                            <span class="text-gray-300 text-sm"><?php echo htmlspecialchars($kontak['jam_kerja'] ?? 'Senin - Jumat: 08:00 - 17:00'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-10">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; 2025 ArsiRAB Tulungagung. All rights reserved.
                    </p>
                    <p class="text-gray-400 text-sm mt-2 md:mt-0">
                        Made with <i class="fa-solid fa-heart text-red-500 mx-1"></i> for Tulungagung
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/<?php echo htmlspecialchars($kontak['whatsapp'] ?? '6281234567890'); ?>?text=Halo,%20saya%20ingin%20konsultasi" 
       target="_blank"
       class="wa-float bg-green-500 w-20 h-20 rounded-full flex items-center justify-center hover:bg-green-600 transition-all duration-300 hover:scale-110">
        <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
    </a>

    <script>
        // ============================================
        // NAVBAR SCROLL EFFECT
        // ============================================
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-2xl', 'bg-white');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.remove('shadow-2xl', 'bg-white');
                navbar.classList.add('bg-white/95');
            }
        });

        // ============================================
        // SMOOTH SCROLL FOR NAVIGATION LINKS
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = document.getElementById('navbar').offsetHeight;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu after clicking
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        const icon = document.getElementById('mobile-menu-button').querySelector('i');
                        icon.className = 'fas fa-bars text-2xl';
                    }
                }
            });
        });

        // ============================================
        // MOBILE MENU TOGGLE
        // ============================================
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                
                // Change hamburger icon to X when menu is open
                const icon = this.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.className = 'fas fa-bars text-2xl';
                } else {
                    icon.className = 'fas fa-times text-2xl';
                }
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.className = 'fas fa-bars text-2xl';
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.className = 'fas fa-bars text-2xl';
                }
            });

            // Close mobile menu on window resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    mobileMenu.classList.add('hidden');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.className = 'fas fa-bars text-2xl';
                }
            });
        }

        // ============================================
        // SCROLL REVEAL ANIMATION - IMPROVED
        // ============================================
        function revealOnScroll() {
            const reveals = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .scale-in');
            
            reveals.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementBottom = element.getBoundingClientRect().bottom;
                const windowHeight = window.innerHeight;
                
                // Trigger animation when element is 80% visible
                if (elementTop < windowHeight * 0.8 && elementBottom > 0) {
                    element.classList.add('active');
                }
            });
        }

        // Initialize scroll reveal on load and scroll
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
        
        // Trigger on DOMContentLoaded as well
        document.addEventListener('DOMContentLoaded', revealOnScroll);

        // ============================================
        // LAZY LOADING IMAGES
        // ============================================
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // ============================================
        // WHATSAPP FLOAT BUTTON ANIMATION
        // ============================================
        const waFloat = document.querySelector('.wa-float');
        if (waFloat) {
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 300) {
                    // Scrolling down - hide button
                    waFloat.style.transform = 'translateY(150px)';
                } else {
                    // Scrolling up - show button
                    waFloat.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, false);
        }

        // ============================================
        // PREVENT SCROLL WHEN MENU IS OPEN (MOBILE)
        // ============================================
        if (mobileMenu) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class') {
                        if (!mobileMenu.classList.contains('hidden')) {
                            document.body.style.overflow = 'hidden';
                        } else {
                            document.body.style.overflow = '';
                        }
                    }
                });
            });
            
            observer.observe(mobileMenu, { attributes: true });
        }

        // ============================================
        // STATS COUNTER ANIMATION
        // ============================================
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + '+';
            }, 16);
        }

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.stats-counter');
        if (statsSection) {
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        document.querySelectorAll('.stats-counter').forEach(counter => {
                            const target = parseInt(counter.textContent);
                            if (!isNaN(target)) {
                                animateCounter(counter, target);
                            }
                        });
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            const statsContainer = statsSection.closest('section');
            if (statsContainer) {
                statsObserver.observe(statsContainer);
            }
        }

        // ============================================
        // INITIALIZE ON DOM CONTENT LOADED
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            console.log('ArsiRAB Tulungagung - Website Loaded Successfully');
            
            // Trigger initial scroll reveal
            revealOnScroll();
        });

        // ============================================
        // PERFORMANCE OPTIMIZATION
        // ============================================
        // Debounce scroll events
        function debounce(func, wait = 10) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Apply debounce to scroll handlers
        window.addEventListener('scroll', debounce(function() {
            // Scroll handlers are already defined above
        }, 10));

        // ============================================
        // BROWSER COMPATIBILITY CHECK
        // ============================================
        if (!window.CSS || !CSS.supports('backdrop-filter', 'blur(10px)')) {
            // Fallback for browsers that don't support backdrop-filter
            document.querySelectorAll('[style*="backdrop-filter"]').forEach(el => {
                el.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            });
        }

        // ============================================
        // ACCESSIBILITY ENHANCEMENTS
        // ============================================
        // Add keyboard navigation support
        document.querySelectorAll('a, button').forEach(element => {
            element.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    this.click();
                }
            });
        });

        // Focus trap for mobile menu
        if (mobileMenu) {
            mobileMenu.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !this.classList.contains('hidden')) {
                    this.classList.add('hidden');
                    mobileMenuButton.querySelector('i').className = 'fas fa-bars text-2xl';
                    mobileMenuButton.focus();
                }
            });
        }
    </script>
</body>
</html>