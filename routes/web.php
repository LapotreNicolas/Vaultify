<?php

use App\Http\Controllers\HistoireController;
use App\Http\Controllers\EquipeController;
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

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::resource('story', HistoireController::class);

Route::resource('history', HistoireController::class);
Route::post('/history/{id}/upload', [HistoireController::class, 'upload'])->name('history.upload');


Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe.index');