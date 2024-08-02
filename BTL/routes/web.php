<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// MARK: - Admin
Route::group([
    'prefix' => 'admin',
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('/book', BookController::class);
    Route::resource('/chapter', ChapterController::class);
    Route::resource('/account', AccountController::class);
})->middleware(['auth', 'admin']);

