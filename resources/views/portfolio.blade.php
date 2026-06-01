<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Wahyu Dahlawi — Artsy Portfolio 2026</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js (Menggunakan defer untuk menjamin urutan inisialisasi yang tepat) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Permanent+Marker&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Space Grotesk"', 'sans-serif'],
                        marker: ['"Permanent Marker"', 'cursive'],
                        hand: ['"Caveat"', 'cursive'],
                    },
                    colors: {
                        mat: {
                            bg: '#14301d',
                            grid: '#1c452a',
                            subgrid: '#183c24',
                            border: '#E4FF1A',
                        }
                    },
                    animation: {
                        'wiggle': 'wiggle 3s ease-in-out infinite',
                        'float': 'float 4s ease-in-out infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-1.5deg)' },
                            '50%': { transform: 'rotate(1.5deg)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(-1deg)' },
                            '50%': { transform: 'translateY(-8px) rotate(1deg)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Realistic Self-Healing Cutting Mat Pattern */
        .cutting-mat {
            background-color: #122919;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.08) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 50px 50px;
            position: relative;
        }
        .cutting-mat::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 10px 10px;
            pointer-events: none;
        }

        /* Artsy Neo-Brutalist Scrapbook Shadows */
        .card-shadow {
            box-shadow: 6px 6px 0px 0px rgba(0, 0, 0, 0.85);
        }
        .card-shadow-lg {
            box-shadow: 10px 10px 0px 0px rgba(0, 0, 0, 0.9);
        }
        .note-shadow {
            box-shadow: 3px 6px 12px rgba(0, 0, 0, 0.35);
        }

        /* Torn/Ripped Paper jaggy edges simulations */
        .ripped-edge-b {
            clip-path: polygon(0% 0%, 100% 0%, 100% 96%, 98% 99%, 95% 95%, 92% 98%, 89% 94%, 86% 98%, 82% 94%, 79% 97%, 75% 94%, 71% 98%, 68% 95%, 64% 97%, 61% 93%, 58% 97%, 55% 94%, 51% 98%, 47% 94%, 44% 96%, 40% 93%, 37% 97%, 33% 94%, 30% 98%, 26% 94%, 23% 97%, 19% 94%, 15% 98%, 12% 94%, 8% 97%, 5% 94%, 0% 99%);
        }
        
        .ripped-edge-all {
            clip-path: polygon(1% 2%, 4% 1%, 7% 3%, 11% 1%, 15% 2%, 18% 1%, 22% 3%, 26% 1%, 31% 3%, 35% 1%, 39% 2%, 43% 1%, 47% 3%, 52% 1%, 56% 2%, 60% 1%, 64% 3%, 68% 1%, 72% 2%, 77% 1%, 81% 3%, 85% 1%, 89% 2%, 93% 1%, 97% 3%, 99% 5%, 98% 9%, 99% 13%, 97% 18%, 99% 22%, 98% 27%, 99% 31%, 97% 36%, 98% 41%, 97% 46%, 99% 51%, 98% 56%, 99% 61%, 97% 66%, 98% 71%, 97% 76%, 99% 81%, 98% 86%, 99% 91%, 97% 96%, 95% 98%, 91% 97%, 87% 99%, 83% 97%, 79% 98%, 75% 97%, 71% 99%, 67% 97%, 62% 98%, 58% 96%, 54% 98%, 50% 97%, 45% 99%, 41% 97%, 37% 98%, 33% 97%, 29% 99%, 25% 97%, 21% 98%, 17% 96%, 13% 98%, 9% 97%, 5% 99%, 2% 96%, 1% 91%, 3% 86%, 1% 81%, 2% 76%, 1% 71%, 3% 66%, 1% 61%, 2% 56%, 1% 51%, 2% 46%, 1% 41%, 3% 36%, 1% 31%, 2% 26%, 1% 21%, 3% 16%, 1% 11%, 2% 6%);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="cutting-mat text-white overflow-x-hidden selection:bg-yellow-300 selection:text-black pb-24"
      x-data="portfolioData">

    <!-- Kontainer Data Laravel (Aman dari deteksi Syntax Error di static preview editor) -->
    <div id="laravel-data-store" 
         style="display: none;" 
         data-projects="{{ json_encode($projects ?? []) }}" 
         data-languages="{{ json_encode($languages ?? []) }}">
    </div>

    <!-- MEJA CUTTING MAT - PENGUKUR SISI TEPI MEJA -->
    <div class="absolute top-0 left-0 right-0 h-6 bg-amber-900/40 border-b-2 border-black flex items-center justify-between px-4 text-[9px] font-mono text-white/50 tracking-widest uppercase pointer-events-none z-40">
        <span>[ WAHYU DAHLAVI — STATIC STUDIO DESK 2026 ]</span>
        <span>SIZE: 1920mm x 1080mm</span>
        <span>ENGINE: LARAVEL 11 / LARAGON</span>
    </div>

    <!-- FLOATING ARTISTIC DESK ELEMENTS -->
    <div class="absolute top-28 right-12 w-80 h-10 bg-amber-500/20 border-2 border-black/40 rotate-12 hidden lg:flex items-center justify-between px-4 text-[9px] font-mono text-black/50 pointer-events-none z-10 shadow-md">
        <span>0cm</span><span>5</span><span>10</span><span>15</span><span>20</span><span>25</span><span>30cm</span>
    </div>
    <div class="absolute top-96 left-4 w-12 h-12 bg-red-600 rounded-full border-2 border-black rotate-12 flex items-center justify-center font-marker text-black text-xs font-bold pointer-events-none z-10 shadow-lg animate-bounce">
        PIN!
    </div>

    <div class="absolute top-36 left-1/4 w-3 h-3 bg-red-500 rounded-full shadow-[2px_4px_4px_rgba(0,0,0,0.5)] z-20 pointer-events-none"></div>
    <div class="absolute top-[80vh] right-10 w-3.5 h-3.5 bg-blue-500 rounded-full shadow-[2px_4px_4px_rgba(0,0,0,0.5)] z-20 pointer-events-none"></div>

    <!-- HEADER / NAVIGATION -->
    <header class="fixed top-8 left-1/2 -translate-x-1/2 w-[90%] max-w-5xl z-50">
        <div class="bg-white text-black px-6 py-4 border-4 border-black card-shadow flex items-center justify-between rotate-[-0.5deg]">
            <a href="#" class="flex items-center gap-2 group">
                <span class="font-marker text-2xl tracking-tight text-red-600 group-hover:text-black transition-colors">
                    WAHY.URL!
                </span>
                <span class="text-[10px] font-bold uppercase tracking-widest px-2 py-0.5 bg-black text-white rounded rotate-[-3deg]">
                    IT &amp; DSGN
                </span>
            </a>

            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-6 font-mono text-xs font-bold uppercase">
                <a href="#about" class="hover:bg-yellow-300 px-2 py-1 border-2 border-transparent hover:border-black rounded transition-all">01. Tentang</a>
                <a href="#skills" class="hover:bg-green-300 px-2 py-1 border-2 border-transparent hover:border-black rounded transition-all">02. Alat</a>
                <a href="#portfolio" class="hover:bg-blue-300 px-2 py-1 border-2 border-transparent hover:border-black rounded transition-all">03. Karya</a>
                <a href="#experience" class="hover:bg-purple-300 px-2 py-1 border-2 border-transparent hover:border-black rounded transition-all">04. Histori</a>
                <a href="#contact" class="bg-[#E4FF1A] px-4 py-2 border-2 border-black card-shadow hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all">
                    Hubungi Saya
                </a>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-black hover:text-red-600 transition-colors" aria-label="Toggle Menu">
                <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;"></i>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenuOpen" 
             class="md:hidden absolute top-20 left-0 w-full bg-white border-4 border-black p-6 flex flex-col gap-4 font-mono text-xs font-bold text-black uppercase card-shadow-lg"
             style="display: none;"
             x-transition>
            <a href="#about" @click="mobileMenuOpen = false" class="py-2 hover:bg-yellow-100 px-2 rounded">01. Tentang Saya</a>
            <a href="#skills" @click="mobileMenuOpen = false" class="py-2 hover:bg-green-100 px-2 rounded">02. Alat Tempur</a>
            <a href="#portfolio" @click="mobileMenuOpen = false" class="py-2 hover:bg-blue-100 px-2 rounded">03. Karya Seni</a>
            <a href="#experience" @click="mobileMenuOpen = false" class="py-2 hover:bg-purple-100 px-2 rounded">04. Pengalaman</a>
            <a href="#contact" @click="mobileMenuOpen = false" class="py-3 bg-red-500 text-white border-2 border-black text-center card-shadow font-bold">Kirim Pesan</a>
        </div>
    </header>

    <!-- HERO SECTION (Torn Paper Showcase) -->
    <section class="min-h-screen pt-44 pb-20 max-w-7xl mx-auto px-6 flex flex-col justify-between relative" id="hero">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start w-full mt-6">
            
            <!-- Left Info Sticky Note -->
            <div class="lg:col-span-4 lg:sticky lg:top-36 space-y-6">
                <!-- Polaroid Photo -->
                <div class="bg-white text-black p-4 pb-8 border-4 border-black card-shadow rotate-[-3deg] hover:rotate-[-1deg] transition-all duration-300 group">
                    <div class="h-64 bg-emerald-950 border-2 border-black relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] z-10"></div>
                        
                        <!-- Gambar Profil -->
                        <img src="{{ asset('image/IMG_5470.JPG') }}" alt="Foto Profil"
                             alt="Foto Profil Muhammad Wahyu Dahlawi" 
                             class="w-full h-full object-cover grayscale contrast-125 group-hover:grayscale-0 transition-all duration-500"
                             onerror="this.style.display='none'">
                        
                        <span class="absolute bottom-2 right-2 text-[10px] bg-black text-white px-2 py-0.5 font-mono z-20">2018-2026</span>
                    </div>
                    <div class="mt-4 font-hand text-3xl text-center leading-tight text-neutral-800">
                        "M. Wahyu Dahlawi"
                    </div>
                    <div class="text-center text-[10px] uppercase font-mono text-neutral-500 mt-1">
                        Mahasiswa Universitas Malikussaleh
                    </div>
                </div>

                <!-- Sticky Note (Language Skill) -->
                <div class="bg-yellow-200 text-black p-6 border-2 border-black note-shadow rotate-[2deg] relative group">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-24 h-6 bg-white/40 border border-black/10 rotate-[-1deg] backdrop-blur-xs"></div>
                    <span class="font-mono text-[9px] block text-neutral-600 mb-2">[ CATATAN BAHASA ]</span>
                    <h3 class="font-marker text-xl mb-4 text-[#E65100]">KEMAMPUAN BAHASA</h3>
                    <div class="space-y-3 font-mono text-xs font-bold">
                        <template x-for="(lang, idx) in languages" :key="idx">
                            <div>
                                <div class="flex justify-between">
                                    <span x-text="`${idx+1}. ${lang.name}`"></span>
                                    <span :class="lang.color" class="text-white px-1.5 rounded text-[10px]" x-text="lang.level"></span>
                                </div>
                                <div class="h-2 bg-black/10 border border-black mt-1">
                                    <div :class="lang.color" class="h-full" :style="`width: ${lang.percentage}%`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Ripped Paper Hero Info -->
            <div class="lg:col-span-8 space-y-8 lg:pl-6">
                <div class="bg-white text-black p-8 sm:p-12 border-4 border-black card-shadow-lg relative ripped-edge-all transform rotate-[1deg] hover:rotate-0 transition-transform duration-300">
                    <div class="absolute top-4 right-8 font-mono text-xs text-neutral-400">[ CODE: WAHYU-2026 ]</div>
                    
                    <span class="inline-block bg-red-600 text-white font-mono font-bold text-xs px-3 py-1 uppercase tracking-widest rotate-[-2deg] mb-6 shadow-sm">
                        * GRAPHIC DESIGNER &amp; INFORMATIKA *
                    </span>

                    <h1 class="font-marker text-4xl sm:text-7xl leading-none tracking-tight text-neutral-900 mb-6 uppercase">
                        Seni Visual <br class="hidden sm:block"> 
                        &amp; Barisan <span class="text-blue-600 border-b-4 border-dashed border-blue-600">Kode</span>.
                    </h1>

                    <p class="font-mono text-sm sm:text-base text-neutral-700 leading-relaxed max-w-2xl border-l-4 border-black pl-4">
                        Saya memadukan kedisiplinan dan nilai luhur <span class="bg-yellow-100 text-neutral-900 font-bold px-1">Pesantren Modern Misbahul Ulum</span> dengan keahlian teknologi dari <span class="bg-green-100 text-neutral-900 font-bold px-1">Teknik Informatika Universitas Malikussaleh</span> untuk melahirkan karya kreatif modern yang bernilai tinggi.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-8">
                        <a href="#portfolio" class="bg-red-500 text-white px-6 py-4 border-2 border-black font-marker text-lg card-shadow hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all rotate-[-1deg]">
                            Buka Galeri Karya!
                        </a>
                        <a href="#contact" class="bg-black text-white px-6 py-4 border-2 border-black font-mono text-xs uppercase font-bold flex items-center justify-center gap-2 rotate-[1deg] hover:bg-yellow-300 hover:text-black transition-colors">
                            Mulai Kolaborasi <i data-lucide="arrow-right-circle" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Bento Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                    <div class="bg-teal-50 text-black p-6 border-2 border-black card-shadow rotate-[-1.5deg] relative group hover:rotate-0 transition-transform">
                        <div class="absolute -top-3 left-6 w-16 h-6 bg-red-400/30 border border-black/10 rotate-3"></div>
                        <h3 class="font-marker text-lg mb-2 text-teal-800 uppercase">CV. RUANG KARYA MERDEKA</h3>
                        <p class="font-mono text-xs text-neutral-600">
                            Aktif sebagai Graphic Designer profesional. Merancang materi publikasi, identitas visual kreatif, dan promosi sosial media terpadu.
                        </p>
                    </div>

                    <div class="bg-pink-50 text-black p-6 border-2 border-black card-shadow rotate-[1.5deg] relative group hover:rotate-0 transition-transform">
                        <div class="absolute -top-3 right-6 w-16 h-6 bg-blue-400/30 border border-black/10 rotate-[-2deg]"></div>
                        <h3 class="font-marker text-lg mb-2 text-pink-800 uppercase">LAYANAN BERDIKARI</h3>
                        <p class="font-mono text-xs text-neutral-600">
                            Mendesain solusi visual inovatif dan merancang materi pemasaran dinamis secara lepas/kontrak yang fungsional dan estetis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTRO/ABOUT PAGE -->
    <section class="py-20 border-t-2 border-dashed border-white/20 max-w-7xl mx-auto px-6" id="about">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-[#FFF9C4] text-black p-8 border-4 border-black card-shadow-lg rotate-1 relative ripped-edge-all">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-600 rounded-full border border-black shadow"></div>
                    <span class="font-marker text-xs tracking-widest text-red-600 uppercase block mb-3">[ SEJARAH DIRI ]</span>
                    <h2 class="font-hand text-4xl font-bold leading-none mb-4 text-neutral-800">
                        "Lulusan Pesantren..."
                    </h2>
                    <p class="font-mono text-xs text-neutral-700 leading-relaxed space-y-4">
                        Enam tahun dihabiskan menempa kepemimpinan dan kemandirian di <strong>Pesantren Modern Misbahul Ulum (2018 - 2026)</strong>. Pengalaman ini memberi saya kedisiplinan dan penguasaan bahasa Arab yang kuat.
                    </p>
                    <div class="h-px bg-neutral-300 my-4"></div>
                    <p class="font-mono text-xs text-neutral-700 leading-relaxed">
                        Saat ini, perjalanan akademis saya berlanjut di program studi <strong>Teknik Informatika Universitas Malikussaleh (UNIMAL)</strong>, di mana logika bertemu dengan visi seni visual saya.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white text-black p-8 border-4 border-black card-shadow-lg relative rounded-lg">
                    <div class="absolute -left-3 top-10 flex flex-col gap-4">
                        <div class="w-6 h-3 bg-neutral-300 border border-black rounded-full"></div>
                        <div class="w-6 h-3 bg-neutral-300 border border-black rounded-full"></div>
                        <div class="w-6 h-3 bg-neutral-300 border border-black rounded-full"></div>
                    </div>

                    <div class="pl-6 space-y-6">
                        <h3 class="font-marker text-2xl text-neutral-800 border-b-2 border-black pb-2">PROFIL &amp; MINAT UTAMA</h3>
                        <ul class="space-y-4 font-mono text-xs sm:text-sm text-neutral-800 list-disc list-inside">
                            <li>
                                <strong class="text-red-600">Teknik Informatika (UNIMAL):</strong> Memahami logika rekayasa perangkat lunak, pengembangan website portofolio interaktif, dan pemecahan masalah teknis.
                            </li>
                            <li>
                                <strong class="text-blue-600">Komunikasi Visual:</strong> Desainer Grafis aktif di CV. Ruang Karya Merdeka dan Layanan Berdikari dengan spesialisasi aset media sosial digital.
                            </li>
                            <li>
                                <strong class="text-emerald-600">Bilingual:</strong> Kemampuan bahasa Arab tingkat menengah (Intermediate) serta bahasa Inggris dasar (Beginner) untuk memperluas jangkauan kolaborasi global.
                            </li>
                        </ul>
                        <div class="pt-6 border-t border-dashed border-neutral-300 flex items-center justify-between text-xs font-mono text-neutral-500">
                            <span>LOKASI: LHOKSEUMAWE, ACEH</span>
                            <span>STATUS: MAHASISWA AKTIF</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ALAT TEMPUR / SKILLS SECTION -->
    <section class="py-20 border-t-2 border-dashed border-white/20 max-w-7xl mx-auto px-6" id="skills">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-2">
                <span class="inline-block bg-black text-[#E4FF1A] font-mono text-xs px-2.5 py-1 uppercase border-2 border-white rotate-[-1deg]">[ 02. ALAT TEMPUR ]</span>
                <h2 class="font-marker text-3xl sm:text-5xl uppercase tracking-tight">KREATIVITAS &amp; TOOLS</h2>
            </div>
            <p class="font-hand text-2xl text-[#E4FF1A] mt-4 md:mt-0 rotate-[-1deg]">
                / Tingkat kemahiran pengerjaan proyek visual saya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-stretch">
            <!-- Skill 1: Canva -->
            <div class="bg-yellow-100 text-black p-6 border-2 border-black note-shadow rotate-[1deg] hover:rotate-0 transition-transform relative group flex flex-col justify-between h-full">
                <div>
                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-600 rounded-full border border-black shadow"></div>
                    <div class="absolute -top-3 left-6 w-16 h-5 bg-white/40 border border-black/10 rotate-3"></div>
                   
                    <div class="h-32 w-full flex items-center justify-center bg-white/60 border-2 border-dashed border-black/10 rounded-lg p-3 mb-4 overflow-hidden">
                        <img src="{{ asset('image/Canva-logo-PNG-large-size.png') }}" alt="Canva"
                             alt="Canva Logo" 
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                            x-on:error="$el.src = $el.src.includes('assets/' ? 'Canva-logo-PNG-large-size.png' ">
                    </div>
                     <div class="flex justify-between items-start mb-4 pt-2">
                        <span class="bg-emerald-500 text-white font-mono text-[9px] font-bold px-2.5 py-1 rounded border border-black uppercase rotate-[-2deg]">Sangat Baik</span>
                    </div>
                    <h3 class="font-marker text-lg mb-2 text-yellow-800">CANVA EXPERT</h3>
                    <p class="font-mono text-xs text-neutral-600 leading-relaxed">
                        Penyusunan tata letak publikasi, proposal, slide deck premium, serta konten pemasaran visual yang efisien dan memikat mata.
                    </p>
                </div>
            </div>

            <!-- Skill 2: CapCut -->
            <div class="bg-pink-100 text-black p-6 border-2 border-black note-shadow rotate-[-2deg] hover:rotate-0 transition-transform relative group flex flex-col justify-between h-full">
                <div>
                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-blue-600 rounded-full border border-black shadow"></div>
                    <div class="h-32 w-full flex items-center justify-center bg-white/60 border-2 border-dashed border-black/10 rounded-lg p-3 mb-4 overflow-hidden">
                        <img src="{{ asset('image/capcut-removebg.png') }}"
                             alt="CapCut Logo" 
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                               x-on:error="$el.src = $el.src.includes('assets/' ? 'capcut-removebg.png' ">
                    </div>
                    <div class="flex justify-between items-start mb-4 pt-2">
                        <span class="bg-blue-500 text-white font-mono text-[9px] font-bold px-2.5 py-1 rounded border border-black uppercase rotate-[3deg]">Profesional</span>
                    </div>
                    <h3 class="font-marker text-lg mb-2 text-pink-800">CAPCUT PRO</h3>
                    <p class="font-mono text-xs text-neutral-600 leading-relaxed">
                        Editing video pendek kampanye vertikal, transisi audio presisi tinggi, sinkronisasi teks, serta perancangan ritme penceritaan modern.
                    </p>
                </div>
            </div>

            <!-- Skill 3: Photoshop -->
            <div class="bg-blue-100 text-black p-6 border-2 border-black note-shadow rotate-[1.5deg] hover:rotate-0 transition-transform relative group flex flex-col justify-between h-full">
                <div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-20 h-5 bg-white/30 border border-black/5 rotate-[-2deg]"></div>
                    <div class="h-32 w-full flex items-center justify-center bg-white/60 border-2 border-dashed border-black/10 rounded-lg p-3 mb-4 overflow-hidden">
                        <img src="{{ asset('image/ps-removebg-preview.png') }}"
                             alt="CapCut Logo" 
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                               x-on:error="$el.src = $el.src.includes('assets/' ? 'ps-removebg-preview.png' ">
                    </div>
                       <div class="flex justify-between items-start mb-4 pt-2">
                        <span class="bg-purple-500 text-white font-mono text-[9px] font-bold px-2.5 py-1 rounded border border-black uppercase rotate-[-3deg]">Baik</span>
                    </div>
                    <h3 class="font-marker text-lg mb-2 text-blue-800">PHOTOSHOP</h3>
                    <p class="font-mono text-xs text-neutral-600 leading-relaxed">
                        Pengolahan aset grafis, pemotongan objek rumit (cutting assets), digital imaging dasar, serta manipulasi kombinasi warna foto.
                    </p>
                </div>
            </div>

            <!-- Skill 4: Affinity -->
            <div class="bg-green-100 text-black p-6 border-2 border-black note-shadow rotate-[-1deg] hover:rotate-0 transition-transform relative group flex flex-col justify-between h-full">
                <div>
                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-yellow-500 rounded-full border border-black shadow"></div>

                    <div class="h-32 w-full flex items-center justify-center bg-white/60 border-2 border-dashed border-black/10 rounded-lg p-3 mb-4 overflow-hidden">
                        <img src="{{ asset('image/affinity.png') }}" 
                             alt="Affinity Logo" 
                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                             x-on:error="$el.src = $el.src.includes("assets/") ? 'affinity.png'">
                    </div>
                                        <div class="flex justify-between items-start mb-4 pt-2">
                        <span class="bg-neutral-500 text-white font-mono text-[9px] font-bold px-2.5 py-1 rounded border border-black uppercase rotate-[2deg]">Pemula</span>
                    </div>
                    <h3 class="font-marker text-lg mb-2 text-green-800">AFFINITY</h3>
                    <p class="font-mono text-xs text-neutral-600 leading-relaxed">
                        Mempelajari dasar pembuatan grafik vektor, penataan layout materi cetak halaman ganda, serta ikonografi digital minimalis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI KARYA / PORTFOLIO SECTION -->
    <section class="py-20 border-t-2 border-dashed border-white/20 max-w-7xl mx-auto px-6" id="portfolio">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="space-y-2">
                <span class="inline-block bg-[#E4FF1A] text-black font-mono text-xs px-2.5 py-1 uppercase border-2 border-black rotate-[1deg] shadow-sm">[ 03. GALERI MEJA KERJA ]</span>
                <h2 class="font-marker text-3xl sm:text-5xl uppercase tracking-tight text-white">HASIL KARYA PILIHAN</h2>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap items-center gap-2 mt-6 md:mt-0 font-mono text-xs text-black">
                <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-[#E4FF1A] border-2 border-black translate-y-[-2px]' : 'bg-neutral-300 hover:bg-white'" class="px-4 py-2 border-2 border-black font-bold uppercase transition-all shadow-sm">
                    SEMUA [ALL]
                </button>
                <button @click="activeTab = 'design'" :class="activeTab === 'design' ? 'bg-[#E4FF1A] border-2 border-black translate-y-[-2px]' : 'bg-neutral-300 hover:bg-white'" class="px-4 py-2 border-2 border-black font-bold uppercase transition-all shadow-sm">
                    DESAIN [DSGN]
                </button>
                <button @click="activeTab = 'video'" :class="activeTab === 'video' ? 'bg-[#E4FF1A] border-2 border-black translate-y-[-2px]' : 'bg-neutral-300 hover:bg-white'" class="px-4 py-2 border-2 border-black font-bold uppercase transition-all shadow-sm">
                    VIDEO
                </button>
                <button @click="activeTab = 'branding'" :class="activeTab === 'branding' ? 'bg-[#E4FF1A] border-2 border-black translate-y-[-2px]' : 'bg-neutral-300 hover:bg-white'" class="px-4 py-2 border-2 border-black font-bold uppercase transition-all shadow-sm">
                    SOSMED
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
            <template x-for="proj in projects" :key="proj.id">
                <div x-show="activeTab === 'all' || activeTab === proj.category"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     :class="`bg-white text-black p-5 pb-8 border-4 border-black card-shadow ${proj.rotation} hover:rotate-0 hover:scale-[1.02] transition-all duration-300 cursor-pointer relative group flex flex-col justify-between h-full`"
                     @click="selectedProject = proj; activeSlide = 0;">
                    
                    <div :class="`absolute -top-3 left-1/2 -translate-x-1/2 w-24 h-6 ${proj.tapeColor} border border-black/10 rotate-[-1deg] backdrop-blur-xs z-10`"></div>

                    <div>
                        <div :class="`h-56 ${proj.color} border-2 border-black relative flex flex-col justify-between overflow-hidden bg-black`">
                            
                            <span class="absolute top-2 left-3 font-marker text-3xl opacity-25 z-10 text-white" x-text="proj.num"></span>
                            
                            <!-- Mengambil media gambar lokal/online sesuai dengan array di aslinya secara fleksibel -->
                            <template x-if="proj.video && proj.video_type === 'iframe'">
                                <div class="w-full h-full relative">
                                    <img :src="`https://img.youtube.com/vi/${proj.youtube_id}/hqdefault.jpg`" :alt="proj.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                                        <div class="w-14 h-14 bg-red-600 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                            <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="proj.video && proj.video_type !== 'iframe'">
                                <video :src="proj.video" autoplay loop muted playsinline class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"></video>
                            </template>

                            <template x-if="!proj.video && proj.image">
                                <img :src="proj.image" :alt="proj.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.style.display='none'">
                            </template>

                            <div class="absolute bottom-0 inset-x-0 bg-black/60 text-white p-2 flex justify-between items-center text-[10px] font-mono font-bold tracking-wider backdrop-blur-xs z-10">
                                <span x-text="proj.platform"></span>
                                <span x-text="`CAT: ${proj.category.toUpperCase()}`"></span>
                            </div>
                        </div>

                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between items-center font-mono text-[9px] text-neutral-500">
                                <span x-text="proj.company"></span>
                                <span>[ REKAP 2026 ]</span>
                            </div>
                            <h3 class="font-marker text-lg text-neutral-900 group-hover:text-red-600 transition-colors" x-text="proj.title"></h3>
                            <p class="font-hand text-lg text-neutral-700 leading-tight" x-text="proj.desc"></p>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <div class="w-6 h-6 rounded-full bg-yellow-300 border border-black flex items-center justify-center font-mono text-[10px] font-bold">
                            →
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- PORTFOLIO DETAIL MODAL -->
        <div x-show="selectedProject !== null" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6" style="display: none;" x-transition>
            <div class="absolute inset-0 bg-black/85 backdrop-blur-sm" @click="selectedProject = null"></div>

            <div x-show="selectedProject !== null" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 scale-95 translate-y-8" x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="bg-[#FCFBF7] text-black border-4 border-black w-full max-w-3xl rounded-xl relative z-10 p-6 sm:p-10 card-shadow-lg ripped-edge-all text-left">
                <button @click="selectedProject = null; activeSlide = 0;" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white border-2 border-black flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors shadow">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <div class="space-y-6" x-data="{ copied: false }">
                    <div class="space-y-1">
                        <span class="text-xs font-mono uppercase tracking-widest text-red-600 font-bold" x-text="selectedProject && selectedProject.company"></span>
                        <h2 class="font-marker text-3xl uppercase text-neutral-900" x-text="selectedProject && selectedProject.title"></h2>
                    </div>

                    <div class="relative">
                        <div :class="`h-64 sm:h-96 rounded-lg ${selectedProject && selectedProject.color} border-4 border-black relative overflow-hidden bg-black`">
                            <span class="absolute top-3 left-4 font-marker text-5xl opacity-20 z-10 text-white" x-text="selectedProject && `[${selectedProject.num}]`"></span>
                            
                            <!-- Video di Modal Detail Slider -->
                            <template x-if="selectedProject && selectedProject.video && selectedProject.video_type === 'iframe'">
                                <div class="w-full h-full relative">
                                    <img :src="`https://img.youtube.com/vi/${selectedProject.youtube_id}/hqdefault.jpg`" :alt="selectedProject.title" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-black/50 gap-4">
                                        <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center border-4 border-white shadow-xl">
                                            <svg class="w-9 h-9 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                        <a :href="`https://youtu.be/${selectedProject.youtube_id}`" target="_blank"
                                           class="bg-red-600 text-white font-mono font-bold text-xs px-5 py-2 border-2 border-white rounded shadow hover:bg-red-700 transition-colors uppercase tracking-wider"
                                           @click.stop>
                                            Tonton di YouTube ↗
                                        </a>
                                    </div>
                                </div>
                            </template>
                            <template x-if="selectedProject && selectedProject.video && selectedProject.video_type !== 'iframe'">
                                <video :src="selectedProject.video" controls autoplay loop muted playsinline class="w-full h-full object-cover"></video>
                            </template>

                            <!-- Gambar di Modal Detail Slider -->
                            <template x-if="selectedProject && (!selectedProject.video && selectedProject.image)">
                                <img :src="selectedProject.image" :alt="selectedProject.title" class="w-full h-full object-cover" onerror="this.style.display='none'">
                            </template>

                            <div class="absolute bottom-0 inset-x-0 bg-black/75 text-white p-3 flex justify-between items-center text-xs font-mono font-bold tracking-widest z-10">
                                <span>KARYA UTAMA</span>
                                <span x-text="selectedProject && `APLIKASI: ${selectedProject.platform}`"></span>
                            </div>
                        </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 pt-2 font-mono">
                        <div class="md:col-span-8 space-y-3">
                            <h4 class="font-marker text-xs text-[#E65100] uppercase tracking-widest">[ DETAIL KARYA ]</h4>
                            <p class="text-neutral-700 text-xs leading-relaxed" x-text="selectedProject && selectedProject.desc"></p>
                        </div>
                        <div class="md:col-span-4 space-y-2 border-t md:border-t-0 md:border-l border-neutral-300 pt-4 md:pt-0 md:pl-4 text-xs">
                            <div>
                                <span class="block text-neutral-400 text-[10px]">ORGANISASI/KAMPUS</span>
                                <strong x-text="selectedProject && selectedProject.company"></strong>
                            </div>
                            <div>
                                <span class="block text-neutral-400 text-[10px]">APLIKASI / TEKNOLOGI</span>
                                <strong class="text-red-600" x-text="selectedProject && selectedProject.platform"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 pt-6 border-t border-dashed border-neutral-300">
                        <button @click="copied = true; navigator.clipboard.writeText(window.location.href); setTimeout(() => copied = false, 2000)" class="px-5 py-3 bg-[#E4FF1A] text-black border-2 border-black font-marker text-xs uppercase tracking-wider rounded shadow hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all flex items-center gap-2">
                            <i data-lucide="copy" class="w-4 h-4" x-show="!copied"></i>
                            <i data-lucide="check" class="w-4 h-4" x-show="copied" style="display:none;"></i>
                            <span x-text="copied ? 'COPY BERHASIL!' : 'SALIN LINK PORTOFOLIO'"></span>
                        </button>
                        <button @click="selectedProject = null; activeSlide = 0;" class="px-5 py-3 bg-white hover:bg-neutral-100 text-black border-2 border-black font-mono text-xs font-bold rounded shadow transition-all">
                            TUTUP DOKUMEN
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HISTORI / CHRONOLOGY SECTION -->
    <section class="py-20 border-t-2 border-dashed border-white/20 max-w-7xl mx-auto px-6" id="experience">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-4 space-y-6">
                <span class="inline-block bg-white text-black font-mono text-xs px-2.5 py-1 uppercase border-2 border-black rotate-[-2deg] shadow-sm">[ 04. HISTORI KERJA ]</span>
                <h2 class="font-marker text-3xl sm:text-4xl uppercase tracking-tight text-white leading-none">
                    RIWAYAT <br>&amp; ORGANISASI
                </h2>
                <p class="font-hand text-2xl text-yellow-300 leading-tight">
                    "Mengembangkan karakter, kepemimpinan, dan kecakapan visual sejak masa santri."
                </p>
                <div class="w-20 h-2 bg-[#E4FF1A] border border-black shadow"></div>
            </div>

            <div class="lg:col-span-8 space-y-6">
                <!-- Org 1 -->
                <div class="bg-white text-black p-6 border-2 border-black card-shadow rotate-1 relative group hover:rotate-0 transition-transform">
                    <div class="absolute -top-3 left-8 w-16 h-5 bg-red-400/20 border border-black/10 rotate-[-1deg]"></div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-black pb-2 mb-4 font-mono">
                        <span class="text-xs text-red-600 font-bold">[ 2023 - 2024 ]</span>
                        <h3 class="font-marker text-lg text-neutral-800 uppercase">OSPMMU (PESANTREN ADMIN)</h3>
                    </div>
                    <h4 class="font-mono text-xs font-bold uppercase text-neutral-500 mb-2">Video Editor &amp; Sosmed Admin (1.5 Tahun)</h4>
                    <p class="font-mono text-xs text-neutral-700 leading-relaxed">
                        Mengabadikan kegiatan harian, video rekap, dokumenter resmi, serta memegang kendali penuh atas akun sosial media resmi Organisasi Santri Pesantren Modern Misbahul Ulum.
                    </p>
                </div>

                <!-- Org 2 -->
                <div class="bg-white text-black p-6 border-2 border-black card-shadow rotate-[-1deg] relative group hover:rotate-0 transition-transform">
                    <div class="absolute -top-3 right-8 w-16 h-5 bg-blue-400/20 border border-black/10 rotate-[2deg]"></div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-black pb-2 mb-4 font-mono">
                        <span class="text-xs text-blue-600 font-bold">[ 2025-SEKARANG]</span>
                        <h3 class="font-marker text-lg text-neutral-800 uppercase">CENDIKIA FOUNDATION</h3>
                    </div>
                    <h4 class="font-mono text-xs font-bold uppercase text-neutral-500 mb-2">Social Media Officer</h4>
                    <p class="font-mono text-xs text-neutral-700 leading-relaxed">
                        Mengembangkan identitas visual edukatif, menyusun desain infografis, dan mengonsep kampanye publikasi yang bertujuan ntuk memberdayakan literasi.
                    </p>
                </div>

                <div class="bg-white text-black p-6 border-2 border-black card-shadow rotate-[0.5deg] relative group hover:rotate-0 transition-transform">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-16 h-5 bg-green-400/20 border border-black/10 rotate-[-3deg]"></div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-black pb-2 mb-4 font-mono">
                        <span class="text-xs text-emerald-600 font-bold">[ 2025-SEKARANG ]</span>
                        <h3 class="font-marker text-lg text-neutral-800 uppercase">UKM KSM CREATIVE MINORITY</h3>
                    </div>
                    <h4 class="font-mono text-xs font-bold uppercase text-neutral-500 mb-2">Anggota Divisi Teknologi</h4>
                    <p class="font-mono text-xs text-neutral-700 leading-relaxed">
                        Mendukung kolaborasi dari berbagai divisi, serta rutin aktif dalam penyuntingan video dan fler mingguan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 border-t-2 border-dashed border-white/20 max-w-7xl mx-auto px-6" id="contact" x-data="{ formSubmitted: false }">
        <div class="bg-white text-black p-8 sm:p-12 border-4 border-black card-shadow-lg relative ripped-edge-all transform rotate-[-0.5deg]">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <div class="lg:col-span-5 space-y-6">
                    <span class="inline-block bg-black text-[#E4FF1A] font-mono text-xs px-2.5 py-1 uppercase border-2 border-black rotate-[-1deg] shadow-sm">[ 05. KIRIM PESAN ]</span>
                    <h2 class="font-marker text-3xl sm:text-5xl uppercase tracking-tight text-neutral-950 leading-none">
                        MARI KITA <br>MEMULAI!
                    </h2>
                    <p class="font-mono text-xs text-neutral-600 leading-relaxed max-w-sm">
                        Silakan hubungi saya untuk kolaborasi desain grafis profesional, video editing kampanye sosial media, atau sekadar berdiskusi seputar inovasi IT &amp; website.
                    </p>
                    
                    <div class="pt-6 border-t border-neutral-200 space-y-4 font-mono text-xs">
                        <div class="flex items-center gap-3">
                            <i data-lucide="mail" class="w-5 h-5 text-red-600"></i>
                            <div>
                                <span class="text-[9px] text-neutral-400 block">ALAMAT EMAIL</span>
                                <a href="mailto:wahyudahlawi@gmail.com" class="font-bold text-neutral-900 hover:underline">muhammadwahyudahlawi@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="instagram" class="w-5 h-5 text-red-600"></i>
                            <div>
                                <span class="text-[9px] text-neutral-400 block">INSTAGRAM</span>
                                <a href="https://instagram.com/wahyu.dhl" target="_blank" class="font-bold text-neutral-900 hover:underline">@wahyu.dhl</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="bg-yellow-50 p-6 sm:p-8 border-2 border-black card-shadow relative">
                        <div x-show="formSubmitted" x-transition class="absolute inset-0 bg-white border border-black flex flex-col items-center justify-center text-center p-6 z-20">
                            <div class="w-12 h-12 rounded-full bg-[#E4FF1A] border-2 border-black flex items-center justify-center mb-4">
                                <i data-lucide="check" class="w-6 h-6 text-black"></i>
                            </div>
                            <h3 class="font-marker text-xl uppercase mb-1">Pesan Terkirim!</h3>
                            <p class="font-mono text-xs text-neutral-600 max-w-xs">
                                Terima kasih, pesan Anda telah berhasil dikirim langsung ke email Wahyu Dahlawi. Wahyu akan segera menghubungi Anda balik.
                            </p>
                            <button @click="formSubmitted = false" class="mt-4 px-4 py-2 bg-black text-white font-mono text-xs uppercase border-2 border-black font-bold">
                                Tulis Pesan Baru
                            </button>
                        </div>


                        <form action="https://api.web3forms.com/submit" method="POST" @submit.prevent="
                            fetch('https://api.web3forms.com/submit', {
                                method: 'POST',
                                body: new FormData($el)
                            })
                            .then(response => {
                                if(response.ok) {
                                    formSubmitted = true;
                                }
                            });
                        " class="space-y-4 font-mono text-xs">
                            

                            <input type="hidden" name="access_key" value="da772186-09e8-4687-b9f1-a1e4695029b3">
                            <input type="hidden" name="subject" value="Pesan Baru dari Artsy Portofolio Wahyu">
                            <input type="checkbox" name="botcheck" id="" style="display: none;">

                            <div>
                                <label class="block font-bold text-neutral-800 uppercase tracking-wide mb-1">[ NAMA LENGKAP ]</label>
                                <input type="text" name="name" required placeholder="Tuliskan nama lengkap Anda..." class="w-full bg-white border-2 border-black rounded p-3 focus:outline-none focus:bg-yellow-100 text-black font-bold transition-all">
                            </div>
                            <div>
                                <label class="block font-bold text-neutral-800 uppercase tracking-wide mb-1">[ ALAMAT EMAIL ]</label>
                                <input type="email" name="email" required placeholder="Tuliskan alamat email aktif..." class="w-full bg-white border-2 border-black rounded p-3 focus:outline-none focus:bg-yellow-100 text-black font-bold transition-all">
                            </div>
                            <div>
                                <label class="block font-bold text-neutral-800 uppercase tracking-wide mb-1">[ IDE PROYEK ATAU PESAN ]</label>
                                <textarea name="message" rows="4" required placeholder="Ketik deskripsi singkat tentang kolaborasi Anda di sini..." class="w-full bg-white border-2 border-black rounded p-3 focus:outline-none focus:bg-yellow-100 text-black font-bold transition-all resize-none"></textarea>
                            </div>
                            <button type="submit" class="w-full py-3 bg-red-500 hover:bg-black hover:text-white text-white font-marker text-sm uppercase border-2 border-black card-shadow transition-all">
                                KIRIM DISKUSI →
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="max-w-7xl mx-auto px-6 pt-8 border-t-2 border-dashed border-white/20">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-mono text-white/50">
            <div class="flex items-center gap-2">
                <span class="font-marker text-lg text-[#E4FF1A]">WAHY.URL!</span>
                <span>/ CREATIVE BOARD © {{ date('Y') }}</span>
            </div>
            <div class="uppercase tracking-widest text-[10px]">
                UNIVERSITAS MALIKUSSALEH — TEKNIK INFORMATIKA
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener('alpine:init', () => {
            let projectsData = [];
            let languagesData = [];

            // Membaca data dari elemen kontainer HTML secara aman
            const store = document.getElementById('laravel-data-store');
            
            // Mengambil attribute mentah dari DOM
            let rawProjects = store ? store.getAttribute('data-projects') : '';
            let rawLanguages = store ? store.getAttribute('data-languages') : '';

            // Lakukan pengecekan ketat apakah data projects berisi sintaks Blade Laravel atau data JSON nyata
           // Lakukan pengecekan ketat apakah data projects berisi sintaks Blade Laravel atau data JSON nyata
            if (rawProjects && rawProjects.trim() !== '') {
                // Jika data mengandung PHP Blade Tags (berarti belum diproses Laravel), lewati parser JSON
                if (!rawProjects.includes("<?php")) {
                    try {
                        projectsData = JSON.parse(rawProjects);
                    } catch (e) {
                        console.warn("Gagal mem-parsing projects JSON dari Laravel.");
                    }
                }
            }
            

            // Lakukan pengecekan ketat untuk languages
           if (rawLanguages && rawLanguages.trim() !== '') {
    if (!rawLanguages.includes("<?php")) {
                        languagesData = JSON.parse(rawLanguages);
                    } catch (e) {
                        console.warn("Gagal mem-parsing languages JSON dari Laravel.");
                    }
                }
            }
         
            if (projectsData.length === 0) {
                projectsData = [
                    {
                        id: 1,
                        num: '01',
                        category: 'design',
                        company: 'CV. Ruang Karya Merdeka',
                        title: 'Visual Identity & Feed System',
                        desc: 'Mendesain layout feed sosial media berestetika tinggi yang disesuaikan khusus untuk meningkatkan citra & interaksi klien.',
                        platform: 'Canva & Photoshop',
                        color: 'bg-[#FFEB3B] text-black',
                        tapeColor: 'bg-red-400/40',
                        rotation: 'rotate-1',
                        image: 'public/build/assets/1. Ruang Sarjana.png',
                        video: null
                    },
                    {
                        id: 2,
                        num: '02',
                        category: 'video',
                        company: 'UKM KSM CREATIVE MINORITY UNIVERSITAS MALIKUSSALEH',
                        title: 'Cinematic Vertical Profile Organization',
                        desc: 'Mengedit kumpulan video yang ditayangkan pada PKKMB 2025, serta memberikan transisi dinamis, serta color grading yang kaya akan visual dramatis.',
                        platform: 'Capcut pro & Canva',
                        color: 'bg-[#FF5722] text-white',
                        tapeColor: 'bg-yellow-400/40',
                        rotation: '-rotate-2',
                        image: null,
                        video: 'assets/RECAPS(1).mp4'
                    },
                    {
                        id: 3,
                        num: '03',
                        category: 'branding',
                        company: 'Cendikia Foundation',
                        title: 'Social Media Officer Campaign',
                        desc: 'Penyusunan pilar konten edukatif mingguan, infografis kreatif, serta taktik branding visual untuk menjangkau audiens muda nasional.',
                        platform: 'Canva & CapCut',
                        color: 'bg-[#00E676] text-black',
                        tapeColor: 'bg-blue-400/40',
                        rotation: 'rotate-2',
                        image: 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?auto=format&fit=crop&w=800&q=80',
                        video: null
                    },
                    {
                        id: 4,
                        num: '04',
                        category: 'video',
                        company: 'OSPMMU',
                        title: '6-Year Pesantren Documentary',
                        desc: 'Penyuntingan video dokumenter emosional berdurasi pendek yang merekam jejak perjalanan pendidikan alumni di Pesantren Modern Misbahul Ulum.',
                        platform: 'Capcut pro & Canva',
                        color: 'bg-[#E040FB] text-white',
                        tapeColor: 'bg-green-400/40',
                        rotation: '-rotate-1',
                        image: 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=800&q=80',
                        video: null
                    },
                    {
                        id: 5,
                        num: '05',
                        category: 'design',
                        company: 'UKM Creative Minority',
                        title: 'UNIMAL Sci-Tech Visual Assets',
                        desc: 'Pembuatan poster publikasi ilmiah, desain sertifikat, dan perlengkapan pameran teknologi sains di Universitas Malikussaleh.',
                        platform: 'Photoshop',
                        color: 'bg-[#00B0FF] text-black',
                        tapeColor: 'bg-pink-400/40',
                        rotation: 'rotate-3',
                        image: 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=800&q=80',
                        video: null
                    }
                ];
            }

            if (languagesData.length === 0) {
                languagesData = [
                    {name: 'Arabic (العربية)', level: 'INTERMEDIATE', percentage: 75, color: 'bg-red-500'},
                    {name: 'English', level: 'BEGINNER', percentage: 40, color: 'bg-black'}
                ];
            }

            Alpine.data('portfolioData', () => ({
                mobileMenuOpen: false,
                activeTab: 'all',
                selectedProject: null,
                activeSlide: 0,
                projects: projectsData,
                languages: languagesData,
                formSubmitted: false
            }));
        });
    </script>


    <script>
        lucide.createIcons();

        const revealElements = document.querySelectorAll('.reveal');
        const checkReveal = () => {
            const triggerBottom = window.innerHeight / 5 * 4.4;
            revealElements.forEach(el => {
                const boxTop = el.getBoundingClientRect().top;
                if (boxTop < triggerBottom) {
                    el.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', checkReveal);
        window.addEventListener('load', checkReveal);
        checkReveal();
    </script>
</body>
</html>