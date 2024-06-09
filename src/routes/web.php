<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ShopController;
use Laravel\Fortify\Features;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [UserController::class, 'showRegistrationForm'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/register', [UserController::class, 'store'])
    ->middleware(['guest']);

Route::get('/thanks', function() {
    return view('thanks');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserController::class, 'login'])->middleware(['guest']);


Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('home');
});

Route::get('/', [ShopController::class, 'index']);

Route::get('/detail', [ShopController::class, 'detail']);

Route::get('/mypage', [ShopController::class, 'mypage']);

Route::get('/done', [ShopController::class, 'done']);



