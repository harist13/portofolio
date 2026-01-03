<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio Pribadi | Muhammad Harist Illyasa</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/poy.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/poy.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/poy.jpg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        h1, h2, h3, h4, .font-heading { 
            font-family: 'Outfit', sans-serif; 
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #fbbf24; }

        /* Glassmorphism */
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Animated Blob */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
    </style>
</head>
<body class="bg-slate-950 text-slate-300 antialiased selection:bg-yellow-500/30 selection:text-yellow-400 overflow-x-hidden" x-data="{ mobileMenu: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Background Gradients -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-0 -left-4 w-96 h-96 bg-blue-500/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-96 h-96 bg-yellow-500/10 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-pink-500/10 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Navigation -->
    <header :class="scrolled ? 'glass shadow-lg py-3' : 'bg-transparent py-5'" class="fixed w-full top-0 z-50 transition-all duration-300 border-b border-transparent" :class="scrolled ? 'border-slate-800' : ''">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold font-heading tracking-tight text-white group flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center text-slate-900 text-lg font-bold">P</span>
                Porto<span class="text-yellow-400 group-hover:text-white transition-colors">folio.</span>
            </a>
            
            <!-- Desktop Menu -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    @foreach(['home' => 'Beranda', 'about' => 'Tentang', 'skills' => 'Keahlian', 'portfolio' => 'Karya', 'contact' => 'Kontak'] as $id => $label)
                    <li>
                        <a href="#{{ $id }}" class="text-slate-400 hover:text-yellow-400 font-medium text-sm transition-all duration-300 relative group py-2">
                            {{ $label }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full opacity-0 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>

            <!-- CTA Button -->
            <a href="#contact" class="hidden md:inline-flex px-5 py-2.5 rounded-full bg-slate-800 hover:bg-slate-700 text-white font-medium text-sm transition-all border border-slate-700 hover:border-yellow-500/50 group items-center gap-2">
                Let's Talk <i class="fas fa-arrow-right text-yellow-400 group-hover:translate-x-1 transition-transform"></i>
            </a>

            <!-- Mobile Hamburger -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden text-white text-2xl focus:outline-none w-10 h-10 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                <i class="fas" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden absolute w-full glass border-b border-slate-800 shadow-xl">
            <ul class="flex flex-col p-4 space-y-2">
                @foreach(['home' => 'Beranda', 'about' => 'Tentang', 'skills' => 'Keahlian', 'portfolio' => 'Portofolio', 'contact' => 'Kontak'] as $id => $label)
                <li>
                    <a href="#{{ $id }}" @click="mobileMenu = false" class="block px-4 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5 transition-all">{{ $label }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 min-h-screen flex items-center">
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12 lg:gap-20">
                <div class="lg:w-1/2 text-center lg:text-left space-y-8" data-aos="fade-up">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 text-xs font-semibold tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                        Available for work
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight font-heading">
                        Hi, I'm <br class="hidden lg:block"/>
                        <span class="text-gradient">Harist Illyasa</span>
                    </h1>
                    
                    <div class="text-xl md:text-2xl text-slate-400 h-8" x-data="{ 
                        text: '', 
                        words: ['Full-Stack Developer.', 'Laravel Specialist.', 'UI/UX Enthusiast.'],
                        wordIndex: 0,
                        charIndex: 0,
                        isDeleting: false,
                        type() {
                            const currentWord = this.words[this.wordIndex];
                            if (this.isDeleting) {
                                this.text = currentWord.substring(0, this.charIndex - 1);
                                this.charIndex--;
                            } else {
                                this.text = currentWord.substring(0, this.charIndex + 1);
                                this.charIndex++;
                            }
                            
                            if (!this.isDeleting && this.charIndex === currentWord.length) {
                                this.isDeleting = true;
                                setTimeout(() => this.type(), 2000);
                            } else if (this.isDeleting && this.charIndex === 0) {
                                this.isDeleting = false;
                                this.wordIndex = (this.wordIndex + 1) % this.words.length;
                                setTimeout(() => this.type(), 500);
                            } else {
                                setTimeout(() => this.type(), this.isDeleting ? 50 : 100);
                            }
                        }
                    }" x-init="type()">
                        I <span class="text-white border-r-2 border-yellow-400 pr-1" x-text="text"></span>
                    </div>
                    
                    <p class="text-lg text-slate-400 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                        Membangun solusi digital yang efisien, modern, dan scalable dengan fokus pada pengalaman pengguna yang luar biasa.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                        <a href="#portfolio" class="px-8 py-4 bg-yellow-500 text-slate-900 font-bold rounded-xl shadow-lg shadow-yellow-500/20 hover:bg-yellow-400 hover:-translate-y-1 transition-all duration-300">
                            Lihat Karya Saya
                        </a>
                        <a href="#contact" class="px-8 py-4 bg-slate-800 text-white font-semibold rounded-xl hover:bg-slate-700 transition-all duration-300 border border-slate-700">
                            Hubungi Saya
                        </a>
                    </div>
                    
                    <div class="pt-8 flex items-center justify-center lg:justify-start gap-6 text-2xl text-slate-500">
                        <a href="https://github.com/harist13" target="_blank" class="hover:text-white hover:-translate-y-1 transition-all"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/muhammad-harist-illyasa-964719220/" target="_blank" class="hover:text-blue-400 hover:-translate-y-1 transition-all"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/haristllys_/" target="_blank" class="hover:text-pink-500 hover:-translate-y-1 transition-all"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="lg:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative group">
                        <!-- Decorative Frame -->
                        <div class="absolute -inset-4 bg-gradient-to-r from-yellow-500 to-purple-600 rounded-[2rem] opacity-30 blur-xl group-hover:opacity-50 transition duration-1000"></div>
                        
                        <div class="relative rounded-[2rem] bg-slate-900 p-2 ring-1 ring-white/10">
                            <img src="{{ asset('assets/poy.jpg') }}" alt="Profile" 
                                 class="relative w-72 h-72 lg:w-96 lg:h-96 object-cover rounded-[1.8rem] shadow-2xl transition-transform duration-500 group-hover:scale-[1.01]">
                        </div>

                        <!-- Stats Card -->
                        <div class="absolute -bottom-6 -left-6 bg-slate-800/90 backdrop-blur border border-slate-700 p-4 rounded-2xl shadow-xl z-20 hidden md:flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                            <div class="bg-yellow-500/20 p-3 rounded-xl text-yellow-400">
                                <i class="fas fa-code text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Experience</p>
                                <p class="font-bold text-white text-lg">Full-Stack Dev</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce hidden lg:block">
            <a href="#about" class="text-slate-500 hover:text-yellow-400 transition-colors">
                <i class="fas fa-chevron-down text-xl"></i>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-slate-900/50 relative">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold text-white font-heading">
                        Tentang <span class="text-gradient">Saya</span>
                    </h2>
                    <div class="space-y-4 text-slate-400 leading-relaxed text-lg">
                        <p>
                            Saya adalah seorang <strong class="text-white">Web Developer</strong> dengan passion tinggi dalam menciptakan aplikasi web yang fungsional dan estetis. Lulusan Sistem Informasi Universitas Mulawarman dengan IPK <strong class="text-yellow-400">3.86</strong>.
                        </p>
                        <p>
                            Spesialisasi saya meliputi pengembangan <strong class="text-white">Full-Stack</strong> menggunakan Laravel, Tailwind CSS, dan React. Saya percaya bahwa kode yang baik harus bersih, efisien, dan mudah dipelihara.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 pt-4">
                        <div class="glass-card p-6 rounded-2xl">
                            <h4 class="font-bold text-3xl text-yellow-400 mb-2">3.86</h4>
                            <p class="text-sm text-slate-500 font-medium uppercase tracking-wider">IPK Cumlaude</p>
                        </div>
                        <div class="glass-card p-6 rounded-2xl">
                            <h4 class="font-bold text-3xl text-yellow-400 mb-2">10+</h4>
                            <p class="text-sm text-slate-500 font-medium uppercase tracking-wider">Proyek Selesai</p>
                        </div>
                    </div>
                </div>

                <div id="skills" class="space-y-8" data-aos="fade-left">
                    <h3 class="text-2xl font-bold text-white font-heading mb-6">Tech Stack & Tools</h3>
                    
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-4">
                        @php
                            $skills = [
                                ['name' => 'HTML5', 'icon' => 'fa-html5', 'color' => 'text-orange-500'],
                                ['name' => 'CSS3', 'icon' => 'fa-css3-alt', 'color' => 'text-blue-500'],
                                ['name' => 'JavaScript', 'icon' => 'fa-js', 'color' => 'text-yellow-400'],
                                ['name' => 'PHP', 'icon' => 'fa-php', 'color' => 'text-indigo-400'],
                                ['name' => 'Laravel', 'icon' => 'fa-laravel', 'color' => 'text-red-500'],
                                ['name' => 'Tailwind', 'icon' => 'fa-wind', 'color' => 'text-cyan-400'],
                                ['name' => 'React', 'icon' => 'fa-react', 'color' => 'text-cyan-500'],
                                ['name' => 'MySQL', 'icon' => 'fa-database', 'color' => 'text-blue-400'],
                                ['name' => 'Git', 'icon' => 'fa-git-alt', 'color' => 'text-orange-600'],
                                ['name' => 'NodeJS', 'icon' => 'fa-node-js', 'color' => 'text-green-500'],
                            ];
                        @endphp
                        @foreach($skills as $skill)
                        <div class="glass-card p-4 rounded-2xl flex flex-col items-center justify-center gap-3 group hover:bg-slate-800 transition-all duration-300 hover:-translate-y-2 border border-slate-800 hover:border-slate-600">
                            <i class="fab {{ $skill['icon'] }} text-3xl {{ $skill['color'] }} group-hover:scale-110 transition-transform"></i>
                            <span class="text-xs font-medium text-slate-400 group-hover:text-white">{{ $skill['name'] }}</span>
                        </div>
                        @endforeach
                        
                        <!-- Extra Soft Skill Badge -->
                        <div class="col-span-2 glass-card p-4 rounded-2xl flex items-center justify-center text-center gap-2 group hover:bg-slate-800 transition-all hover:border-slate-600">
                            <i class="fas fa-brain text-purple-400"></i>
                            <span class="text-xs font-medium text-slate-400">Problem Solving</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Education -->
    <section class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-white font-heading">Perjalanan <span class="text-gradient">Karir</span></h2>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 lg:gap-20">
                <!-- Education -->
                <div data-aos="fade-right">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-8 h-8 rounded bg-blue-500/20 text-blue-400 flex items-center justify-center text-sm"><i class="fas fa-graduation-cap"></i></span>
                        Pendidikan
                    </h3>
                    <div class="space-y-8 pl-4 border-l-2 border-slate-800 ml-3">
                        <div class="relative pl-8 group">
                            <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-slate-900 border-2 border-blue-500 group-hover:bg-blue-500 transition-colors"></span>
                            <div class="bg-slate-900/50 p-6 rounded-2xl border border-slate-800 hover:border-slate-700 transition-all">
                                <span class="text-xs font-bold text-blue-400 mb-2 block">2021 - 2025</span>
                                <h4 class="text-lg font-bold text-white">S1 Sistem Informasi</h4>
                                <p class="text-sm text-slate-400 mt-1">Universitas Mulawarman</p>
                                <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                                    Lulus dengan predikat Pujian (Cumlaude). Fokus skripsi pada pengembangan sistem informasi berbasis web.
                                </p>
                            </div>
                        </div>
                        <div class="relative pl-8 group">
                            <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-slate-900 border-2 border-slate-600 group-hover:bg-slate-600 transition-colors"></span>
                            <div class="bg-slate-900/50 p-6 rounded-2xl border border-slate-800 hover:border-slate-700 transition-all">
                                <span class="text-xs font-bold text-slate-500 mb-2 block">2018 - 2021</span>
                                <h4 class="text-lg font-bold text-white">Rekayasa Perangkat Lunak</h4>
                                <p class="text-sm text-slate-400 mt-1">SMK Negeri 2 Balikpapan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience -->
                <div data-aos="fade-left">
                    <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                        <span class="w-8 h-8 rounded bg-yellow-500/20 text-yellow-400 flex items-center justify-center text-sm"><i class="fas fa-briefcase"></i></span>
                        Pengalaman Kerja
                    </h3>
                    <div class="space-y-8 pl-4 border-l-2 border-slate-800 ml-3">
                        <div class="relative pl-8 group">
                            <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-slate-900 border-2 border-yellow-500 group-hover:bg-yellow-500 transition-colors"></span>
                            <div class="bg-slate-900/50 p-6 rounded-2xl border border-slate-800 hover:border-slate-700 transition-all shadow-lg shadow-yellow-500/5">
                                <span class="text-xs font-bold text-yellow-400 mb-2 block">Sep - Des 2024</span>
                                <h4 class="text-lg font-bold text-white">FreeLance Full-Stack Web Developer</h4>
                                <p class="text-sm text-slate-400 mt-1">Client: Badan Kesatuan Bangsa Dan Politik Kalimantan Timur</p>
                                <ul class="list-disc list-inside text-slate-500 text-sm mt-3 space-y-1">
                                    <li>Membuat website SIPPDEH atau Sistem Informasi Pemantauan Politik dan Daerah.</li>
                                    <li>Sistem ini meliputi manajemen data operator, kabupaten, kota, kecamatan,
kelurahan, tps, paslon serta manajemen penginputan suara paslon.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="relative pl-8 group">
                            <span class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-slate-900 border-2 border-slate-600 group-hover:bg-slate-600 transition-colors"></span>
                            <div class="bg-slate-900/50 p-6 rounded-2xl border border-slate-800 hover:border-slate-700 transition-all">
                                <span class="text-xs font-bold text-slate-500 mb-2 block">Jul - Okt 2024</span>
                                <h4 class="text-lg font-bold text-white">Asisten Laboratorium</h4>
                                <p class="text-sm text-slate-400 mt-1">Universitas Mulawarman</p>
                                <p class="text-slate-500 text-sm mt-3 leading-relaxed">
                                    Mentor bagi mahasiswa dalam mata kuliah Pemrograman Framework Laravel.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-24 bg-slate-900/30" x-data="{ 
        activeModal: null, 
        projects: [
             @forelse($proyek as $project)
            {
                id: {{ $project->id }},
                title: '{{ addslashes($project->nama) }}',
                desc: `{{ $project->deskripsi }}`,
                tech: '{{ $project->tech }}',
                img: '{{ asset($project->gambar) }}',
                link: '{{ $project->link }}'
            },
            @empty
            {
                id: 1,
                title: 'E-Commerce Platform',
                desc: 'Platform belanja online modern dengan fitur lengkap.',
                tech: 'Laravel, MySQL, Tailwind',
                img: 'https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=1674&q=80',
                link: '#'
            },
            {
                id: 2,
                title: 'CMS Dashboard',
                desc: 'Dashboard admin untuk manajemen konten yang intuitif.',
                tech: 'React, Node.js',
                img: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1740&q=80',
                link: '#'
            },
            {
                id: 3,
                title: 'Finance App',
                desc: 'Aplikasi pencatatan keuangan pribadi.',
                tech: 'Vue.js, Firebase',
                img: 'https://images.unsplash.com/photo-1554224155-984067941b71?auto=format&fit=crop&w=1740&q=80',
                link: '#'
            }
            @endforelse
        ]
    }">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6" data-aos="fade-up">
                <div>
                    <span class="text-yellow-400 font-bold tracking-widest text-xs uppercase mb-2 block">Karya & Projek</span>
                    <h2 class="text-3xl md:text-5xl font-bold text-white font-heading">Portofolio <span class="text-slate-700">Terbaru</span></h2>
                </div>
                <div class="flex flex-col sm:flex-row items-end gap-4">
                    <p class="text-slate-400 max-w-sm text-sm">
                        Beberapa proyek pilihan yang telah saya kerjakan dengan dedikasi tinggi dan teknologi terkini.
                    </p>
                    <a href="{{ route('portfolio.export-pdf') }}" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl shadow-lg shadow-red-500/20 hover:from-red-600 hover:to-red-700 hover:-translate-y-1 transition-all duration-300 whitespace-nowrap group">
                        <i class="fas fa-file-pdf text-lg group-hover:scale-110 transition-transform"></i>
                        <span>Export PDF</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="(project, index) in projects" :key="project.id">
                    <div class="group relative rounded-2xl overflow-hidden bg-slate-800 border border-slate-700 shadow-xl cursor-pointer"
                         :data-aos="'fade-up'" :data-aos-delay="index * 100"
                         @click="activeModal = project">
                        
                        <!-- Image -->
                        <div class="aspect-[4/3] overflow-hidden">
                            <img :src="project.img" :alt="project.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                        </div>
                        
                        <!-- Overlay Content -->
                        <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-slate-900 via-slate-900/90 to-transparent translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-bold text-white mb-1" x-text="project.title"></h3>
                            <div class="flex flex-wrap gap-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                                <template x-for="tech in project.tech.split(',').slice(0,3)">
                                    <span class="text-[10px] px-2 py-1 bg-yellow-500/20 text-yellow-400 rounded-full border border-yellow-500/20" x-text="tech.trim()"></span>
                                </template>
                            </div>
                        </div>

                        <!-- Hover Icon -->
                        <div class="absolute top-4 right-4 w-10 h-10 bg-white/10 backdrop-blur rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-[-10px] group-hover:translate-y-0">
                            <i class="fas fa-arrow-up-right text-sm"></i>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Project Modal -->
        <div x-show="activeModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
            
            <div class="bg-slate-900 rounded-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-700 relative flex flex-col md:flex-row overflow-hidden"
                 @click.away="activeModal = null"
                 x-transition:enter="transition cubic-bezier(0.34, 1.56, 0.64, 1) duration-500"
                 x-transition:enter-start="opacity-0 scale-90 translate-y-8"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                <button @click="activeModal = null" class="absolute top-4 right-4 z-20 w-10 h-10 bg-black/50 hover:bg-black/70 rounded-full flex items-center justify-center transition-colors text-white">
                    <i class="fas fa-times"></i>
                </button>

                <!-- Image Side -->
                <div class="md:w-3/5 bg-black flex items-center justify-center p-4">
                    <img :src="activeModal?.img" :alt="activeModal?.title" class="max-h-[60vh] md:max-h-full object-contain rounded-lg shadow-lg">
                </div>
                
                <!-- Content Side -->
                <div class="md:w-2/5 p-8 flex flex-col">
                    <h3 class="text-3xl font-bold text-white mb-2 leading-tight" x-text="activeModal?.title"></h3>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <template x-if="activeModal">
                            <template x-for="tech in activeModal.tech.split(',')">
                                <span class="px-3 py-1 bg-slate-800 text-slate-300 text-xs font-medium rounded-full border border-slate-700" x-text="tech.trim()"></span>
                            </template>
                        </template>
                    </div>

                    <div class="prose prose-invert prose-sm text-slate-400 leading-relaxed mb-auto overflow-y-auto max-h-60 pr-2 custom-scroll"
                         x-html="activeModal?.desc">
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-800 flex gap-4">
                        <template x-if="activeModal?.link">
                            <a :href="activeModal.link" target="_blank" class="flex-1 text-center px-6 py-3 bg-yellow-500 text-slate-900 font-bold rounded-xl hover:bg-yellow-400 transition-all shadow-lg hover:shadow-yellow-500/20">
                                <i class="fas fa-external-link-alt mr-2"></i> Live Demo
                            </a>
                        </template>
                        <button @click="activeModal = null" class="px-6 py-3 border border-slate-700 text-slate-300 font-bold rounded-xl hover:bg-slate-800 transition-all">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute inset-0 z-[-1] bg-gradient-to-t from-slate-900/50 to-transparent"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto glass p-8 md:p-12 rounded-3xl border border-slate-700/50 shadow-2xl" data-aos="zoom-in-up">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-white font-heading">Mari Berkolaborasi</h2>
                    <p class="text-slate-400 mt-4">Punya ide proyek menarik atau ingin berdiskusi? Kirimkan pesan Anda.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-10">
                    <!-- Contact Info -->
                    <div class="space-y-6 md:col-span-1 border-r border-slate-700/50 pr-0 md:pr-10">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-yellow-500">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold">Email</p>
                                <a href="mailto:haristillyasa13@gmail.com" class="text-white text-sm hover:text-yellow-400 transition-colors">haristillyasa13@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-yellow-500">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase font-bold">WhatsApp</p>
                                <p class="text-white text-sm">0895-7001-71927</p>
                            </div>
                        </div>
                        <div class="pt-6">
                            <p class="text-xs text-slate-500 uppercase font-bold mb-3">Socials</p>
                            <div class="flex gap-3">
                                <a href="https://github.com/harist13" class="w-9 h-9 rounded bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-white hover:text-black transition-all"><i class="fab fa-github"></i></a>
                                <a href="https://www.linkedin.com/in/muhammad-harist-illyasa-964719220/" class="w-9 h-9 rounded bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-linkedin"></i></a>
                                <a href="https://www.instagram.com/haristllys_/" class="w-9 h-9 rounded bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-pink-600 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <form action="#" class="md:col-span-2 space-y-4" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda (Demo) telah terkirim.');">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-500 uppercase ml-1">Nama</label>
                                <input type="text" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all placeholder-slate-600" placeholder="John Doe">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-500 uppercase ml-1">Email</label>
                                <input type="email" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all placeholder-slate-600" placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase ml-1">Pesan</label>
                            <textarea rows="4" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all placeholder-slate-600" placeholder="Ceritakan tentang proyek Anda..."></textarea>
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-yellow-500 to-yellow-600 text-slate-900 font-bold rounded-xl shadow-lg hover:shadow-yellow-500/20 hover:scale-[1.01] transition-all duration-300">
                            Kirim Pesan <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 py-8 text-center text-slate-600 border-t border-slate-900">
        <div class="container mx-auto px-6">
            <p>&copy; 2024 Muhammad Harist Illyasa. All Rights Reserved.</p>
            <p class="text-xs mt-2">Built with <span class="text-red-500">❤</span> using Laravel & Tailwind</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            easing: 'ease-out-cubic'
        });
    </script>
</body>
</html>
