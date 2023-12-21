<?php

use App\Http\Controllers\HistoireController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\WriterController;

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
    return view('accueil');
})->name("index");

Route::get('/accueil', [HomeController::class, 'accueil'])->name('accueil');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::resource('story', HistoireController::class);

Route::post('/story/{id}/upload', [HistoireController::class, 'upload'])->name('story.upload');

Route::resource('users', UserController::class)->only('show');

Route::get('/story/{id}/{chapter_id}', [HistoireController::class, 'showChapter'])->name('history.showChapter');

Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe.index');

Route::post('/comAdd',[HistoireController::class, 'storeAvis'])->name('storeAvis');

Route::get('/profil',[UserController::class, 'profil'])->middleware(['auth'])->name('profil');

Route::get('/story/encours/{id}', [HistoireController::class, 'createChapitre'])->name('createChapitre');

Route::post('/story/encours/{id}/storeChapitre',[HistoireController::class, 'storeChapitre'])->name('storeChapitre');

Route::post('/story/encours/{id}/lienChapitre',[HistoireController::class, 'lienChapitre'])->name('lienChapitre');