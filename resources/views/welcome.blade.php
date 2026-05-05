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

        .availability-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); color: #60a5fa; padding: 8px 16px; border-radius: 30px; font-size: 0.85rem; font-weight: 600; margin-bottom: 30px; }
        .pulse-dot { width: 8px; height: 8px; background-color: #3b82f6; border-radius: 50%; box-shadow: 0 0 10px #3b82f6; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); } 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }

        .hero h1 { font-size: clamp(2.5rem, 5vw + 1rem, 4.5rem); font-weight: 900; margin: 0 0 25px 0; line-height: 1.1; letter-spacing: -2px; }
        .text-gradient { background: var(--gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
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

        .projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; }

        .project-card { display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 40px; transition: all 0.3s; position: relative; overflow: hidden; height: 100%; }
        .project-card:hover { border-color: rgba(59, 130, 246, 0.3); transform: translateY(-5px); background: rgba(255, 255, 255, 0.04); box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.1); }

        .project-bg-element { position: absolute; top: 0; right: 0; width: 300px; height: 300px; background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%); border-radius: 50%; transform: translate(30%, -30%); z-index: 0; pointer-events: none; }
        .project-bg-element.green { background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%); }

        .project-content { position: relative; z-index: 1; display: flex; flex-direction: column; flex-grow: 1; }

        .project-header { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px; margin-bottom: 20px; }
        .project-title { font-size: clamp(1.5rem, 3vw + 0.5rem, 1.8rem); font-weight: 800; margin: 0; color: var(--text-main); }

        .project-status { background: rgba(59, 130, 246, 0.1); color: #60a5fa; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; border: 1px solid rgba(59, 130, 246, 0.2); white-space: nowrap; }
        .project-status.angular { background: rgba(225, 29, 72, 0.1); color: #fb7185; border-color: rgba(225, 29, 72, 0.2); }

        .project-desc { color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin: 0; flex-grow: 1; }

        .project-tags { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 30px; }
        .project-tags span { font-size: 0.8rem; color: #cbd5e1; background: rgba(255,255,255,0.05); padding: 6px 12px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1); font-weight: 500;}

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
            .project-card { padding: 25px 20px; }
            .project-header { flex-direction: column; align-items: flex-start; gap: 10px; }
        }
    </style>
</head>
<body>

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
                <a href="/mon-cv">Curriculum Vitae</a>
            </div>
        </div>
    </nav>

    <main class="hero">
        <div class="availability-badge">
            <div class="pulse-dot"></div>
            Disponible pour de nouveaux projets
        </div>

        <h1>Conception d'applications <br><span class="text-gradient">Robustes & Scalables</span></h1>

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

    <section class="projects-wrapper" id="projets">
        <p class="section-heading">Projets Phares</p>

        <div class="projects-grid">

            <div class="project-card">
                <div class="project-bg-element green"></div>
                <div class="project-content">
                    <div class="project-header">
                        <h3 class="project-title">CollabDev</h3>
                        <span class="project-status angular">⚡ Plateforme Collaborative</span>
                    </div>
                    <p class="project-desc">
                        Plateforme web innovante destinée à la co-création de projets numériques. L'application intègre un puissant moteur de gamification (pièces virtuelles, badges de compétences, niveaux) pour stimuler l'engagement des utilisateurs. Implémentation d'une gestion complexe des droits d'accès basée sur les rôles (RBAC) permettant de différencier les actions des administrateurs, gestionnaires et contributeurs, le tout soutenu par un système de notifications en temps réel.
                    </p>
                    <div class="project-tags">
                        <span>Angular</span>
                        <span>TypeScript</span>
                        <span>Spring Boot</span>
                        <span>Gamification</span>
                        <span>RBAC Security</span>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-bg-element"></div>
                <div class="project-content">
                    <div class="project-header">
                        <h3 class="project-title">MussoDeme (Écosystème)</h3>
                        <span class="project-status">📱 API & App Mobile (v2.0)</span>
                    </div>
                    <p class="project-desc">
                        Solution digitale complète dédiée à l'autonomisation des femmes rurales. Le projet se divise en un backend robuste (API REST sécurisée via JWT, e-commerce, gestion de coopératives) et une application mobile multiplateforme développée en Flutter. L'architecture globale est conçue selon les principes 12 Factor App pour garantir sécurité, scalabilité et résilience.
                    </p>
                    <div class="project-tags">
                        <span>Flutter / Dart</span>
                        <span>Spring Boot 3.5</span>
                        <span>Java 21</span>
                        <span>MySQL 8.0</span>
                        <span>JWT</span>
                        <span>REST</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="contact-section" id="contact">
        <h2 class="contact-title">Prêt à collaborer ?</h2>
        <p class="contact-desc">
            Je suis actuellement ouvert à de nouvelles opportunités. Que vous ayez une question, un projet de développement, ou que vous souhaitiez simplement échanger sur les nouvelles technologies, n'hésitez pas à m'écrire.
        </p>

        <a href="mailto:ton.email@exemple.com" class="btn btn-primary">Dites Bonjour 👋</a>

        <div class="social-links">
            <a href="https://github.com/ton-pseudo" target="_blank" class="social-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                GitHub
            </a>
            <a href="#" target="_blank" class="social-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                LinkedIn
            </a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 <span>Djimé Dembélé</span>. Tous droits réservés.</p>
    </footer>

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
    </script>
</body>
</html>
