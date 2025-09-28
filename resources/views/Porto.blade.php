<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Portofolio Pribadi | Muhammad Harist Illyasa</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
			rel="stylesheet"
		/>
		<style>
			:root {
				--primary: #1a2b3c;
				--secondary: #f0b90b;
				--accent: #2c3e50;
				--light: #ffffff;
				--dark: #0d1520;
				--gray: #f5f7fa;
				--transition: all 0.3s ease;
			}

			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				font-family: "Poppins", sans-serif;
				line-height: 1.6;
				color: var(--dark);
				background-color: var(--light);
				overflow-x: hidden;
			}

			h1,
			h2,
			h3,
			h4 {
				font-family: "Playfair Display", serif;
				font-weight: 700;
				margin-bottom: 1rem;
				color: var(--primary);
			}

			h1 {
				font-size: 3.5rem;
				line-height: 1.2;
			}

			h2 {
				font-size: 2.5rem;
				position: relative;
				display: inline-block;
				margin-bottom: 2.5rem;
			}

			h2::after {
				content: "";
				position: absolute;
				bottom: -10px;
				left: 0;
				width: 60%;
				height: 4px;
				background: var(--secondary);
				border-radius: 2px;
			}

			p {
				margin-bottom: 1.5rem;
			}

			a {
				text-decoration: none;
				color: inherit;
				transition: var(--transition);
			}

			.container {
				width: 90%;
				max-width: 1200px;
				margin: 0 auto;
				padding: 0 20px;
			}

			.btn {
				display: inline-block;
				padding: 12px 30px;
				border-radius: 30px;
				font-weight: 600;
				text-transform: uppercase;
				letter-spacing: 1px;
				transition: var(--transition);
				cursor: pointer;
				border: none;
				font-size: 0.9rem;
			}

			.btn-primary {
				background: var(--secondary);
				color: var(--primary);
				box-shadow: 0 4px 15px rgba(240, 185, 11, 0.3);
			}

			.btn-primary:hover {
				transform: translateY(-3px);
				box-shadow: 0 6px 20px rgba(240, 185, 11, 0.4);
			}

			.btn-outline {
				background: transparent;
				border: 2px solid var(--secondary);
				color: var(--secondary);
				margin-left: 15px;
			}

			.btn-outline:hover {
				background: var(--secondary);
				color: var(--primary);
			}

			section {
				padding: 100px 0;
			}

			/* Modal Styling */
			.modal {
				display: none;
				position: fixed;
				z-index: 2000;
				padding-top: 60px;
				left: 0; top: 0;
				width: 100%; height: 100%;
				background-color: rgba(0,0,0,0.7);
				overflow: auto;
				animation: fadeIn 0.3s ease-in-out;
			}

			.modal-content {
				background: var(--light);
				margin: auto;
				padding: 20px;
				border-radius: 10px;
				max-width: 600px;
				position: relative;
				text-align: center;
				animation: zoomIn 0.3s ease;
			}

			.modal-content img {
				width: 100%;
				border-radius: 10px;
				margin-bottom: 15px;
			}

			.close {
				position: absolute;
				top: 15px;
				right: 20px;
				font-size: 1.5rem;
				color: #333;
				cursor: pointer;
			}

			@keyframes fadeIn {
				from {opacity: 0;} to {opacity: 1;}
			}

			@keyframes zoomIn {
				from {transform: scale(0.8);} to {transform: scale(1);}
			}


			.text-center {
				text-align: center;
			}

			/* Header & Navigation */
			header {
				background: rgba(26, 43, 60, 0.95);
				padding: 20px 0;
				position: sticky;
				top: 0;
				z-index: 1000;
				box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			}

			.header-container {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.logo {
				font-size: 1.8rem;
				font-weight: 700;
				color: var(--light);
			}

			.logo span {
				color: var(--secondary);
			}

			nav ul {
				display: flex;
				list-style: none;
			}

			nav ul li {
				margin-left: 30px;
			}

			nav ul li a {
				color: var(--light);
				font-weight: 500;
				position: relative;
				padding: 5px 0;
			}

			nav ul li a::after {
				content: "";
				position: absolute;
				bottom: 0;
				left: 0;
				width: 0;
				height: 2px;
				background: var(--secondary);
				transition: var(--transition);
			}

			nav ul li a:hover::after {
				width: 100%;
			}

			nav ul li a:hover {
				color: var(--secondary);
			}

			.hamburger {
				display: none;
				cursor: pointer;
				background: transparent;
				border: none;
				color: var(--light);
				font-size: 1.5rem;
			}

			/* Hero Section */
			.hero {
				background: linear-gradient(
					135deg,
					var(--primary) 0%,
					var(--dark) 100%
				);
				color: var(--light);
				padding: 150px 0 100px;
				position: relative;
				overflow: hidden;
			}

			.hero::before {
				content: "";
				position: absolute;
				top: -50px;
				right: -50px;
				width: 300px;
				height: 300px;
				border-radius: 50%;
				background: rgba(240, 185, 11, 0.1);
			}

			.hero-content {
				display: flex;
				align-items: center;
				justify-content: space-between;
			}

			.hero-text {
				flex: 1;
				padding-right: 50px;
				z-index: 2;
			}

			.hero-text h1 {
				color: var(--light);
				margin-bottom: 20px;
			}

			.hero-text h1 span {
				color: var(--secondary);
			}

			.hero-text p {
				font-size: 1.2rem;
				margin-bottom: 30px;
				opacity: 0.9;
			}

			.hero-image {
				flex: 1;
				display: flex;
				justify-content: center;
				z-index: 2;
			}

			.profile-img {
				width: 350px;
				height: 350px;
				border-radius: 50%;
				border: 5px solid var(--secondary);
				object-fit: cover;
				box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
				transition: var(--transition);
			}

			.profile-img:hover {
				transform: scale(1.03);
			}

			/* About Section */
			.about {
				background: var(--gray);
			}

			.about-content {
				display: flex;
				align-items: center;
				gap: 50px;
			}

			.about-text {
				flex: 1;
			}

			.about-text h2::after {
				width: 40%;
			}

			.about-text p {
				font-size: 1.1rem;
				margin-bottom: 20px;
			}

			.skills {
				display: flex;
				flex-wrap: wrap;
				margin-top: 20px;
			}

			.skill {
				background: var(--light);
				padding: 8px 20px;
				margin: 5px 10px 5px 0;
				border-radius: 30px;
				font-size: 0.9rem;
				box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
				transition: var(--transition);
			}

			.skill:hover {
				background: var(--secondary);
				color: var(--primary);
				transform: translateY(-3px);
			}

			/* Portfolio Section */
			.portfolio {
				background: var(--light);
				padding-top: 50px; /* Kurangi padding top */
			}

			.portfolio-header {
				text-align: center;
				margin-bottom: 50px;
			}

			.portfolio-header h2::after {
				left: 50%;
				transform: translateX(-50%);
			}

			.portfolio-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
				gap: 30px;
			}

			.portfolio-card {
				background: var(--light);
				border-radius: 10px;
				overflow: hidden;
				box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
				transition: var(--transition);
				position: relative;
			}

			.portfolio-card:hover {
				transform: translateY(-10px);
				box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
			}

			.portfolio-img {
				width: 100%;
				height: 250px;
				object-fit: cover;
				display: block;
			}

			.portfolio-content {
				padding: 20px;
				height: 140px; /* Fixed height untuk konsistensi */
				display: flex;
				flex-direction: column;
				justify-content: space-between;
			}

			.portfolio-content h3 {
				font-size: 1.3rem;
				margin-bottom: 8px;
				line-height: 1.3;
				overflow: hidden;
				text-overflow: ellipsis;
				white-space: nowrap;
			}

			.portfolio-content p {
				color: #666;
				margin-bottom: 0;
				font-size: 0.9rem;
				line-height: 1.4;
				overflow: hidden;
				display: -webkit-box;
				-webkit-line-clamp: 3; /* Batasi maksimal 3 baris */
				-webkit-box-orient: vertical;
				text-overflow: ellipsis;
				flex-grow: 1;
			}

			.portfolio-overlay {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(26, 43, 60, 0.95);
				color: var(--light);
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				padding: 25px;
				opacity: 0;
				transition: var(--transition);
			}

			.portfolio-card:hover .portfolio-overlay {
				opacity: 1;
			}

			.portfolio-overlay h3 {
				color: var(--secondary);
				margin-bottom: 15px;
				text-align: center;
				font-size: 1.4rem;
				line-height: 1.3;
			}

			.portfolio-overlay p {
				text-align: center;
				margin-bottom: 20px;
				font-size: 0.9rem;
				line-height: 1.4;
				overflow: hidden;
				display: -webkit-box;
				-webkit-line-clamp: 4; /* Batasi maksimal 4 baris di overlay */
				-webkit-box-orient: vertical;
				text-overflow: ellipsis;
			}

			/* Contact Section */
			.contact {
				background: var(--gray);
			}

			.contact-container {
				display: flex;
				gap: 50px;
			}

			.contact-form {
				flex: 1;
			}

			.form-group {
				margin-bottom: 20px;
			}

			.form-group label {
				display: block;
				margin-bottom: 8px;
				font-weight: 500;
			}

			.form-control {
				width: 100%;
				padding: 12px 15px;
				border: 1px solid #ddd;
				border-radius: 5px;
				font-family: "Poppins", sans-serif;
				font-size: 1rem;
				transition: var(--transition);
			}

			.form-control:focus {
				border-color: var(--secondary);
				outline: none;
				box-shadow: 0 0 0 2px rgba(240, 185, 11, 0.2);
			}

			textarea.form-control {
				min-height: 150px;
				resize: vertical;
			}
			
			.contact-container {
    display: flex;
    justify-content: center;
}

