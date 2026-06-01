<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::get('/download-cv', [PortfolioController::class, 'downloadCV'])->name('cv.download');
