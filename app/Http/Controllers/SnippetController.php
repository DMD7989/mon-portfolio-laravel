<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snippet;

class SnippetController extends Controller
{
    // Affiche TOUS les snippets (La fameuse galerie)
    public function index()
    {
        // On récupère tous les extraits, du plus récent au plus ancien
        $snippets = Snippet::orderBy('created_at', 'desc')->get();
        return view('snippets.index', compact('snippets'));
    }

    // Affiche le formulaire d'ajout
    public function create()
    {
        return view('snippets.create');
    }

    // Sauvegarde en base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'language' => 'required',
            'code' => 'required',
        ]);

        Snippet::create($validatedData);

        // NOUVEAU : Une fois sauvegardé, on va vers la page qui liste les codes !
        return redirect('/snippets');
    }

    // Affiche le formulaire pré-rempli pour modifier
    public function edit(Snippet $snippet)
    {
        return view('snippets.edit', compact('snippet'));
    }

    // Sauvegarde les modifications
    public function update(Request $request, Snippet $snippet)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'language' => 'required',
            'code' => 'required',
        ]);

        $snippet->update($validatedData);

        return redirect('/snippets');
    }

    // Supprime le snippet
    public function destroy(Snippet $snippet)
    {
        $snippet->delete();

        return redirect('/snippets');
    }
}
