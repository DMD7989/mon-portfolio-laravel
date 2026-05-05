<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Ultra-Premium - Djimé Dembélé</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        :root {
            --bg-body: #09090b; --cv-bg: #0f1115; --sidebar-bg: rgba(255, 255, 255, 0.02);
            --border-color: rgba(255, 255, 255, 0.08); --text-main: #f8fafc; --text-muted: #94a3b8;
            --primary: #3b82f6; --accent: #8b5cf6; --gradient: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }

        body { font-family: 'Inter', sans-serif; background-color: var(--bg-body); color: var(--text-main); margin: 0; padding: 40px 20px; display: flex; flex-direction: column; align-items: center; }
        .glow-bg { position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, rgba(139,92,246,0.05) 40%, transparent 70%); z-index: -1; pointer-events: none; }
        .action-bar { width: 100%; max-width: 1050px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: rgba(9, 9, 11, 0.8); padding: 15px 25px; border-radius: 12px; border: 1px solid var(--border-color); backdrop-filter: blur(10px); box-sizing: border-box; }
        .action-bar a { color: var(--text-muted); text-decoration: none; font-weight: 500; transition: color 0.3s; }
        .action-bar a:hover { color: var(--text-main); }
        .btn-download { background: var(--gradient); color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 0.95rem; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); transition: all 0.3s; }
        .btn-download:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4); }

        #cv-content { background: var(--cv-bg); width: 100%; max-width: 1050px; border-radius: 16px; border: 1px solid var(--border-color); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); display: flex; flex-direction: row; overflow: hidden; box-sizing: border-box; }

        /* SIDEBAR (Élargie légèrement pour accueillir plus de contenu) */
        .cv-sidebar { width: 36%; background: var(--sidebar-bg); border-right: 1px solid var(--border-color); padding: 50px 30px; box-sizing: border-box; display: flex; flex-direction: column; }
        .avatar-container { text-align: center; margin-bottom: 30px; }
        .avatar { width: 130px; height: 130px; border-radius: 50%; background: var(--gradient); display: flex; align-items: center; justify-content: center; font-size: 3rem; font-weight: 800; color: white; margin: 0 auto 15px auto; box-shadow: 0 0 25px rgba(59, 130, 246, 0.4); border: 4px solid var(--cv-bg); }
        .sidebar-name { font-size: 2.2rem; font-weight: 900; margin: 0 0 5px 0; text-align: center; line-height: 1.1;}
        .sidebar-job { font-size: 1.1rem; color: var(--primary); font-weight: 500; text-align: center; margin: 0 0 40px 0; }

        .contact-list { display: flex; flex-direction: column; gap: 15px; margin-bottom: 40px; }
        .contact-item { display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: #cbd5e1; }
        .contact-icon { background: rgba(255,255,255,0.05); padding: 8px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.1); color: var(--primary); }

        .sidebar-title { font-size: 1rem; text-transform: uppercase; letter-spacing: 2px; color: white; border-bottom: 1px solid var(--border-color); padding-bottom: 10px; margin-bottom: 20px; font-weight: 700; }

        .skill-group { margin-bottom: 20px; }
        .skill-group p { margin: 0 0 10px 0; font-size: 0.85rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; }
        .skills-badges { display: flex; flex-wrap: wrap; gap: 8px; }

        /* Badges techniques (Bleu) */
        .badge { background: rgba(59, 130, 246, 0.1); color: #93c5fd; border: 1px solid rgba(59, 130, 246, 0.2); padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; }

        /* Badges Soft Skills (Violet / Accent) */
        .badge-soft { background: rgba(139, 92, 246, 0.1); color: #c4b5fd; border: 1px solid rgba(139, 92, 246, 0.2); padding: 6px 12px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; }

        /* MAIN CONTENT */
        .cv-main { width: 64%; padding: 50px 40px; box-sizing: border-box; }
        .profile-summary { font-size: 1rem; color: var(--text-muted); line-height: 1.8; margin-bottom: 40px; text-align: justify; }
        .section-header { display: flex; align-items: center; gap: 15px; margin-bottom: 30px; margin-top: 40px; }

        .section-icon { background: var(--gradient); width: 35px; height: 35px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3); }

        .section-header h3 { font-size: 1.4rem; font-weight: 800; margin: 0; color: white; text-transform: uppercase; letter-spacing: 1px; }
        .timeline { border-left: 2px solid rgba(59, 130, 246, 0.2); padding-left: 25px; margin-left: 15px; }
        .timeline-item { position: relative; margin-bottom: 35px; }
        .timeline-item:last-child { margin-bottom: 0; }
        .timeline-item::before { content: ''; position: absolute; left: -32px; top: 5px; width: 12px; height: 12px; border-radius: 50%; background: var(--primary); box-shadow: 0 0 12px var(--primary); }
        .tl-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px; }
        .tl-title { font-size: 1.2rem; font-weight: 800; margin: 0; color: white; }
        .tl-date { font-size: 0.85rem; color: #93c5fd; font-weight: 600; padding: 4px 10px; background: rgba(59, 130, 246, 0.1); border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.2); white-space: nowrap; }
        .tl-subtitle { font-size: 0.95rem; color: var(--accent); margin: 0 0 10px 0; font-weight: 600; }
        .tl-desc { font-size: 0.95rem; color: var(--text-muted); line-height: 1.7; margin: 0; text-align: justify; }
        .ref-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; background: rgba(255,255,255,0.02); padding: 20px; border-radius: 12px; border: 1px solid var(--border-color); }
        .ref-item p { margin: 0; line-height: 1.6; }

        @media (max-width: 768px) {
            #cv-content { flex-direction: column; }
            .cv-sidebar { width: 100%; border-right: none; border-bottom: 1px solid var(--border-color); padding: 40px 20px; }
            .cv-main { width: 100%; padding: 40px 20px; }
            .tl-header { flex-direction: column; gap: 5px; }
            .ref-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="glow-bg"></div>

    <div class="action-bar">
        <a href="/">&larr; Retour au Portfolio</a>
        <button class="btn-download" onclick="downloadPDF()">📥 Exporter le CV en PDF</button>
    </div>

    <div id="cv-content">

        <div class="cv-sidebar">
            <div class="avatar-container">
                <div class="avatar">DD</div>
                <h1 class="sidebar-name">Djimé<br>Dembélé</h1>
                <p class="sidebar-job">Développeur Full Stack</p>
            </div>

            <div class="contact-list">
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    Bamako, Mali
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    +223 97 08 82 04
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>
                    </div>
                    github.com/DMD7989
                </div>
            </div>

            <h3 class="sidebar-title">Expertise Tech</h3>

            <div class="skill-group">
                <p>Backend & Base de données</p>
                <div class="skills-badges">
                    <span class="badge">Spring Boot</span>
                    <span class="badge">Java 21</span>
                    <span class="badge">Laravel</span>
                    <span class="badge">MySQL</span>
                </div>
            </div>

            <div class="skill-group">
                <p>Frontend & Mobile</p>
                <div class="skills-badges">
                    <span class="badge">Angular / TS</span>
                    <span class="badge">Flutter / Dart</span>
                </div>
            </div>

            <h3 class="sidebar-title" style="margin-top: 30px;">Soft Skills</h3>
            <div class="skill-group">
                <div class="skills-badges">
                    <span class="badge-soft">Résolution de problèmes</span>
                    <span class="badge-soft">Travail en équipe</span>
                    <span class="badge-soft">Adaptabilité</span>
                    <span class="badge-soft">Veille Technologique</span>
                    <span class="badge-soft">Autonomie</span>
                </div>
            </div>

            <h3 class="sidebar-title" style="margin-top: 30px;">Langues</h3>
            <div style="font-size: 0.9rem; color: #cbd5e1; line-height: 1.8;">
                <div style="display: flex; justify-content: space-between;"><strong>Bambara</strong> <span>Maternelle</span></div>
                <div style="display: flex; justify-content: space-between;"><strong>Français</strong> <span>Courant</span></div>
                <div style="display: flex; justify-content: space-between;"><strong>Anglais</strong> <span>Technique</span></div>
            </div>

            <h3 class="sidebar-title" style="margin-top: 30px;">Centres d'intérêt</h3>
            <div style="font-size: 0.9rem; color: #cbd5e1; line-height: 2;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="color: var(--primary);">💻</span> Contribution Open Source
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="color: var(--primary);">🎨</span> Veille UI/UX Design
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="color: var(--primary);">🤖</span> Nouvelles Technologies
                </div>
            </div>
        </div>

        <div class="cv-main">

            <p class="profile-summary">
                Passionné par l'ingénierie logicielle et la résolution de problèmes complexes. Fort d'une solide formation académique (Master MIAGE) et d'une expertise technique Full Stack & Mobile, je conçois des architectures robustes et sécurisées. Mon approche est centrée sur la qualité du code, l'expérience utilisateur et l'atteinte des objectifs métiers.
            </p>

            <div class="section-header">
                <div class="section-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                </div>
                <h3>Projets Phares</h3>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">CollabDev</h4>
                        <span class="tl-date">Plateforme Web</span>
                    </div>
                    <p class="tl-subtitle">Angular | Spring Boot | Gamification | RBAC</p>
                    <p class="tl-desc">
                        Développement d'une plateforme de co-création de projets numériques. Implémentation d'un moteur de gamification (gains de pièces, badges) et d'une gestion fine des droits d'accès basée sur les rôles (RBAC) avec système de notifications en temps réel pour le suivi des validations.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">MussoDeme (Écosystème)</h4>
                        <span class="tl-date">API & App Mobile (v2.0)</span>
                    </div>
                    <p class="tl-subtitle">Spring Boot 3.5 | Java 21 | Flutter | JWT</p>
                    <p class="tl-desc">
                        Conception d'une plateforme d'autonomisation pour les femmes rurales. Création d'une API REST sécurisée gérant un module E-Commerce et des coopératives. Architecture orientée 12 Factor App et développement de l'application mobile multiplateforme en Flutter.
                    </p>
                </div>
            </div>

            <div class="section-header">
                <div class="section-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <h3>Expérience Professionnelle</h3>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">Développeur</h4>
                        <span class="tl-date">2023 – 2026</span>
                    </div>
                    <p class="tl-desc">
                        Développement de bout en bout d'applications. Création d'API RESTful (Spring Boot, Laravel) et intégration d'interfaces interactives (Angular, Flutter). Modélisation UML, optimisation de bases de données SQL et travail collaboratif Agile.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">Gestionnaire de Boutique</h4>
                        <span class="tl-date">2020 – 2022</span>
                    </div>
                    <p class="tl-desc">
                        Gestion complète des stocks, analyse des ventes, relation client et résolution de problèmes en temps réel.
                    </p>
                </div>
            </div>

            <div class="section-header">
                <div class="section-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                </div>
                <h3>Formation</h3>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">Master 1 en MIAGE</h4>
                        <span class="tl-date">2025 – Présent</span>
                    </div>
                    <p class="tl-subtitle" style="margin: 0;">INTEC SUP</p>
                </div>

                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">Développement Full Stack</h4>
                        <span class="tl-date">Fév - Déc 2025</span>
                    </div>
                    <p class="tl-subtitle" style="margin: 0;">Orange Digital Center</p>
                </div>

                <div class="timeline-item">
                    <div class="tl-header">
                        <h4 class="tl-title">Licence en Génie Logiciel</h4>
                        <span class="tl-date">2023 – 2024</span>
                    </div>
                    <p class="tl-subtitle" style="margin: 0;">Technolab-ISTA</p>
                </div>
            </div>

            <div class="section-header">
                <div class="section-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3>Références</h3>
            </div>

            <div class="ref-grid">
                <div class="ref-item">
                    <p><strong style="color: white; font-size: 1.05rem;">Fatoumata Kaloga</strong></p>
                    <p style="color: var(--primary); font-size: 0.9rem;">+223 76 14 50 34</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('cv-content');

            const opt = {
                margin:       0,
                filename:     'Djime_Dembele_CV.pdf',
                image:        { type: 'jpeg', quality: 1 },
                html2canvas:  {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: '#0f1115',
                    logging: false
                },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
