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
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); margin: 0; padding: 0; overflow-x: hidden; display: flex; flex-direction: column; min-height: 100vh; }
        .glow-bg { position: fixed; top: -20%; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(139,92,246,0.1) 40%, rgba(9,9,11,0) 70%); z-index: -1; pointer-events: none; }
        nav { position: fixed; top: 0; width: 100%; padding: 20px 0; background: rgba(9, 9, 11, 0.7); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); z-index: 100; }
        .nav-container { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 40px; }
        .logo { font-size: 1.5rem; font-weight: 900; color: var(--text-main); text-decoration: none; letter-spacing: -1px; }
        .logo span { color: var(--primary); }
        .nav-links a { color: var(--text-muted); text-decoration: none; margin-left: 40px; font-size: 0.95rem; font-weight: 500; transition: color 0.3s; }
        .nav-links a:hover { color: var(--text-main); }
        .hero { display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 150px 20px 60px 20px; max-width: 900px; margin: 0 auto; }
        .availability-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.2); color: #60a5fa; padding: 8px 16px; border-radius: 30px; font-size: 0.85rem; font-weight: 600; margin-bottom: 30px; }
        .pulse-dot { width: 8px; height: 8px; background-color: #3b82f6; border-radius: 50%; box-shadow: 0 0 10px #3b82f6; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); } 70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); } 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); } }
        .hero h1 { font-size: 4.5rem; font-weight: 900; margin: 0 0 25px 0; line-height: 1.1; letter-spacing: -2px; }
        .text-gradient { background: var(--gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero p { font-size: 1.25rem; color: var(--text-muted); max-width: 700px; line-height: 1.8; margin: 0 auto 40px auto; }
        .cta-container { display: flex; gap: 20px; }
        .btn { padding: 16px 36px; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; }
        .btn-primary { background: var(--text-main); color: var(--bg-color); box-shadow: 0 0 20px rgba(255, 255, 255, 0.1); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 0 30px rgba(255, 255, 255, 0.2); background: #e2e8f0; }
        .btn-secondary { background: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid rgba(255, 255, 255, 0.1); }
        .btn-secondary:hover { background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2); }
        .tech-grid { display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; margin-top: 40px; }
        .tech-card { background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); padding: 12px 24px; border-radius: 12px; color: var(--text-muted); font-weight: 500; cursor: default; }

        /* Section Projets */
        .projects-section { max-width: 1000px; margin: 60px auto 100px auto; padding: 0 20px; width: 100%; box-sizing: border-box; display: flex; flex-direction: column; gap: 40px;}
        .section-heading { font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px; color: #475569; font-weight: 600; text-align: center; }

        .project-card { background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 40px; transition: all 0.3s; position: relative; overflow: hidden; display: flex; flex-direction: column; gap: 20px; }
        .project-card:hover { border-color: rgba(59, 130, 246, 0.3); transform: translateY(-5px); background: rgba(255, 255, 255, 0.04); box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.1); }
        .project-bg-element { position: absolute; top: 0; right: 0; width: 300px; height: 300px; background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%); border-radius: 50%; transform: translate(30%, -30%); z-index: 0; pointer-events: none;}
        .project-bg-element.green { background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%); }

        .project-content { position: relative; z-index: 1; }
        .project-header { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;}
        .project-title { font-size: 1.8rem; font-weight: 800; margin: 0; color: var(--text-main); }
        .project-status { background: rgba(59, 130, 246, 0.1); color: #60a5fa; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; border: 1px solid rgba(59, 130, 246, 0.2); }
        .project-status.angular { background: rgba(225, 29, 72, 0.1); color: #fb7185; border-color: rgba(225, 29, 72, 0.2); }

        .project-desc { color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; margin: 0; max-width: 800px; }

        .project-tags { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px; }
        .project-tags span { font-size: 0.85rem; color: #cbd5e1; background: rgba(255,255,255,0.05); padding: 6px 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); font-weight: 500;}

        @media (max-width: 768px) { .hero h1 { font-size: 3rem; } .cta-container { flex-direction: column; width: 100%; } .btn { width: 100%; box-sizing: border-box; } .nav-container { padding: 0 20px; flex-direction: column; gap: 15px; } .nav-links a { margin-left: 15px; margin-right: 15px; } .project-card { padding: 25px; } }
    </style>
</head>
<body>

    <div class="glow-bg"></div>

    <nav>
        <div class="nav-container">
            <a href="/" class="logo">Djimé<span>.dev</span></a>
            <div class="nav-links">
                <a href="/mon-cv">Curriculum Vitae</a>
                <a href="/snippets/creer">Carnet de Snippets</a>
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
            <a href="/mon-cv" class="btn btn-primary">Explorer mon profil</a>
            <a href="/snippets/creer" class="btn btn-secondary">Découvrir mes codes</a>
        </div>

        <div class="tech-grid">
            <div class="tech-card">Angular & TS</div>
            <div class="tech-card">Spring Boot 3 & Java 21</div>
            <div class="tech-card">Flutter & Dart</div>
            <div class="tech-card">Laravel & PHP</div>
        </div>
    </main>

    <section class="projects-section">
        <p class="section-heading">Projets Phares</p>

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
                    <span>Gamification Engine</span>
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
                    <span>JWT (jjwt 0.12)</span>
                    <span>REST Architecture</span>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