.contact-card {
    background: var(--light);
    padding: 45px 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    max-width: 520px;
    width: 100%;
    text-align: center;
    border: 1px solid rgba(240, 185, 11, 0.1);
}

.contact-card h3 {
    margin-bottom: 25px;
    color: var(--primary);
    font-size: 1.3rem;
}

.contact-details {
    margin-bottom: 40px;
}

.contact-item {
    display: flex;
    align-items: center;
    text-align: left;
    margin-bottom: 25px;
    padding: 5px 0;
}

.contact-icon {
    background: var(--secondary);
    color: var(--primary);
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    margin-right: 15px;
    flex-shrink: 0;
}

.contact-text h4 {
    margin: 0;
    font-size: 1rem;
}

.contact-text p {
    margin: 0;
    color: #555;
    font-size: 0.95rem;
}


			.contact-info {
				flex: 1;
			}

			.contact-info h3 {
				margin-bottom: 30px;
			}

			.contact-details {
				margin-bottom: 30px;
			}

			.contact-item {
				display: flex;
				align-items: flex-start;
				margin-bottom: 20px;
			}

			.contact-icon {
				background: var(--primary);
				color: var(--light);
				width: 40px;
				height: 40px;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				margin-right: 15px;
				flex-shrink: 0;
			}

			.contact-text h4 {
				margin-bottom: 5px;
			}

			.contact-text p {
				margin-bottom: 0;
				color: #555;
			}

			.social-links {
				display: flex;
				justify-content: center;
				align-items: center;
				gap: 20px;
				margin-top: 30px;
				flex-wrap: wrap;
			}

			.social-icon {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 55px;
				height: 55px;
				border-radius: 50%;
				background: var(--primary);
				color: var(--light);
				font-size: 1.4rem;
				transition: var(--transition);
				box-shadow: 0 4px 15px rgba(26, 43, 60, 0.2);
				position: relative;
				overflow: hidden;
			}

			.social-icon::before {
				content: "";
				position: absolute;
				top: 0;
				left: -100%;
				width: 100%;
				height: 100%;
				background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
				transition: var(--transition);
			}

			.social-icon:hover::before {
				left: 100%;
			}

			.social-icon:hover {
				background: var(--secondary);
				color: var(--primary);
				transform: translateY(-5px) scale(1.1);
				box-shadow: 0 8px 25px rgba(240, 185, 11, 0.3);
			}

			/* Timeline Section */
			.timeline-section {
				background: var(--light);
				padding-bottom: 50px; /* Kurangi padding bottom */
			}

			.timeline {
				position: relative;
				margin-top: 30px;
				padding-left: 30px;
				border-left: 3px solid var(--secondary);
			}

			.timeline-item {
				position: relative;
				margin-bottom: 30px;
			}

			.timeline-icon {
				position: absolute;
				left: -17px;
				top: 0;
				background: var(--secondary);
				color: var(--primary);
				width: 30px;
				height: 30px;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 0.9rem;
				box-shadow: 0 3px 6px rgba(0,0,0,0.1);
			}

			.timeline-content {
				background: var(--light);
				padding: 15px 20px;
				border-radius: 8px;
				box-shadow: 0 3px 10px rgba(0,0,0,0.05);
			}

			.timeline-content h4 {
				margin-bottom: 5px;
				font-size: 1.2rem;
			}

			.timeline-date {
				font-size: 0.85rem;
				color: #777;
				display: block;
				margin-bottom: 8px;
			}


			/* Footer */
			footer {
				background: var(--primary);
				color: var(--light);
				padding: 30px 0;
				text-align: center;
			}

			.footer-content {
				display: flex;
				flex-direction: column;
				align-items: center;
			}

			.footer-logo {
				font-size: 1.8rem;
				font-weight: 700;
				margin-bottom: 20px;
			}

			.footer-logo span {
				color: var(--secondary);
			}

			.copyright {
				font-size: 0.9rem;
				opacity: 0.8;
			}

			/* Responsive Design */
			@media (max-width: 992px) {
				h1 {
					font-size: 3rem;
				}

				h2 {
					font-size: 2.2rem;
				}

				.hero-content {
					flex-direction: column;
					text-align: center;
				}

				.hero-text {
					padding-right: 0;
					margin-bottom: 50px;
				}

				.about-content {
					flex-direction: column;
				}

				.contact-container {
					flex-direction: column;
				}
			}

			@media (max-width: 768px) {
				section {
					padding: 80px 0;
				}

				.nav-menu {
					position: fixed;
					top: 70px;
					right: -100%;
					background: var(--primary);
					width: 70%;
					height: calc(100vh - 70px);
					flex-direction: column;
					align-items: center;
					padding: 50px 0;
					transition: var(--transition);
				}

				.nav-menu.active {
					right: 0;
				}

				nav ul li {
					margin: 15px 0;
				}

				.hamburger {
					display: block;
				}

				.hero {
					padding: 120px 0 80px;
				}

				.profile-img {
					width: 280px;
					height: 280px;
				}

				.btn-outline {
					margin-left: 0;
					margin-top: 15px;
					display: block;
				}
			}

			@media (max-width: 480px) {
				h1 {
					font-size: 2.5rem;
				}

				h2 {
					font-size: 2rem;
				}

				.profile-img {
					width: 220px;
					height: 220px;
				}

				.portfolio-grid {
					grid-template-columns: 1fr;
				}
			}

			/* Animations */
			@keyframes fadeInUp {
				from {
					opacity: 0;
					transform: translateY(30px);
				}
				to {
					opacity: 1;
					transform: translateY(0);
				}
			}

			.fadeInUp {
				animation: fadeInUp 0.8s ease forwards;
			}
		</style>
	</head>
	<body>
		<!-- Header & Navigation -->
		<header>
			<div class="container header-container">
				<a href="#" class="logo">Porto<span>folio</span></a>
				<button class="hamburger" id="hamburger">
					<i class="fas fa-bars"></i>
				</button>
				<nav>
					<ul class="nav-menu" id="nav-menu">
						<li><a href="#home">Beranda</a></li>
						<li><a href="#about">Tentang Saya</a></li>
						<li><a href="#portfolio">Portofolio</a></li>
						<li><a href="#contact">Kontak</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<!-- Hero Section -->
		<section class="hero" id="home">
			<div class="container hero-content">
				<div class="hero-text fadeInUp">
					<h1>Halo, Saya <span>Muhammad Harist Illyasa</span></h1>
					<p>
						Full-Stack Web Developer dengan fokus pada
						pengalaman pengguna yang luar biasa dan antarmuka yang menarik
						secara visual.
					</p>
					<div class="hero-buttons">
						<a href="#portfolio" class="btn btn-primary">Lihat Portofolio</a>
						<a href="#contact" class="btn btn-outline">Hubungi Saya</a>
					</div>
				</div>
				<div class="hero-image fadeInUp">
					<img
						src="{{ asset('assets/poy.png') }}"
						alt="Foto Profil"
						class="profile-img"
					/>
				</div>
			</div>
		</section>

		<!-- About Section -->
		<section class="about" id="about">
			<div class="container">
				<div class="about-content">
					<div class="about-text fadeInUp">
						<h2>Tentang Saya</h2>
						<p>
							Saya adalah seorang Programmer dan Web Developer dengan keahlian
							dalam merancang, membangun, dan mengelola aplikasi web responsif.
							Terampil menggunakan HTML, CSS, JavaScript, dan PHP, serta
							memiliki pengalaman dalam pengembangan Front-End dan Back-End.
							Saya mampu bekerja baik dalam tim maupun secara mandiri dengan
							fokus pada solusi dan hasil yang optimal.
						</p>
						<p>
							Lulusan Sistem Informasi Universitas Mulawarman dengan IPK 3.86,
							saya menguasai pengembangan web Full-Stack menggunakan Laravel,
							Tailwind CSS, dan MySQL, serta memiliki pengalaman dalam
							perancangan database, API integration, testing, dan version
							control. Berpengalaman mengerjakan berbagai proyek baik untuk
							instansi pemerintah maupun perusahaan.
						</p>
						<p>
							Saya memiliki soft skill seperti Critical Thinking, Problem
							Solving, dan kemampuan bekerja dengan metode Agile & Scrum. Saya
							juga terus mengikuti perkembangan teknologi terbaru untuk
							memastikan setiap solusi yang saya buat relevan dan berkualitas
							tinggi.
						</p>

						<h3>Keahlian</h3>
						<div class="skills">
							<span class="skill">Full-Stack Web Development</span>
							<span class="skill">HTML5 & CSS3</span>
							<span class="skill">JavaScript</span>
							<span class="skill">PHP & Laravel</span>
							<span class="skill">Tailwind CSS</span>
							<span class="skill">SQL & Database Design</span>
							<span class="skill">React JS</span>
							<span class="skill">Jquery & Ajax</span>
							<span class="skill">Node JS</span>
							<span class="skill">Express JS</span>
							<span class="skill">Critical Thingking</span>
							<span class="skill">Problem Solving</span>
							<span class="skill">Agile & Scrum Methodology</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Experience Section -->
		<section class="timeline-section" id="experience">
			<div class="container fadeInUp">
				<h2>Pengalaman Kerja</h2>
				<div class="timeline">
					<div class="timeline-item">
						<div class="timeline-icon"><i class="fas fa-laptop-code"></i></div>
						<div class="timeline-content">
							<h4>Asisten Laboratorium Web Framework Laravel</h4>
							<span class="timeline-date">Universitas Mulawarman | Jul 2024 - Okt 2024</span>
							<p>Membimbing mahasiswa dalam memahami konsep Laravel, membuat modul pembelajaran, studi kasus, dan mendampingi praktik langsung.</p>
						</div>
					</div>
					<div class="timeline-item">
						<div class="timeline-icon"><i class="fas fa-code-branch"></i></div>
						<div class="timeline-content">
							<h4>Full-Stack Web Developer</h4>
							<span class="timeline-date">Pemprov Kalimantan Timur | Sep 2024 - Des 2024</span>
							<p>Mengembangkan website <em>SIPPDEH</em> untuk pemantauan politik dan daerah, serta melatih operator di tiap kabupaten/kota.</p>
						</div>
					</div>
					<div class="timeline-item">
						<div class="timeline-icon"><i class="fas fa-database"></i></div>
						<div class="timeline-content">
							<h4>Full-Stack Web Developer</h4>
							<span class="timeline-date">Pemprov Kalimantan Timur | Jan 2025 - Mei 2025</span>
							<p>Membangun website <em>SIRPENA</em> untuk pelayanan surat rekomendasi penelitian, mencakup desain sistem, pengajuan surat, verifikasi, dan tracking status.</p>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- Portfolio Section -->
		<section class="portfolio" id="portfolio">
			<div class="container">
				<div class="portfolio-header fadeInUp">
					<h2>Portofolio Saya</h2>
					<p>Berikut adalah beberapa proyek terbaru yang telah saya kerjakan</p>
				</div>

				<div class="portfolio-grid">
					@forelse($proyek as $project)
					<div class="portfolio-card fadeInUp">
						<img src="{{ asset($project->gambar) }}" 
							alt="{{ $project->nama }}" class="portfolio-img" />
						<div class="portfolio-content">
							<h3 title="{{ $project->nama }}">{{ $project->nama }}</h3>
							<p title="{{ $project->deskripsi }}">{{ Str::limit($project->deskripsi, 80) }}</p>
						</div>
						<div class="portfolio-overlay">
							<h3>{{ $project->nama }}</h3>
							<p>{{ Str::limit($project->deskripsi, 120) }}</p>
							<button class="btn btn-primary view-details"
								data-title="{{ $project->nama }}"
								data-img="{{ asset($project->gambar) }}"
								data-tech="{{ $project->tech }}"
								data-desc="{{ $project->deskripsi }}"
								data-link="{{ $project->link }}">Lihat Detail</button>
						</div>
					</div>
					@empty
					<!-- Project Default jika belum ada data -->
					<div class="portfolio-card fadeInUp">
						<img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=1674&q=80" 
							alt="Proyek 1" class="portfolio-img" />
						<div class="portfolio-content">
							<h3>Aplikasi E-commerce</h3>
							<p>Platform belanja online dengan pengalaman pengguna yang mulus dan proses pembayaran yang aman.</p>
						</div>
						<div class="portfolio-overlay">
							<h3>Aplikasi E-commerce</h3>
							<p>Platform belanja online dengan pengalaman pengguna yang mulus dan proses pembayaran yang aman.</p>
							<button class="btn btn-primary view-details"
								data-title="Aplikasi E-commerce"
								data-img="https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=1674&q=80"
								data-tech="HTML, CSS, JavaScript, Laravel, MySQL"
								data-desc="Proyek ini adalah platform e-commerce full-stack dengan fitur keranjang belanja, checkout aman, dan dashboard admin."
								data-link="https://contoh-project.com">Lihat Detail</button>
						</div>
					</div>

					<div class="portfolio-card fadeInUp">
						<img
							src="https://images.unsplash.com/photo-1463171379579-3fdfb86d6285?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
							alt="Proyek 2"
							class="portfolio-img"
						/>
						<div class="portfolio-content">
							<h3>Sistem Manajemen Konten</h3>
							<p>Platform CMS yang mudah digunakan dengan fitur drag-and-drop dan manajemen konten yang intuitif.</p>
						</div>
						<div class="portfolio-overlay">
							<h3>Sistem Manajemen Konten</h3>
							<p>Platform CMS yang mudah digunakan dengan fitur drag-and-drop dan manajemen konten yang intuitif.</p>
							<button class="btn btn-primary view-details"
								data-title="Sistem Manajemen Konten"
								data-img="https://images.unsplash.com/photo-1463171379579-3fdfb86d6285?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
								data-tech="PHP, Laravel, MySQL, Bootstrap"
								data-desc="Platform CMS yang mudah digunakan dengan fitur drag-and-drop dan manajemen konten yang intuitif untuk berbagai jenis website."
								data-link="https://contoh-cms.com">Lihat Detail</button>
						</div>
					</div>

					<div class="portfolio-card fadeInUp">
						<img
							src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
							alt="Proyek 3"
							class="portfolio-img"
						/>
						<div class="portfolio-content">
							<h3>Aplikasi Mobile Banking</h3>
							<p>Aplikasi perbankan seluler dengan antarmuka yang bersih dan fitur keamanan tingkat tinggi.</p>
						</div>
						<div class="portfolio-overlay">
							<h3>Aplikasi Mobile Banking</h3>
							<p>Aplikasi perbankan seluler dengan antarmuka yang bersih dan fitur keamanan tingkat tinggi.</p>
							<button class="btn btn-primary view-details"
								data-title="Aplikasi Mobile Banking"
								data-img="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
								data-tech="React Native, Node.js, MongoDB"
								data-desc="Aplikasi perbankan seluler dengan antarmuka yang bersih dan fitur keamanan tingkat tinggi untuk transaksi yang aman."
								data-link="https://contoh-banking.com">Lihat Detail</button>
						</div>
					</div>
					@endforelse
				</div>

				<!-- Modal -->
				<div id="portfolioModal" class="modal">
					<div class="modal-content fadeInUp">
						<span class="close">&times;</span>
						<img id="modal-img" src="" alt="Project Image">
						<h2 id="modal-title"></h2>
						<p><strong>Teknologi:</strong> <span id="modal-tech"></span></p>
						<p id="modal-desc"></p>
						<a id="modal-link" href="#" target="_blank" class="btn btn-primary">Kunjungi Proyek</a>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<!-- Contact Section -->
