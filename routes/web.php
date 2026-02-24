<?php
use App\Http\Controllers\SnippetController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/snippets/creer', [SnippetController::class, 'create']);

Route::post('/snippets', [SnippetController::class, 'store']);

Route::get('/mon-cv', function () {
    return view('cv');
});

Route::get('/snippets', [SnippetController::class, 'index']);

// Afficher le formulaire de modification
Route::get('/snippets/{snippet}/editer', [SnippetController::class, 'edit']);

// Mettre à jour les données dans la base
Route::put('/snippets/{snippet}', [SnippetController::class, 'update']);

// Supprimer le code
Route::delete('/snippets/{snippet}', [SnippetController::class, 'destroy']);
