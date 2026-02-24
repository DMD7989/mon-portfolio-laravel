<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Snippet - Djimé.dev</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Même style Premium que la page de création */
        :root { --bg-color: #09090b; --card-bg: rgba(255, 255, 255, 0.03); --card-border: rgba(255, 255, 255, 0.05); --text-main: #f8fafc; --text-muted: #94a3b8; --primary: #3b82f6; --gradient: linear-gradient(135deg, #f59e0b, #ef4444); }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-color); color: var(--text-main); margin: 0; padding: 40px 20px; display: flex; flex-direction: column; align-items: center; min-height: 100vh; }
        .glow-bg { position: fixed; top: 10%; left: 50%; transform: translateX(-50%); width: 800px; height: 800px; background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 70%); z-index: -1; pointer-events: none; }
        .nav-bar { width: 100%; max-width: 700px; display: flex; justify-content: space-between; margin-bottom: 30px; }
        .nav-bar a { color: var(--text-muted); text-decoration: none; font-weight: 500; transition: color 0.3s; }
        .nav-bar a:hover { color: var(--text-main); }
        .form-container { background: var(--card-bg); width: 100%; max-width: 700px; padding: 40px; border-radius: 16px; border: 1px solid var(--card-border); backdrop-filter: blur(10px); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); box-sizing: border-box; }
        .form-container h2 { margin-top: 0; margin-bottom: 30px; font-size: 1.8rem; font-weight: 700; background: var(--gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .input-group { margin-bottom: 25px; }
        label { display: block; margin-bottom: 8px; font-size: 0.95rem; font-weight: 500; color: #cbd5e1; }
        input, select, textarea { width: 100%; padding: 14px; background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.3s; box-sizing: border-box; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #f59e0b; box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2); background: rgba(0,0,0,0.4); }
        select option { background-color: var(--bg-color); color: white; }
        textarea { font-family: 'Consolas', 'Courier New', monospace; min-height: 200px; resize: vertical; color: #fde68a; }
        .btn-submit { width: 100%; padding: 16px; background: var(--gradient); color: white; border: none; border-radius: 8px; font-size: 1.05rem; font-weight: 600; cursor: pointer; transition: all 0.3s; margin-top: 10px; }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 20px -10px rgba(245,158,11,0.5); }
    </style>
</head>
<body>
    <div class="glow-bg"></div>

    <div class="nav-bar">
        <a href="/snippets">&larr; Retour à la galerie</a>
    </div>

    <div class="form-container">
        <h2>Modifier le Snippet ✍️</h2>

        <form action="/snippets/{{ $snippet->id }}" method="POST">
            @csrf
            @method('PUT') <div class="input-group">
                <label for="title">Titre de l'extrait</label>
                <input type="text" id="title" name="title" value="{{ $snippet->title }}" required>
            </div>

            <div class="input-group">
                <label for="language">Langage / Technologie</label>
                <select id="language" name="language">
                    <option value="php" {{ $snippet->language == 'php' ? 'selected' : '' }}>Laravel / PHP</option>
                    <option value="java" {{ $snippet->language == 'java' ? 'selected' : '' }}>Spring Boot / Java</option>
                    <option value="dart" {{ $snippet->language == 'dart' ? 'selected' : '' }}>Flutter / Dart</option>
                    <option value="typescript" {{ $snippet->language == 'typescript' ? 'selected' : '' }}>Angular / TypeScript</option>
                    <option value="sql" {{ $snippet->language == 'sql' ? 'selected' : '' }}>SQL</option>
                    <option value="javascript" {{ $snippet->language == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                </select>
            </div>

            <div class="input-group">
                <label for="code">Le Code</label>
                <textarea id="code" name="code" required spellcheck="false">{{ $snippet->code }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Mettre à jour mon code</button>
        </form>
    </div>
</body>
</html>
