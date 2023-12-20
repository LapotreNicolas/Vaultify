<?php

use App\Http\Controllers\HistoireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::resource('history', HistoireController::class);

Route::get('/history/{id}/{chapter_id}', [HistoireController::class, 'showChapter'])->name('history.showChapter');
