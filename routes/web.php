<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/properties', [PageController::class, 'properties'])->name('properties.all');
Route::get('/properties/{id}/{slug}', [PageController::class, 'property'])->name('properties.show');
