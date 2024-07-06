<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MenuController;
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


Route::get('/', [ShopController::class, 'index'])->name('home');

//Route::post('/', [ShopController::class, 'store'])->name('store');

Route::get('/', [ShopController::class, 'search'])->name('shop.search');

Route::get('/detail/{restaurant_id}', [ShopController::class, 'detail'])->name('detail');

Route::post('/detail/{restaurant_id}', [ShopController::class, 'reserve'])->name('reserve');

Route::middleware('auth')->group(function () {
    Route::post('/favorite/add/{restaurant_id}', [ShopController::class, 'add'])->name('favorite.add');
    Route::post('/favorite/remove/{restaurant_id}', [ShopController::class, 'remove'])->name('favorite.remove');
});

//Route::post('/favorite/{restaurant_id}/add', [ShopController::class, 'add'])->name('favorite.add');

//Route::post('/favorite/{restaurant_id}/remove', [ShopController::class, 'remove'])->name('favorite.remove');

Route::post('/reserve/{restaurant_id}', [ShopController::class, 'reserve'])->name('reserve');

Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
;

Route::get('/done', [ShopController::class, 'done'])->name('done');


Route::get('/menu', [ShopController::class, 'menu'])->name('menu');