<section class="contact" id="contact">
    <div class="container">
        <div class="contact-container fadeInUp">
            <div class="contact-card">
                <h3>Informasi Kontak</h3>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-text">
                            <h4>Lokasi</h4>
                            <p>Balikpapan, Indonesia</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <p>razak1352.com@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div class="contact-text">
                            <h4>Telepon</h4>
                            <p>0895700171927</p>
                        </div>
                    </div>
                </div>
                <h3>Sosial Media</h3>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-dribbble"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="footer-content">
					<div class="footer-logo">Porto<span>folio</span></div>
					<p class="copyright">
						© 2023 Muhammad Harist Illyasa. Hak Cipta Dilindungi.
					</p>
				</div>
			</div>
		</footer>

		<script>
			// Navigation Toggle for Mobile
			const hamburger = document.getElementById("hamburger");
			const navMenu = document.getElementById("nav-menu");

			hamburger.addEventListener("click", () => {
				navMenu.classList.toggle("active");
			});

			// Close menu when clicking on a link
			document.querySelectorAll(".nav-menu a").forEach((link) => {
				link.addEventListener("click", () => {
					navMenu.classList.remove("active");
				});
			});

			// Form Submission
			const contactForm = document.getElementById("contactForm");
			contactForm.addEventListener("submit", (e) => {
				e.preventDefault();
				alert("Pesan Anda telah terkirim! Saya akan menghubungi Anda segera.");
				contactForm.reset();
			});

			// Smooth Scrolling
			document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
				anchor.addEventListener("click", function (e) {
					e.preventDefault();

					const targetId = this.getAttribute("href");
					const targetElement = document.querySelector(targetId);

					window.scrollTo({
						top: targetElement.offsetTop - 70,
						behavior: "smooth",
					});
				});
			});

			// Animation on Scroll
			const fadeElements = document.querySelectorAll(".fadeInUp");

			const observer = new IntersectionObserver(
				(entries) => {
					entries.forEach((entry) => {
						if (entry.isIntersecting) {
							entry.target.style.animation = "fadeInUp 0.8s ease forwards";
							observer.unobserve(entry.target);
						}
					});
				},
				{
					threshold: 0.1,
				}
			);

			fadeElements.forEach((el) => {
				observer.observe(el);
			});
		</script>

		<script>
			// Modal Portfolio
const modal = document.getElementById("portfolioModal");
const modalImg = document.getElementById("modal-img");
const modalTitle = document.getElementById("modal-title");
const modalTech = document.getElementById("modal-tech");
const modalDesc = document.getElementById("modal-desc");
const modalLink = document.getElementById("modal-link");
const closeModal = document.querySelector(".modal .close");

document.querySelectorAll(".view-details").forEach(btn => {
    btn.addEventListener("click", function() {
        modal.style.display = "block";
        modalImg.src = this.dataset.img;
        modalTitle.textContent = this.dataset.title;
        modalTech.textContent = this.dataset.tech;
        modalDesc.textContent = this.dataset.desc;
        modalLink.href = this.dataset.link;
    });
});

closeModal.onclick = function() {
    modal.style.display = "none";
};

window.onclick = function(e) {
    if (e.target == modal) {
        modal.style.display = "none";
    }
};

		</script>
	</body>
</html>
