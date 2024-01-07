<?php

use App\Http\Controllers\BukutamuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use App\Http\Controllers\CatatantamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();
Route::get('/', function () {
    $count = \App\Models\Bukutamu::count();
    $guest_message = \App\Models\Bukutamu::where('Status', 1)->take(6)->get();
    return view('landing-page.index', ['count' => $count, 'guest_messages' => $guest_message]);
})->name('landing');
Route::get('/home', function () {
    return view('home');
});

Route::post('/bukutamu/post', [App\Http\Controllers\BukutamuController::class, 'store'])->name('Bukutamu.post');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::resource('Bukutamu',BukutamuController::class)->except('Bukutamu.store');
    Route::get('/Message', [App\Http\Controllers\BukutamuController::class, 'indexWish'])->name('Bukutamu.message');
    Route::get('/Message/{id?}', [App\Http\Controllers\BukutamuController::class, 'updateStatus'])->name('Bukutamu.message.status');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/register', [App\Http\Controllers\HomeController::class, 'showRegistrationForm'])->name('register');

// Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'register'])->name('register');
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');


// Auth::routes();

