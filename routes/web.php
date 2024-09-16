<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\TelevisionController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/radio', [RadioController::class, 'index'])->name('radio.index');
Route::get('/radio/create', [RadioController::class, 'create'])->name('radio.create');
Route::post('/radio', [RadioController::class, 'store'])->name('radio.store');

Route::get('/television', [TelevisionController::class, 'index'])->name('television.index');
Route::get('/television/create', [TelevisionController::class, 'create'])->name('television.create');
Route::post('/television', [TelevisionController::class, 'store'])->name('television.store');
Route::delete('/television/{id}', [TelevisionController::class, 'destroy'])->name('television.destroy');
//Route::delete('/radio/{id}', [RadioController::class, 'destroy'])->name('radio.destroy');

// Nouvelle route pour afficher les fichiers par catégorie avec le chemin 'fichiers'
Route::get('/fichiers/{category}', [FileController::class, 'showByCategory'])->name('fichiers.showByCategory');

// Nouvelle route pour rechercher des fichiers dans une catégorie
Route::get('/fichiers/recherche/{category}', [FileController::class, 'search'])->name('fichiers.search');

// Nouvelle route pour afficher un fichier spécifique
Route::get('/fichier/{id}', [FileController::class, 'view'])->name('fichiers.view');

// Nouvelle route pour stocker un fichier
Route::post('/fichiers/store', [FileController::class, 'store'])->name('fichiers.store');


Route::get('/test-route', function() {
    return 'Test Route OK';
});