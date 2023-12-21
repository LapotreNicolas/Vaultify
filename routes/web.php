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

Route::get('/',[HistoireController::class, 'accueil'])->name("index");

Route::get('/accueil', [HistoireController::class, 'accueil'])->name('accueil');

Route::resource('story', HistoireController::class);

Route::post('/story/{id}/upload', [HistoireController::class, 'upload'])->name('story.upload');

Route::get('/chapter/{chapter_id}', [HistoireController::class, 'showChapter'])->name('story.showChapter');

Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe');

Route::post('/comAdd',[HistoireController::class, 'storeAvis'])->name('storeAvis');

Route::post('/profil', [HistoireController::class, 'changeActive'])->name('story.changeActive');

Route::get('/encours/{id}', [HistoireController::class, 'createChapitre'])->name('createChapitre');

Route::post('/encours/{id}/storeChapitre',[HistoireController::class, 'storeChapitre'])->name('storeChapitre');

Route::post('/encours/{id}/lienChapitre',[HistoireController::class, 'lienChapitre'])->name('lienChapitre');

Route::resource('users', UserController::class)->only('show');

Route::get('/profil',[UserController::class, 'profil'])->middleware(['auth'])->name('profil');

Route::post('/upload', [UserController::class, 'upload'])->name('users.upload');