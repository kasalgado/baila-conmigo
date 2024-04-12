<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/contact', ContactController::class)->except('edit', 'updated');

Route::resource('/profile', ProfileController::class)->only('index', 'show')->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::get('/search', [SearchController::class, 'index'])->name('search')->middleware('auth');
Route::post('/search/list', [SearchController::class, 'list'])->name('search.list')->middleware('auth');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('/register', RegisterController::class)->only('create', 'store');
Route::resource('/address', AddressController::class)->only('create', 'store');
Route::resource('/message', MessageController::class)->only('index', 'show', 'create', 'store', 'destroy')->middleware('auth');