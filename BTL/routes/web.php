<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ChuongController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SachController;
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
    Route::resource('/danhmuc', DanhMucController::class);
    Route::resource('/sach', SachController::class);
    Route::resource('/chuong', ChuongController::class);
    Route::resource('/account', AccountController::class);
})->middleware(['auth', 'admin']);

