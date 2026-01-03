<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Portfolio - Muhammad Harist Illyasa</title>
    <style>
        @page {
            margin: 0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
            background: #0f172a;
            color: #cbd5e1;
            font-size: 11px;
            line-height: 1.5;
        }
        
        .page {
            width: 100%;
            min-height: 100%;
            padding: 35px 40px;
            background: #0f172a;
            position: relative;
        }

        /* Top Bar Accent */
        .page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #fbbf24, #d97706);
        }
        
        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo-circle {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            border-radius: 10px;
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
            box-shadow: 0 4px 6px -1px rgba(251, 191, 36, 0.3);
        }
        
        .header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }
        
        .header h1 span {
            color: #fbbf24;
        }
        
        .header .subtitle {
            font-size: 12px;
            color: #94a3b8;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            font-weight: 500;
        }
        
        .header .tagline {
            font-size: 10px;
            color: #64748b;
            font-style: italic;
        }
        
        /* Stats Section */
        .stats-container {
            width: 100%;
            margin-bottom: 25px;
            /* Layout table for dompdf */
            display: table;
            border-spacing: 15px 0;
            margin-left: -15px; /* Offset the spacing */
            width: calc(100% + 30px);
        }
        
        .stat-card {
            display: table-cell;
            width: 33.33%;
            background: rgba(30, 41, 59, 0.6);
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .stat-number {
            font-size: 20px;
            font-weight: 800;
            color: #fbbf24;
            display: block;
            margin-bottom: 2px;
        }
        
        .stat-label {
            font-size: 9px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        
        /* Section Title */
        .section-header {
            margin-bottom: 20px;
            border-left: 3px solid #fbbf24;
            padding-left: 12px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .section-title span {
            color: #fbbf24;
        }

        /* Project Card */
        .project-card {
            background: #1e293b;
            border-radius: 8px;
            margin: 0 auto 25px auto;
            width: 92%;
            overflow: hidden;
            page-break-inside: avoid;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .project-image-container {
            width: 100%;
            background: #020617;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .project-image {
            max-width: 100%;
            max-height: 220px; /* Batasi tinggi agar tidak terlalu makan tempat */
            width: auto;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
            margin: 0 auto;
            display: block;
        }
        
        .project-content {
            padding: 20px 30px;
        }
        
        .project-header {
            margin-bottom: 10px;
        }
        
        .project-title {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
        }

        .project-index {
            font-size: 10px;
            color: #fbbf24;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 2px;
            display: block;
        }
        
        .project-description {
            font-size: 11px;
            color: #cbd5e1;
            margin-bottom: 15px;
            text-align: justify;
        }
        
        .project-description ul {
            margin-left: 15px;
            margin-top: 5px;
        }

        /* Tech Stack Tags */
        .tech-tags {
            margin-bottom: 15px;
        }
        
        .tech-tag {
            display: inline-block;
            padding: 3px 8px;
            background: rgba(251, 191, 36, 0.1);
            color: #fbbf24;
            font-size: 8px;
            font-weight: 600;
            border-radius: 4px;
            border: 1px solid rgba(251, 191, 36, 0.2);
            margin-right: 4px;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        /* Link Button */
        .link-btn {
            display: inline-block;
            background: #334155;
            color: #ffffff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 500;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        .contact-row {
            margin-bottom: 5px;
        }

        .contact-item {
            display: inline-block;
            margin: 0 10px;
            font-size: 10px;
            color: #94a3b8;
        }
        
        .contact-item strong {
            color: #e2e8f0;
        }

        .copyright {
            font-size: 9px;
            color: #64748b;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            <div class="logo-circle">P</div>
            <h1>Muhammad Harist <span>Illyasa</span></h1>
            <p class="subtitle">Full-Stack Web Developer | Laravel Specialist | UI/UX Enthusiast</p>
            <p class="tagline">"Membangun solusi digital yang efisien, modern, dan scalable"</p>
        </div>
        
        <!-- Quick Stats -->
        <div class="stats-container">
            <div class="stat-card">
                <span class="stat-number">{{ count($proyek) }}</span>
                <span class="stat-label">Total Proyek</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">3.86</span>
                <span class="stat-label">IPK Cumlaude</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">10+</span>
                <span class="stat-label">Teknologi</span>
            </div>
        </div>
        
        <!-- Projects Section -->
        <div class="section-header">
            <div class="section-title">Portofolio <span>Terbaru</span></div>
        </div>
        
        @foreach($proyek as $index => $project)
        <div class="project-card">
            @if($project->gambar_base64)
            <div class="project-image-container">
                <img src="{{ $project->gambar_base64 }}" alt="{{ $project->nama }}" class="project-image">
            </div>
            @endif
            
            <div class="project-content">
                <div class="project-header">
                    <span class="project-index">Project 0{{ $index + 1 }}</span>
                    <h3 class="project-title">{{ $project->nama }}</h3>
                </div>
                
                <div class="project-description">
                    {!! $project->deskripsi !!}
                </div>
                
                <div class="tech-tags">
                    @foreach(explode(',', $project->tech) as $tech)
                    <span class="tech-tag">{{ trim($tech) }}</span>
                    @endforeach
                </div>
                
                @if($project->link && $project->link != '#')
                <div style="text-align: right;">
                    <a href="{{ $project->link }}" class="link-btn">Kunjungi Website &rarr;</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
        
        <!-- Footer -->
        <div class="footer">
            <div class="contact-row">
                <span class="contact-item"><strong>Email:</strong> haristillyasa13@gmail.com</span>
                <span class="contact-item"><strong>WhatsApp:</strong> 0895-7001-71927</span>
            </div>
            <div class="contact-row">
                <span class="contact-item"><strong>Github:</strong> github.com/harist13</span>
                <span class="contact-item"><strong>LinkedIn:</strong> linkedin.com/in/muhammad-harist-illyasa-964719220</span>
            </div>
            <p class="copyright">
                &copy; {{ date('Y') }} Muhammad Harist Illyasa. Generated on {{ now()->format('d F Y') }}.
            </p>
        </div>
    </div>
</body>
</html>
