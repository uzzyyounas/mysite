<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SoftwareHouseController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');

Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}',     [SoftwareHouseController::class, 'projectDetail'])->name('project.detail');

Route::get('/contact', [PortfolioController::class, 'contactPage'])->name('contact.page');

Route::get('/services',            [SoftwareHouseController::class, 'services'])->name('services');
Route::get('/services/{slug}',     [SoftwareHouseController::class, 'serviceDetail'])->name('service.detail');


Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact');
Route::get('/download-cv', [PortfolioController::class, 'downloadCV'])->name('cv.download');

// Sitemap Generation
Route::get('/sitemap.xml', function () {
    $pages = [
        (object)['loc' => route('home'), 'priority' => '1.0', 'freq' => 'weekly'],
        (object)['loc' => route('about'), 'priority' => '0.9', 'freq' => 'monthly'],
        (object)['loc' => route('skills'), 'priority' => '0.8', 'freq' => 'monthly'],
        (object)['loc' => route('experience'), 'priority' => '0.8', 'freq' => 'monthly'],
        (object)['loc' => route('projects'), 'priority' => '0.9', 'freq' => 'weekly'],
        (object)['loc' => route('contact.page'), 'priority' => '0.7', 'freq' => 'monthly'],
    ];

    return response()->view('sitemap', compact('pages'))->header('Content-Type', 'text/xml');
});

// Robots.txt
Route::get('/robots.txt', function () {
    return response()->view('robots')->header('Content-Type', 'text/plain');
});
