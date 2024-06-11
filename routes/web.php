<?php

use App\Http\Controllers\KasController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureDataMasjidCompleted;
use Illuminate\Support\Facades\Auth;
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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout-user');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('masjid', MasjidController::class);
    Route::middleware(EnsureDataMasjidCompleted::class)->group(function () {
        Route::resource('myprofile', ProfileController::class);
        Route::resource('kas', KasController::class);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});
