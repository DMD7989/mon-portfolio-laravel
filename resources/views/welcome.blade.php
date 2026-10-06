<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Djimé Dembélé | Développeur Full Stack</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #09090b; --text-main: #f8fafc; --text-muted: #94a3b8;
            --primary: #3b82f6; --accent: #8b5cf6;
            --gradient: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
        }

        * { box-sizing: border-box; }

        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); margin: 0; padding: 0; overflow-x: hidden; display: flex; flex-direction: column; min-height: 100vh; }

        .glow-bg { position: fixed; top: -20%; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; max-width: 100vw; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(139,92,246,0.1) 40%, rgba(9,9,11,0) 70%); z-index: -1; pointer-events: none; }

        /* --- NAVIGATION DYNAMIQUE --- */
        nav { position: fixed; top: 0; width: 100%; padding: 30px 0; background: transparent; border-bottom: 1px solid transparent; transition: all 0.4s ease; z-index: 100; }
        nav.scrolled { padding: 15px 0; background: rgba(9, 9, 11, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.5); }

        .nav-container { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 5%; }

        .logo { font-size: 1.5rem; font-weight: 900; color: var(--text-main); text-decoration: none; letter-spacing: -1px; z-index: 101; }
        .logo span { color: var(--primary); }

        .nav-links { display: flex; align-items: center; }
        .nav-links a { color: var(--text-muted); text-decoration: none; margin-left: 40px; font-size: 0.95rem; font-weight: 500; transition: color 0.3s; }
        .nav-links a:hover { color: var(--text-main); }

        .menu-toggle { display: none; flex-direction: column; gap: 6px; background: none; border: none; cursor: pointer; z-index: 101; padding: 5px; }
        .menu-toggle span { display: block; width: 28px; height: 2px; background-color: var(--text-main); transition: transform 0.3s ease, opacity 0.3s ease; border-radius: 2px; }

        /* --- HERO SECTION --- */
        .hero { display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 180px 5% 60px 5%; max-width: 1000px; margin: 0 auto; width: 100%; }

        .hero-photo { width: 140px; height: 140px; border-radius: 50%; object-fit: cover; object-position: center 20%; margin-bottom: 28px; border: 3px solid transparent; background: linear-gradient(var(--bg-color), var(--bg-color)) padding-box, var(--gradient) border-box; box-shadow: 0 0 40px rgba(59, 130, 246, 0.35); }
        .availability-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); color: #60a5fa; padding: 8px 16px; border-radius: 30px; font-size: 0.85rem; font-weight: 600; margin-bottom: 30px; }
        .pulse-dot { width: 8px; height: 8px; background-color: #3b82f6; border-radius: 50%; box-shadow: 0 0 10px #3b82f6; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); } 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }

        .hero h1 { font-size: clamp(2.5rem, 5vw + 1rem, 4.5rem); font-weight: 900; margin: 0 0 25px 0; line-height: 1.1; letter-spacing: -2px; }
        .text-gradient { background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899, #3b82f6); background-size: 300% 300%; -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; animation: gradient-shift 6s ease infinite; }
        @keyframes gradient-shift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }

        /* --- DYNAMISME --- */
        .progress-bar { position: fixed; top: 0; left: 0; height: 3px; width: 0; background: var(--gradient); z-index: 200; }
        .glow-bg { animation: float-glow 14s ease-in-out infinite; }
        @keyframes float-glow { 0%, 100% { transform: translateX(-50%) translateY(0) scale(1); } 50% { transform: translateX(-46%) translateY(40px) scale(1.08); } }
        .hero-photo { animation: float-y 5s ease-in-out infinite; }
        @keyframes float-y { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
        .typed-line { font-size: clamp(1.1rem, 2vw + 0.4rem, 1.5rem); font-weight: 600; color: var(--text-main); margin: 0 0 24px 0; min-height: 2em; }
        .typed-line #typed { color: #60a5fa; }
        .cursor { display: inline-block; width: 2px; height: 1.1em; background: #60a5fa; margin-left: 3px; vertical-align: text-bottom; animation: blink 1s steps(1) infinite; }
        @keyframes blink { 50% { opacity: 0; } }
        .tech-card { transition: all 0.3s; }
        .tech-card:hover { color: var(--text-main); border-color: rgba(59,130,246,0.4); transform: translateY(-3px); background: rgba(59,130,246,0.08); }
        .project-card::after { content: ''; position: absolute; inset: 0; border-radius: inherit; background: radial-gradient(400px circle at var(--mx, 50%) var(--my, 50%), rgba(139,92,246,0.14), transparent 45%); opacity: 0; transition: opacity 0.3s; pointer-events: none; z-index: 0; }
        .project-card:hover::after { opacity: 1; }
        .project-card { transform-style: preserve-3d; }
        .to-top { position: fixed; right: 24px; bottom: 24px; width: 46px; height: 46px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.12); background: rgba(9,9,11,0.85); backdrop-filter: blur(8px); color: var(--text-main); font-size: 1.2rem; cursor: pointer; opacity: 0; pointer-events: none; transform: translateY(10px); transition: all 0.3s; z-index: 150; }
        .to-top.show { opacity: 1; pointer-events: auto; transform: none; }
        .to-top:hover { border-color: rgba(59,130,246,0.5); background: rgba(59,130,246,0.15); }
        .nav-links a.active { color: var(--text-main); }
        .project-card.reveal.visible:hover { transform: translateY(-5px); }
        .skill-card.reveal.visible:hover { transform: translateY(-4px); }

        .hero p { font-size: clamp(1rem, 2vw + 0.5rem, 1.25rem); color: var(--text-muted); max-width: 700px; line-height: 1.8; margin: 0 auto 40px auto; }

        .cta-container { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; width: 100%; }
        .btn { padding: 16px 36px; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; text-align: center; display: inline-block; }
        .btn-primary { background: var(--text-main); color: var(--bg-color); box-shadow: 0 0 20px rgba(255, 255, 255, 0.1); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 0 30px rgba(255, 255, 255, 0.2); background: #e2e8f0; }
        .btn-secondary { background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid rgba(255, 255, 255, 0.1); }
        .btn-secondary:hover { background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2); }

        .tech-grid { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; margin-top: 50px; }
        .tech-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); padding: 10px 20px; border-radius: 12px; color: var(--text-muted); font-size: 0.9rem; font-weight: 500; cursor: default; }

        /* --- SECTION PROJETS --- */
        .projects-wrapper { max-width: 1200px; margin: 40px auto 60px auto; padding: 0 5%; width: 100%; }
        .section-heading { font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 40px; color: #475569; font-weight: 600; text-align: center; }

        .projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 400px), 1fr)); gap: 30px; }

        .project-card { display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 40px; transition: all 0.3s; position: relative; overflow: hidden; height: 100%; }
        .project-card:hover { border-color: rgba(59, 130, 246, 0.3); transform: translateY(-5px); background: rgba(255, 255, 255, 0.04); box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.1); }

        .project-bg-element { position: absolute; top: 0; right: 0; width: 300px; height: 300px; background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%); border-radius: 50%; transform: translate(30%, -30%); z-index: 0; pointer-events: none; }
        .project-bg-element.green { background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%); }

        .project-content { position: relative; z-index: 1; display: flex; flex-direction: column; flex-grow: 1; }

        .project-header { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px; margin-bottom: 20px; }
        .project-title { font-size: clamp(1.5rem, 3vw + 0.5rem, 1.8rem); font-weight: 800; margin: 0; color: var(--text-main); }

        .project-status { background: rgba(59, 130, 246, 0.1); color: #60a5fa; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; border: 1px solid rgba(59, 130, 246, 0.2); white-space: nowrap; }
        .project-status.green { background: rgba(16,185,129,0.1); color: #34d399; border-color: rgba(16,185,129,0.2); }
        .project-status.amber { background: rgba(245,158,11,0.1); color: #fbbf24; border-color: rgba(245,158,11,0.2); }
        .project-status.angular { background: rgba(225, 29, 72, 0.1); color: #fb7185; border-color: rgba(225, 29, 72, 0.2); }

        .project-desc { color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin: 0; flex-grow: 1; }

        .project-tags { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 30px; }
        .project-tags span { font-size: 0.8rem; color: #cbd5e1; background: rgba(255,255,255,0.05); padding: 6px 12px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1); font-weight: 500;}

        .project-bg-element.pink { background: radial-gradient(circle, rgba(236,72,153,0.15) 0%, transparent 70%); }
        .project-bg-element.amber { background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 70%); }
        .project-bg-element.blue { background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%); }
        .project-link { margin-top: 24px; color: #60a5fa; font-weight: 600; font-size: 0.9rem; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
        .project-link:hover { color: #93c5fd; text-decoration: underline; }
        .section-title { font-size: clamp(1.8rem, 3vw, 2.4rem); font-weight: 800; text-align: center; margin: 0 0 40px 0; letter-spacing: -1px; }

        /* --- CHIFFRES CLES --- */
        .stats { max-width: 1000px; margin: 20px auto 40px auto; padding: 0 5%; display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; width: 100%; }
        .stat { text-align: center; padding: 24px 10px; border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; background: rgba(255,255,255,0.02); }
        .stat strong { display: block; font-size: 2.2rem; font-weight: 900; background: var(--gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat span { color: var(--text-muted); font-size: 0.85rem; }

        /* --- COMPETENCES --- */
        .skills-wrapper { max-width: 1200px; margin: 40px auto; padding: 0 5%; width: 100%; }
        .skills-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; }
        .skill-card { background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 28px; transition: all 0.3s; }
        .skill-card:hover { border-color: rgba(139,92,246,0.35); transform: translateY(-4px); }
        .skill-card h4 { margin: 0 0 14px 0; font-size: 1.05rem; }
        .skill-card ul { margin: 0; padding: 0; list-style: none; display: flex; flex-wrap: wrap; gap: 8px; }
        .skill-card li { font-size: 0.8rem; color: #cbd5e1; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); padding: 5px 11px; border-radius: 6px; }

        /* --- ANIMATION D'APPARITION --- */
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .reveal.visible { opacity: 1; transform: none; }
        html { scroll-behavior: smooth; }
        section[id] { scroll-margin-top: 90px; }
        @media (prefers-reduced-motion: reduce) { .reveal { opacity: 1; transform: none; transition: none; } html { scroll-behavior: auto; } .glow-bg, .hero-photo, .text-gradient, .cursor { animation: none; } }

        /* --- CONTACT SECTION --- */
        .contact-section { max-width: 800px; margin: 60px auto 80px auto; padding: 60px 5%; text-align: center; position: relative; }
        .contact-section::before { content: ''; position: absolute; top: 0; left: 20%; right: 20%; height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent); }
        .contact-title { font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 20px; }
        .contact-desc { color: var(--text-muted); font-size: 1.1rem; line-height: 1.7; margin-bottom: 40px; }

        .social-links { display: flex; justify-content: center; gap: 15px; margin-top: 30px; flex-wrap: wrap; }
        .social-link { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); padding: 12px 24px; border-radius: 12px; color: var(--text-main); font-size: 0.95rem; font-weight: 500; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 8px; }
        .social-link:hover { background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2); transform: translateY(-3px); }

        /* --- FOOTER --- */
        footer { padding: 30px 5%; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.05); color: #64748b; font-size: 0.9rem; margin-top: auto; }
        footer span { color: var(--text-muted); font-weight: 500; }

        /* --- RESPONSIVITÉ MOBILE --- */
        @media (max-width: 768px) {
            .menu-toggle { display: flex; }
            .nav-links { position: fixed; top: 0; right: -100%; width: 280px; height: 100vh; background: rgba(9, 9, 11, 0.98); backdrop-filter: blur(20px); flex-direction: column; justify-content: center; align-items: center; transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1); border-left: 1px solid rgba(255, 255, 255, 0.05); box-shadow: -10px 0 30px rgba(0,0,0,0.5); }
            .nav-links.active { right: 0; }
            .nav-links a { margin: 20px 0; font-size: 1.2rem; }
            .menu-toggle.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
            .menu-toggle.active span:nth-child(2) { opacity: 0; }
            .menu-toggle.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }

            .cta-container { flex-direction: column; }
            .btn { width: 100%; }
            .projects-grid { grid-template-columns: 1fr; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .project-card { padding: 25px 20px; }
            .project-header { flex-direction: column; align-items: flex-start; gap: 10px; }
        }
    </style>
</head>
<body>

    <div class="progress-bar" id="progress"></div>
    <div class="glow-bg"></div>

    <nav id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">Djimé<span>.dev</span></a>

            <button class="menu-toggle" id="mobile-menu-btn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-links" id="nav-menu">
                <a href="#projets">Projets</a>
                <a href="#competences">Compétences</a>
                <a href="#contact">Contact</a>
                <a href="/mon-cv">Curriculum Vitae</a>
            </div>
        </div>
    </nav>

    <main class="hero">
        <img src="/images/profil.jpg" alt="Djimé Dembélé" class="hero-photo" width="140" height="140">

        <div class="availability-badge">
            <div class="pulse-dot"></div>
            Disponible pour de nouveaux projets
        </div>

        <h1>Conception d'applications <br><span class="text-gradient">Robustes & Scalables</span></h1>

        <p class="typed-line">Je construis <span id="typed"></span><span class="cursor"></span></p>

        <p>
            Je suis <strong>Djimé Dembélé</strong>, Ingénieur Logiciel & Développeur Full Stack.
            J'accompagne les entreprises dans la transformation de leurs processus en concevant
            des solutions web et mobiles performantes, sécurisées et intuitives.
        </p>

        <div class="cta-container">
            <a href="#contact" class="btn btn-primary">Me contacter</a>
            <a href="#projets" class="btn btn-secondary">Voir mes projets</a>
        </div>

        <div class="tech-grid">
            <div class="tech-card">Angular & TS</div>
            <div class="tech-card">Spring Boot 3 & Java 21</div>
            <div class="tech-card">Flutter & Dart</div>
            <div class="tech-card">Laravel & PHP</div>
        </div>
    </main>

    <div class="stats reveal">
        <div class="stat"><strong data-count="7">7</strong><span>Projets réalisés</span></div>
        <div class="stat"><strong data-count="4">4</strong><span>Stacks maîtrisées</span></div>
        <div class="stat"><strong data-count="3">3</strong><span>Apps mobiles Flutter</span></div>
        <div class="stat"><strong>🇲🇱</strong><span>Impact local, Mali</span></div>
    </div>

    @php
        $projects = [
            ['title' => 'EcoleInnov', 'status' => '🎓 Gestion Scolaire', 'class' => 'blue', 'badge' => '',
             'desc' => "Plateforme complète de gestion d'établissement scolaire : inscriptions, classes et matières, emplois du temps, notes et bulletins trimestriels (export PDF), paiements et frais de scolarité, finances et dépenses, pointage du personnel, messagerie et annonces, calendrier scolaire. Authentification JWT, rôles dont un super-administrateur, notifications via WhatsApp (Twilio) et e-mail.",
             'tags' => ['Spring Boot', 'Java 17', 'Angular 20', 'Tailwind CSS', 'PostgreSQL', 'JWT', 'Twilio'],
             'url' => null],
            ['title' => "N'yé", 'status' => '🚨 Alerte Personnes Disparues', 'class' => 'pink', 'badge' => '',
             'desc' => "Plateforme numérique de signalement et de recherche de personnes disparues au Mali. Authentification JWT + OTP, cycle de vie complet des alertes (création, validation, rejet, clôture), modération, console d'administration avec carte de chaleur et application mobile pour le grand public. Intégration continue (CI) sur chaque composant.",
             'tags' => ['Spring Boot', 'Java 21', 'Flutter', 'Angular', 'JWT / OTP', 'PostgreSQL'],
             'url' => 'https://github.com/DMD7989/nye'],
            ['title' => 'NS CAR', 'status' => '🚕 Système VTC · Bamako', 'class' => 'amber', 'badge' => 'amber',
             'desc' => "Plateforme de commande de taxi pour une compagnie de Bamako : app passager, app chauffeur et tableau de bord admin. Pensée pour un public peu digitalisé : gros boutons, bilingue FR/EN, Android bas de gamme et réseau 2G–4G. Cartographie OpenStreetMap, paiement espèces ou mobile money avec partage automatique des commissions.",
             'tags' => ['Flutter', 'React', 'TypeScript', 'OpenStreetMap', 'Mobile Money', 'Monorepo'],
             'url' => null],
            ['title' => 'Volaille Connect', 'status' => '🐔 Dépôt-vente de volailles', 'class' => 'green', 'badge' => 'green',
             'desc' => "Plateforme de dépôt-vente de poulets au Mali : l'éleveur confie ses poulets à des revendeurs vérifiés, chaque vente est déclarée et payée via la plateforme, et chacun reçoit sa part automatiquement. API REST avec inscription par OTP SMS, connexion par PIN, montants en FCFA entiers et tests d'intégration Testcontainers.",
             'tags' => ['Spring Boot 4', 'Java 21', 'PostgreSQL 17', 'Testcontainers', 'JWT'],
             'url' => null],
            ['title' => 'Ferme Digitale', 'status' => '🌾 API de gestion agricole', 'class' => 'blue', 'badge' => '',
             'desc' => "API REST pour la gestion d'une ferme digitale. Migrations de base de données automatisées avec Flyway, documentation Swagger/OpenAPI, environnement de développement H2 et conteneurisation Docker Compose avec PostgreSQL pour la production.",
             'tags' => ['Spring Boot', 'Java 21', 'Flyway', 'Swagger', 'Docker', 'PostgreSQL'],
             'url' => null],
            ['title' => 'CollabDev', 'status' => '⚡ Plateforme Collaborative', 'class' => 'green', 'badge' => 'angular',
             'desc' => "Plateforme web innovante destinée à la co-création de projets numériques. L'application intègre un puissant moteur de gamification (pièces virtuelles, badges de compétences, niveaux) pour stimuler l'engagement. Gestion des droits d'accès basée sur les rôles (RBAC) pour administrateurs, gestionnaires et contributeurs, avec notifications en temps réel.",
             'tags' => ['Angular', 'TypeScript', 'Spring Boot', 'Gamification', 'RBAC Security'],
             'url' => null],
            ['title' => 'MussoDeme (Écosystème)', 'status' => '📱 API & App Mobile (v2.0)', 'class' => '', 'badge' => '',
             'desc' => "Solution digitale complète dédiée à l'autonomisation des femmes rurales. Backend robuste (API REST sécurisée via JWT, e-commerce, gestion de coopératives) et application mobile multiplateforme Flutter. Architecture conçue selon les principes 12 Factor App pour garantir sécurité, scalabilité et résilience.",
             'tags' => ['Flutter / Dart', 'Spring Boot 3.5', 'Java 21', 'MySQL 8.0', 'JWT', 'REST'],
             'url' => null],
        ];
    @endphp

    <section class="projects-wrapper" id="projets">
        <p class="section-heading">Projets Phares</p>
        <h2 class="section-title">Ce que j'ai construit</h2>

        <div class="projects-grid">
            @foreach ($projects as $project)
            <div class="project-card reveal">
                <div class="project-bg-element {{ $project['class'] }}"></div>
                <div class="project-content">
                    <div class="project-header">
                        <h3 class="project-title">{{ $project['title'] }}</h3>
                        <span class="project-status {{ $project['badge'] }}">{{ $project['status'] }}</span>
                    </div>
                    <p class="project-desc">{{ $project['desc'] }}</p>
                    <div class="project-tags">
                        @foreach ($project['tags'] as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                    @if ($project['url'])
                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="project-link">Voir le code sur GitHub &rarr;</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="skills-wrapper reveal" id="competences">
        <p class="section-heading">Compétences</p>
        <div class="skills-grid">
            <div class="skill-card"><h4>⚙️ Backend</h4><ul><li>Java 21</li><li>Spring Boot</li><li>Laravel / PHP</li><li>REST &amp; JWT</li></ul></div>
            <div class="skill-card"><h4>🎨 Frontend</h4><ul><li>Angular</li><li>TypeScript</li><li>React</li><li>HTML / CSS</li></ul></div>
            <div class="skill-card"><h4>📱 Mobile</h4><ul><li>Flutter</li><li>Dart</li></ul></div>
            <div class="skill-card"><h4>🚀 DevOps &amp; Données</h4><ul><li>Docker</li><li>PostgreSQL</li><li>MySQL</li><li>CI GitHub Actions</li></ul></div>
        </div>
    </section>

    <section class="contact-section" id="contact">
        <h2 class="contact-title">Prêt à collaborer ?</h2>
        <p class="contact-desc">
            Je suis actuellement ouvert à de nouvelles opportunités. Que vous ayez une question, un projet de développement, ou que vous souhaitiez simplement échanger sur les nouvelles technologies, n'hésitez pas à m'écrire.
        </p>

        <a href="mailto:dembeledjime83@gmail.com" class="btn btn-primary">Dites Bonjour 👋</a>

        <div class="social-links">
            <a href="https://github.com/DMD7989" target="_blank" class="social-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                GitHub
            </a>
            <a href="https://www.linkedin.com/in/djim%C3%A9-dembel%C3%A9-0a0118274/" target="_blank" rel="noopener" class="social-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                LinkedIn
            </a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 <span>Djimé Dembélé</span>. Tous droits réservés.</p>
    </footer>

    <button class="to-top" id="to-top" aria-label="Retour en haut">&uarr;</button>

    <script>
        // Gestion du menu mobile
        const menuBtn = document.getElementById('mobile-menu-btn');
        const navMenu = document.getElementById('nav-menu');

        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                menuBtn.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });

        // Gestion de la Navbar au Scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Apparition au scroll
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
        }, { threshold: 0.1 });
        document.querySelectorAll('.reveal').forEach(el => io.observe(el));

        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Barre de progression + bouton retour en haut + lien actif
        const progress = document.getElementById('progress');
        const toTop = document.getElementById('to-top');
        const sectionLinks = [...document.querySelectorAll('.nav-links a[href^="#"]')];
        const sections = sectionLinks.map(a => document.querySelector(a.getAttribute('href')));
        function onScroll() {
            const max = document.documentElement.scrollHeight - innerHeight;
            progress.style.width = (max > 0 ? scrollY / max * 100 : 0) + '%';
            toTop.classList.toggle('show', scrollY > 600);
            let current = -1;
            sections.forEach((sec, i) => { if (sec && sec.getBoundingClientRect().top < innerHeight * 0.4) current = i; });
            sectionLinks.forEach((a, i) => a.classList.toggle('active', i === current));
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
        toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }));

        // Texte qui se tape
        const phrases = ['des API robustes avec Spring Boot', 'des interfaces modernes avec Angular', 'des apps mobiles avec Flutter', 'des plateformes utiles pour le Mali'];
        const typedEl = document.getElementById('typed');
        if (reduceMotion) {
            typedEl.textContent = phrases[0];
        } else {
            let pi = 0, ci = 0, deleting = false;
            (function tick() {
                const word = phrases[pi];
                typedEl.textContent = word.slice(0, ci);
                let delay = deleting ? 30 : 60;
                if (!deleting && ci === word.length) { deleting = true; delay = 1800; }
                else if (deleting && ci === 0) { deleting = false; pi = (pi + 1) % phrases.length; delay = 400; }
                else { ci += deleting ? -1 : 1; }
                setTimeout(tick, delay);
            })();
        }

        // Compteurs animés
        const counterIO = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                const el = e.target, target = +el.dataset.count;
                counterIO.unobserve(el);
                if (reduceMotion) { el.textContent = target; return; }
                const t0 = performance.now();
                (function step(now) {
                    const k = Math.min((now - t0) / 1200, 1);
                    el.textContent = Math.round(target * (1 - Math.pow(1 - k, 3)));
                    if (k < 1) requestAnimationFrame(step);
                })(t0);
            });
        }, { threshold: 0.6 });
        document.querySelectorAll("[data-count]").forEach(el => { if (!reduceMotion) el.textContent = "0"; counterIO.observe(el); });

        // Halo qui suit la souris + léger effet 3D sur les cartes projet
        if (!reduceMotion && matchMedia('(hover: hover)').matches) {
            document.querySelectorAll('.project-card').forEach(card => {
                card.addEventListener('mousemove', (ev) => {
                    const r = card.getBoundingClientRect();
                    const x = ev.clientX - r.left, y = ev.clientY - r.top;
                    card.style.setProperty('--mx', x + 'px');
                    card.style.setProperty('--my', y + 'px');
                });
            });
        }

        // Apparition décalée des cartes d'une même grille
        document.querySelectorAll('.projects-grid, .skills-grid').forEach(grid => {
            [...grid.children].forEach((child, i) => { child.style.transitionDelay = (i % 2) * 0.12 + 's'; child.addEventListener('transitionend', () => { child.style.transitionDelay = ''; }, { once: true }); });
        });
    </script>
</body>
</html>
