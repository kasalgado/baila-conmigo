<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::resource('/profile', ProfileController::class)->only('index', 'show');
Route::resource('/user', UserController::class);
Route::resource('/contact', ContactController::class)->except('edit', 'updated');
Route::get('/search', [SearchController::class, 'index']);
Route::post('/search/list', [SearchController::class, 'list']);