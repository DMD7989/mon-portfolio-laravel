<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Snippets - Djimé.dev</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />

    <style>
        :root {
            --bg-color: #09090b; --card-bg: rgba(255, 255, 255, 0.03); --card-border: rgba(255, 255, 255, 0.05);
            --text-main: #f8fafc; --text-muted: #94a3b8; --primary: #3b82f6; --gradient: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); margin: 0; padding: 40px 20px; }
        .glow-bg { position: fixed; top: 0; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 60%); z-index: -1; pointer-events: none; }

        .header { max-width: 1000px; margin: 0 auto 40px auto; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { margin: 0; font-size: 2rem; background: var(--gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .btn-add { background: rgba(59, 130, 246, 0.1); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3); padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s; }
        .btn-add:hover { background: rgba(59, 130, 246, 0.2); }
        .btn-home { color: var(--text-muted); text-decoration: none; font-weight: 500; margin-right: 20px;}
        .btn-home:hover { color: white; }

        .snippets-grid { max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; gap: 40px; }

        .snippet-card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 12px; overflow: hidden; backdrop-filter: blur(10px); }
        .snippet-header { display: flex; justify-content: space-between; align-items: center; padding: 15px 25px; border-bottom: 1px solid var(--card-border); background: rgba(0,0,0,0.2); }
        .snippet-title { font-size: 1.1rem; font-weight: 600; margin: 0; color: #e2e8f0; }
        .snippet-lang { background: rgba(255,255,255,0.1); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; color: #cbd5e1; }

        /* Personnalisation de la zone de code */
        pre[class*="language-"] { margin: 0 !important; border-radius: 0 0 12px 12px !important; background: transparent !important; padding: 25px !important; font-size: 0.95rem; }

        .empty-state { text-align: center; padding: 60px 20px; color: var(--text-muted); }
    </style>
</head>
<body>
    <div class="glow-bg"></div>

    <div class="header">
        <div>
            <a href="/" class="btn-home">&larr; Accueil</a>
            <h1>Mon Carnet de Code</h1>
        </div>
        <a href="/snippets/creer" class="btn-add">+ Nouveau Snippet</a>
    </div>

    <div class="snippets-grid">
        @if($snippets->count() > 0)
            @foreach($snippets as $snippet)
                <div class="snippet-card">
                    <div class="snippet-header">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <h3 class="snippet-title">{{ $snippet->title }}</h3>
                            <span class="snippet-lang">{{ $snippet->language }}</span>
                        </div>

                        <div style="display: flex; gap: 10px;">
                            <a href="/snippets/{{ $snippet->id }}/editer" style="background: rgba(255,255,255,0.1); color: #cbd5e1; text-decoration: none; padding: 5px 12px; border-radius: 6px; font-size: 0.85rem; transition: background 0.3s;">✏️ Modifier</a>

                            <form action="/snippets/{{ $snippet->id }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Es-tu sûr de vouloir supprimer ce code ?')" style="background: rgba(239, 68, 68, 0.1); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.2); padding: 5px 12px; border-radius: 6px; font-size: 0.85rem; cursor: pointer; transition: all 0.3s;">🗑️ Supprimer</button>
                            </form>
                        </div>
                    </div>
                    <pre><code class="language-{{ $snippet->language }}">{{ $snippet->code }}</code></pre>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <h2>Oups, c'est un peu vide ici !</h2>
                <p>Tu n'as pas encore sauvegardé de bout de code.</p>
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-java.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-dart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-typescript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js"></script>
</body>
</html>
