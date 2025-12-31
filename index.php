<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsiRAB Pro - Jasa Desain & RAB Gedung Profesional</title>
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
            background: linear-gradient(135deg, #2C2C2C 0%, #4A4A4A 50%, #1A1A1A 100%);
        }
        
        .gradient-secondary {
            background: linear-gradient(135deg, #8B7355 0%, #A0826D 50%, #6F5C4D 100%);
        }
        
        .gradient-accent {
            background: linear-gradient(135deg, #B8860B 0%, #DAA520 50%, #FFD700 100%);
        }
        
        .gradient-warm {
            background: linear-gradient(135deg, #D4A574 0%, #C19A6B 50%, #A67C52 100%);
        }
        
        .card-3d {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }
        
        .card-3d:hover {
            transform: translateY(-16px) scale(1.03);
            box-shadow: 0 40px 80px rgba(0,0,0,0.12);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #4A4A4A 0%, #2C2C2C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-purple {
            background: linear-gradient(135deg, #A0826D 0%, #6F5C4D 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-gold {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
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
            background: linear-gradient(90deg, #B8860B, #DAA520, #FFD700);
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
            background: linear-gradient(90deg, #B8860B, #DAA520);
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
            background: linear-gradient(135deg, #FFFFFF 0%, #FFD700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Montserrat', sans-serif;
        }
        
        .testimonial-card {
            background: linear-gradient(145deg, #FFFFFF, #F9FAFB);
            border-left: 5px solid #B8860B;
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            border-left-color: #DAA520;
            transform: translateX(8px);
        }
        
        .portfolio-overlay {
            background: linear-gradient(135deg, rgba(42, 42, 42, 0.95) 0%, rgba(74, 74, 74, 0.95) 100%);
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
            background: linear-gradient(90deg, #B8860B, #DAA520, #FFD700);
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
            background: linear-gradient(145deg, #4A4A4A, #2C2C2C);
            color: white;
            border-color: #6B6B6B;
            transform: translateY(-8px);
        }
        
        .benefit-card:hover .benefit-icon {
            background: white;
            color: #2C2C2C;
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
            background: linear-gradient(180deg, #2C2C2C, #A0826D);
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
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
        }
    </style>
</head>
<body class="scroll-smooth">
    
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <div class="container-custom py-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="gradient-primary w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-building-columns text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-gradient heading-font">ArsiRAB Pro</div>
                        <div class="text-xs text-gray-500 font-medium tracking-wide">Professional Architecture & RAB</div>
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
                
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi" 
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
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi" 
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
    <section id="beranda" class="pt-40 pb-24 relative overflow-hidden bg-gradient-to-br from-stone-50 via-amber-50 to-white">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-96 h-96 bg-amber-600 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-stone-600 rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom relative z-10">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div>
                    <div class="inline-flex items-center bg-amber-50 border border-amber-200 text-amber-800 px-5 py-2.5 rounded-full text-sm font-semibold mb-8 hero-badge">
                        <i class="fa-solid fa-medal text-amber-600 mr-2"></i>
                        <span>Terpercaya Sejak 2014</span>
                    </div>
                    <h1 class="text-6xl lg:text-7xl font-black mb-8 leading-tight heading-font">
                        Wujudkan <span class="text-gradient">Bangunan Impian</span> Anda Bersama Kami
                    </h1>
                    <p class="text-xl text-gray-600 mb-10 leading-relaxed font-normal">
                        Solusi lengkap desain arsitektur dan RAB gedung profesional dengan tim berpengalaman lebih dari 10 tahun. 
                        Dari konsep hingga eksekusi, kami siap mewujudkan visi Anda.
                    </p>
                    
                    <div class="flex flex-wrap gap-5 mb-12">
                        <div class="flex items-center bg-white shadow-lg rounded-2xl px-6 py-4 border border-gray-100">
                            <i class="fa-solid fa-circle-check text-amber-600 text-xl mr-3"></i>
                            <span class="font-semibold text-gray-800">100+ Proyek Sukses</span>
                        </div>
                        <div class="flex items-center bg-white shadow-lg rounded-2xl px-6 py-4 border border-gray-100">
                            <i class="fa-solid fa-users-gear text-gray-800 text-xl mr-3"></i>
                            <span class="font-semibold text-gray-800">Tim Profesional</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-5">
                        <a href="#layanan" class="gradient-primary text-white px-9 py-5 rounded-2xl font-bold text-base hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center">
                            <span>Lihat Layanan</span>
                            <i class="fa-solid fa-arrow-right ml-3"></i>
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20mengenai%20proyek%20saya" 
                           target="_blank"
                           class="bg-white border-2 border-gray-800 text-gray-800 px-9 py-5 rounded-2xl font-bold text-base hover:bg-gray-800 hover:text-white transition-all duration-300 inline-flex items-center shadow-lg">
                            <i class="fa-brands fa-whatsapp text-xl mr-3"></i>
                            <span>Chat WhatsApp</span>
                        </a>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="absolute -top-10 -right-10 w-80 h-80 gradient-primary opacity-10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-80 h-80 gradient-secondary opacity-10 rounded-full blur-3xl"></div>
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800" 
                         alt="Modern Architecture" 
                         class="rounded-3xl shadow-2xl relative z-10 w-full border-8 border-white">
                    
                    <div class="absolute -bottom-10 -left-10 bg-white rounded-3xl shadow-2xl p-8 z-20 border-2 border-gray-100">
                        <div class="flex items-center space-x-5">
                            <div class="gradient-warm w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fa-solid fa-trophy text-white text-3xl"></i>
                            </div>
                            <div>
                                <div class="text-4xl font-black text-gradient heading-font">10+</div>
                                <div class="text-gray-600 font-semibold text-sm">Tahun Pengalaman</div>
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
                <div class="text-center">
                    <div class="stats-counter mb-3">500+</div>
                    <div class="text-blue-100 text-lg font-semibold tracking-wide">Klien Puas</div>
                </div>
                <div class="text-center">
                    <div class="stats-counter mb-3">150+</div>
                    <div class="text-blue-100 text-lg font-semibold tracking-wide">Proyek Selesai</div>
                </div>
                <div class="text-center">
                    <div class="stats-counter mb-3">10+</div>
                    <div class="text-blue-100 text-lg font-semibold tracking-wide">Tahun Berpengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-28 bg-gradient-to-br from-stone-50 via-white to-amber-50">
        <div class="container-custom">
            <div class="text-center mb-24">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 section-title heading-font">Layanan Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Solusi lengkap dan terintegrasi untuk semua kebutuhan desain dan perencanaan bangunan Anda
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-10">
                <!-- Desain Arsitektur -->
                <div class="card-3d feature-card bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl border border-gray-100">
                    <div class="gradient-primary w-24 h-24 rounded-3xl flex items-center justify-center mb-8 feature-icon shadow-lg icon-rotate">
                        <i class="fa-solid fa-compass-drafting text-white text-4xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-5 heading-font">Desain Arsitektur</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Desain bangunan modern dan fungsional dengan mempertimbangkan estetika, efisiensi ruang, dan kebutuhan klien.
                    </p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <div class="gradient-primary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Desain rumah tinggal (1-3 lantai)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-primary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Desain gedung komersial & perkantoran</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-primary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Renovasi & remodeling</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-primary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Gambar kerja lengkap (DED)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-primary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">3D Rendering & Visualisasi</span>
                        </li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Desain%20Arsitektur" 
                       target="_blank"
                       class="block text-center gradient-primary text-white py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        Konsultasi Sekarang
                    </a>
                </div>

                <!-- RAB & Anggaran -->
                <div class="card-3d feature-card bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl border border-gray-100">
                    <div class="gradient-accent w-24 h-24 rounded-3xl flex items-center justify-center mb-8 feature-icon shadow-lg icon-rotate">
                        <i class="fa-solid fa-calculator text-white text-4xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-5 heading-font">RAB & Anggaran</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Perhitungan rencana anggaran biaya yang detail, akurat, dan transparan untuk perencanaan keuangan proyek Anda.
                    </p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <div class="gradient-accent w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Rencana Anggaran Biaya (RAB) detail</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-accent w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Bill of Quantity (BoQ) lengkap</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-accent w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Analisa harga satuan pekerjaan</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-accent w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Time schedule & kurva S</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-accent w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Estimasi biaya material & upah</span>
                        </li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20RAB%20dan%20Anggaran" 
                       target="_blank"
                       class="block text-center gradient-accent text-white py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        Konsultasi Sekarang
                    </a>
                </div>

                <!-- Desain Struktur -->
                <div class="card-3d feature-card bg-white rounded-3xl shadow-xl p-10 hover:shadow-2xl border border-gray-100">
                    <div class="gradient-secondary w-24 h-24 rounded-3xl flex items-center justify-center mb-8 feature-icon shadow-lg icon-rotate">
                        <i class="fa-solid fa-helmet-safety text-white text-4xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-5 heading-font">Desain Struktur</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Perhitungan dan desain struktur bangunan yang aman, kuat, dan sesuai dengan standar konstruksi nasional.
                    </p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <div class="gradient-secondary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Perhitungan struktur (SAP/ETABS)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-secondary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Gambar struktur detail</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-secondary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Analisa pondasi & soil test</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-secondary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Desain MEP (Mekanikal, Elektrikal, Plumbing)</span>
                        </li>
                        <li class="flex items-start">
                            <div class="gradient-secondary w-7 h-7 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <i class="fa-solid fa-check text-white text-xs"></i>
                            </div>
                            <span class="text-gray-700">Konsultasi engineering</span>
                        </li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Desain%20Struktur" 
                       target="_blank"
                       class="block text-center gradient-secondary text-white py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        Konsultasi Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-28 bg-white">
        <div class="container-custom">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800" 
                             alt="Tim ArsiRAB Pro" 
                             class="rounded-3xl shadow-2xl border-8 border-white">
                        <div class="absolute -bottom-10 -right-10 gradient-warm p-10 rounded-3xl shadow-2xl border-4 border-white">
                            <div class="text-white text-center">
                                <div class="text-5xl font-black mb-3 heading-font">ISO</div>
                                <div class="text-2xl font-bold mb-1">9001</div>
                                <div class="text-sm font-semibold tracking-wider">Certified</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-8 heading-font">Tentang <span class="text-gradient">ArsiRAB Pro</span></h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        ArsiRAB Pro adalah perusahaan konsultan desain arsitektur dan perencanaan konstruksi yang telah berpengalaman 
                        lebih dari 10 tahun dalam menangani berbagai proyek dari skala rumah tinggal hingga gedung komersial.
                    </p>
                    <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                        Kami didukung oleh tim profesional yang terdiri dari arsitek bersertifikat, civil engineer, quantity surveyor, 
                        dan drafter berpengalaman. Komitmen kami adalah memberikan solusi desain terbaik dengan harga terjangkau 
                        dan pelayanan yang memuaskan.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-10">
                        <div class="benefit-card p-7 shadow-lg">
                            <div class="benefit-icon gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-md">
                                <i class="fa-solid fa-certificate text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Bersertifikat</h4>
                            <p class="text-gray-600 text-sm">Tim profesional dengan sertifikasi resmi</p>
                        </div>
                        <div class="benefit-card p-7 shadow-lg">
                            <div class="benefit-icon gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-md">
                                <i class="fa-solid fa-shield-halved text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Terjamin</h4>
                            <p class="text-gray-600 text-sm">Garansi hasil dan revisi sampai puas</p>
                        </div>
                        <div class="benefit-card p-7 shadow-lg">
                            <div class="benefit-icon gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-md">
                                <i class="fa-solid fa-headset text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Support 24/7</h4>
                            <p class="text-gray-600 text-sm">Konsultasi kapan saja Anda butuhkan</p>
                        </div>
                        <div class="benefit-card p-7 shadow-lg">
                            <div class="benefit-icon gradient-primary w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-md">
                                <i class="fa-solid fa-handshake text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Terpercaya</h4>
                            <p class="text-gray-600 text-sm">Ratusan klien puas dengan layanan kami</p>
                        </div>
                    </div>
                    
                    <a href="#kontak" class="inline-flex items-center gradient-primary text-white px-9 py-5 rounded-2xl font-bold text-base hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <span>Hubungi Kami</span>
                        <i class="fa-solid fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-28 bg-gradient-to-br from-stone-50 via-amber-50 to-white">
        <div class="container-custom">
            <div class="text-center mb-24">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 section-title heading-font">Portfolio Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Beberapa karya terbaik kami yang telah berhasil diwujudkan dengan penuh dedikasi dan profesionalisme
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&h=600&fit=crop" 
                         alt="Portfolio 1" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Rumah Modern Minimalis</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Desain rumah 2 lantai dengan konsep minimalis modern di Jakarta Selatan. Luas bangunan 250m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2023 • Jakarta</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=500&h=600&fit=crop" 
                         alt="Portfolio 2" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Gedung Perkantoran</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Desain gedung kantor 5 lantai dengan RAB lengkap dan perhitungan struktur. Luas 1200m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2023 • Bandung</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=500&h=600&fit=crop" 
                         alt="Portfolio 3" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Ruko 3 Lantai</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Desain ruko komersial dengan lahan terbatas di area strategis. Luas bangunan 180m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2022 • Surabaya</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=500&h=600&fit=crop" 
                         alt="Portfolio 4" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Villa Tropis</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Desain villa dengan konsep tropis modern di area pegunungan. Luas bangunan 350m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2023 • Bogor</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=500&h=600&fit=crop" 
                         alt="Portfolio 5" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Renovasi Rumah</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Renovasi total rumah lama menjadi modern minimalis. Luas renovasi 180m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2022 • Tangerang</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="portfolio-item relative overflow-hidden rounded-3xl shadow-xl group">
                    <img src="https://images.unsplash.com/photo-1600573472550-8090b5e0745e?w=500&h=600&fit=crop" 
                         alt="Portfolio 6" 
                         class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="portfolio-overlay absolute inset-0 flex flex-col justify-end p-8">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                            <h3 class="text-2xl font-bold text-white mb-3 heading-font">Klinik 3 Lantai</h3>
                            <p class="text-white/90 text-sm mb-5 leading-relaxed">Desain klinik kesehatan dengan fasilitas lengkap. Luas bangunan 400m²</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/90 font-semibold text-sm">2023 • Bekasi</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white text-blue-600 w-11 h-11 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-lg">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
    <section id="proses" class="py-28 bg-white">
        <div class="container-custom">
            <div class="text-center mb-24">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 section-title heading-font">Proses Kerja Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Alur kerja yang terstruktur dan transparan untuk memastikan proyek Anda berjalan lancar
                </p>
            </div>
            
            <div class="relative">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16">
                    <div class="flex gap-6 items-start process-step">
                        <div class="gradient-primary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            1
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-blue-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Konsultasi & Brief</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Kami melakukan meeting awal untuk memahami kebutuhan, visi, budget, dan ekspektasi Anda. 
                                Diskusi mendalam mengenai konsep, fungsi ruang, dan preferensi desain.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step">
                        <div class="gradient-accent w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            2
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-green-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Survey Lokasi</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Tim kami melakukan survey langsung ke lokasi untuk mengukur lahan, menganalisa kondisi tanah, 
                                orientasi bangunan, dan potensi kendala yang mungkin terjadi.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start process-step">
                        <div class="gradient-secondary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            3
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-purple-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Desain Konsep</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Pembuatan desain konsep awal berupa sketsa, denah, tampak, dan 3D rendering untuk memberikan 
                                gambaran visual yang jelas tentang hasil akhir bangunan.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step">
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
                    
                    <div class="flex gap-6 items-start process-step">
                        <div class="gradient-accent w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            5
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-green-100">
                            <h3 class="text-2xl font-bold mb-4 heading-font">Gambar Kerja & RAB</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Pembuatan gambar kerja detail (DED), perhitungan struktur, dan RAB lengkap dengan spesifikasi 
                                material yang detail dan akurat untuk keperluan pelaksanaan.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex gap-6 items-start lg:pl-8 process-step">
                        <div class="gradient-secondary w-20 h-20 rounded-2xl flex items-center justify-center text-white font-black text-2xl flex-shrink-0 shadow-xl z-10">
                            6
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-3xl shadow-lg flex-1 border border-purple-100">
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
    {{-- <section id="harga" class="py-28 gradient-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzBoLTJ2Mmgydi0yem0tMiAyaC0ydjJoMnYtMnptMi0yaDJ2LTJoLTJ2MnoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
        </div>
        
        <div class="container-custom relative z-10">
            <div class="text-center mb-16 text-white">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 heading-font">Estimasi Harga Layanan</h2>
                <p class="text-xl text-blue-100 max-w-4xl mx-auto leading-relaxed mb-8">
                    Kami bekerja berdasarkan kebutuhan proyek Anda. Berikut adalah referensi harga untuk berbagai jenis layanan desain dan RAB
                </p>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/30 text-white px-6 py-3 rounded-full">
                    <i class="fa-solid fa-circle-info text-yellow-300 mr-3"></i>
                    <span class="text-sm font-medium">Harga dapat disesuaikan dengan kompleksitas proyek</span>
                </div>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-10 mb-16">
                <!-- Desain Basic -->
                <div class="pricing-card bg-white rounded-3xl p-10 shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-3">
                    <div class="text-center mb-10">
                        <div class="inline-block bg-blue-100 text-blue-700 px-5 py-2 rounded-full text-sm font-bold mb-8 tracking-wide">
                            DESAIN BASIC
                        </div>
                        <h3 class="text-3xl font-black mb-5 heading-font">Desain Sederhana</h3>
                        <div class="text-6xl font-black text-gradient mb-3 heading-font">Rp 3jt</div>
                        <p class="text-gray-500 font-medium">mulai dari / 100m²</p>
                    </div>
                    
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Desain denah 2D</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Tampak & potongan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">3D eksterior (2 angle)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">RAB sederhana</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">2x revisi</span>
                        </li>
                    </ul>
                    
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20untuk%20Desain%20Basic" 
                       target="_blank"
                       class="block text-center gradient-primary text-white py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300">
                        Konsultasi Sekarang
                    </a>
                </div>
                
                <!-- Desain Professional (Recommended) -->
                <div class="pricing-card bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 rounded-3xl p-10 shadow-2xl relative">
                    
                    <div class="text-center mb-10 text-white">
                        <div class="inline-block bg-white/20 backdrop-blur-sm text-white px-5 py-2 rounded-full text-sm font-bold mb-8 tracking-wide">
                            DESAIN PROFESIONAL
                        </div>
                        <h3 class="text-3xl font-black mb-5 heading-font">Desain Lengkap</h3>
                        <div class="text-6xl font-black mb-3 heading-font">Rp 5jt</div>
                        <p class="text-blue-100 font-medium">mulai dari / 100m²</p>
                    </div>
                    
                    <ul class="space-y-4 mb-10 text-white">
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>Semua fitur Desain Basic</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>3D interior (4 ruang)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>Gambar kerja lengkap (DED)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>RAB detail + BoQ</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>Perhitungan struktur</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-yellow-300 text-xl mr-3 mt-0.5"></i>
                            <span>5x revisi</span>
                        </li>
                    </ul>
                    
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20untuk%20Desain%20Profesional" 
                       target="_blank"
                       class="block text-center bg-white text-blue-700 py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300 hover:bg-yellow-300">
                        Konsultasi Sekarang
                    </a>
                </div>
                
                <!-- Desain Premium -->
                <div class="pricing-card bg-white rounded-3xl p-10 shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-3">
                    <div class="text-center mb-10">
                        <div class="inline-block gradient-warm text-white px-5 py-2 rounded-full text-sm font-bold mb-8 tracking-wide shadow-md">
                            DESAIN PREMIUM
                        </div>
                        <h3 class="text-3xl font-black mb-5 heading-font">Desain Eksklusif</h3>
                        <div class="text-6xl font-black text-gradient mb-3 heading-font">Rp 8jt</div>
                        <p class="text-gray-500 font-medium">mulai dari / 100m²</p>
                    </div>
                    
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Semua fitur Profesional</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">3D interior semua ruangan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Video walkthrough</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Desain MEP lengkap</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Time schedule proyek</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Revisi unlimited</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3 mt-0.5"></i>
                            <span class="text-gray-700">Konsultasi pembangunan</span>
                        </li>
                    </ul>
                    
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20untuk%20Desain%20Premium" 
                       target="_blank"
                       class="block text-center gradient-secondary text-white py-4 rounded-2xl font-bold hover:shadow-xl transition-all duration-300">
                        Konsultasi Sekarang
                    </a>
                </div>
            </div>

            <!-- Cara Kerja -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 border border-white/20 mb-12">
                <h3 class="text-4xl font-black text-white text-center mb-12 heading-font">Cara Kerja Kami</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/30">
                            <i class="fa-solid fa-comments text-white text-3xl"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3 heading-font">1. Konsultasi</h4>
                        <p class="text-blue-100 leading-relaxed">
                            Hubungi kami untuk diskusi kebutuhan dan konsep proyek Anda secara detail
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/30">
                            <i class="fa-solid fa-pencil-ruler text-white text-3xl"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3 heading-font">2. Desain</h4>
                        <p class="text-blue-100 leading-relaxed">
                            Tim kami akan membuat desain sesuai request dengan revisi hingga Anda puas
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 border border-white/30">
                            <i class="fa-solid fa-file-circle-check text-white text-3xl"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3 heading-font">3. Penyerahan</h4>
                        <p class="text-blue-100 leading-relaxed">
                            Setelah approved, kami serahkan semua file lengkap siap untuk dibangun
                        </p>
                    </div>
                </div>
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
    <section class="py-28 gradient-primary text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="container-custom text-center relative z-10">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-8 heading-font">Siap Wujudkan Bangunan Impian Anda?</h2>
            <p class="text-xl text-blue-100 mb-14 max-w-3xl mx-auto leading-relaxed">
                Konsultasikan proyek Anda dengan tim ahli kami sekarang juga. Gratis dan tanpa komitmen!
            </p>
            
            <div class="flex flex-wrap justify-center gap-6">
                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20gratis" 
                   target="_blank"
                   class="bg-white text-gray-800 px-10 py-6 rounded-2xl font-bold text-base hover:shadow-2xl transition-all duration-300 hover:scale-105 inline-flex items-center shadow-xl">
                    <i class="fa-brands fa-whatsapp text-2xl mr-3"></i>
                    <span>Konsultasi Gratis via WhatsApp</span>
                </a>
                <a href="tel:+6281234567890" 
                   class="bg-white/20 backdrop-blur-sm border-2 border-white text-white px-10 py-6 rounded-2xl font-bold text-base hover:bg-white hover:text-gray-800 transition-all duration-300 inline-flex items-center">
                    <i class="fa-solid fa-phone text-xl mr-3"></i>
                    <span>Telepon Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-28 bg-white">
        <div class="container-custom">
            <div class="text-center mb-24">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 section-title heading-font">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Kami siap membantu mewujudkan proyek bangunan Anda. Hubungi kami melalui berbagai channel
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-stone-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-stone-100">
                    <div class="gradient-primary w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">WhatsApp</h3>
                    <p class="text-gray-600 mb-5">Chat langsung dengan tim kami</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="text-amber-700 font-bold hover:text-amber-900 text-lg">
                        +62 812-3456-7890
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-amber-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-amber-100">
                    <div class="gradient-secondary w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-solid fa-envelope text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">Email</h3>
                    <p class="text-gray-600 mb-5">Kirim detail proyek Anda</p>
                    <a href="mailto:info@arsirabpro.com" class="text-amber-700 font-bold hover:text-amber-900 text-lg">
                        info@arsirabpro.com
                    </a>
                </div>
                
                <div class="bg-gradient-to-br from-stone-50 to-white p-10 rounded-3xl shadow-xl text-center hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-stone-100">
                    <div class="gradient-accent w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <i class="fa-solid fa-location-dot text-white text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 heading-font">Kantor</h3>
                    <p class="text-gray-600 mb-5">Kunjungi kantor kami</p>
                    <p class="text-amber-700 font-bold text-lg">
                        Jakarta, Indonesia
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
                            <div class="text-2xl font-black text-white heading-font">ArsiRAB Pro</div>
                            <div class="text-xs text-gray-400 tracking-wide">Professional Architecture & RAB</div>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Konsultan desain arsitektur dan perencanaan konstruksi terpercaya sejak 2014.
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
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 hover:scale-110">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-8 heading-font">Layanan</h4>
                    <ul class="space-y-4">
                        <li><a href="#layanan" class="text-gray-300 hover:text-amber-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Desain Arsitektur</a></li>
                        <li><a href="#layanan" class="text-gray-300 hover:text-amber-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> RAB & Anggaran</a></li>
                        <li><a href="#layanan" class="text-gray-300 hover:text-amber-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Desain Struktur</a></li>
                        <li><a href="#harga" class="text-gray-300 hover:text-amber-400 transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2"></i> Harga Layanan</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-8 heading-font">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fa-solid fa-location-dot text-amber-400 mt-1"></i>
                            <span class="text-gray-300 text-sm leading-relaxed">Jl. Sudirman No. 123<br>Jakarta Pusat, 10220</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-phone text-amber-400"></i>
                            <span class="text-gray-300 text-sm">+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-envelope text-amber-400"></i>
                            <span class="text-gray-300 text-sm">info@arsirabpro.com</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-clock text-amber-400"></i>
                            <span class="text-gray-300 text-sm">Senin - Jumat: 08:00 - 17:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-10">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; 2025 ArsiRAB Pro. All rights reserved. |
                        <a href="#" class="hover:text-amber-400 transition-colors ml-1">Privacy Policy</a> |
                        <a href="#" class="hover:text-amber-400 transition-colors ml-1">Terms of Service</a>
                    </p>
                    <p class="text-gray-400 text-sm mt-2 md:mt-0">
                        Made with <i class="fa-solid fa-heart text-red-500 mx-1"></i> by <span class="text-amber-400 font-semibold">ArsiRAB Pro</span> Team
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi" 
       target="_blank"
       class="wa-float bg-green-500 w-20 h-20 rounded-full flex items-center justify-center hover:bg-green-600 transition-all duration-300 hover:scale-110">
        <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
    </a>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
        // Navbar scroll effect
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

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
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
    </script>
</body>
</html>