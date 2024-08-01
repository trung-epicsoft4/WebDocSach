<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChuongController;
use App\Http\Controllers\DanhMucController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SachController;

Auth::routes();

Route::get('/', function () {
    return view('user.home');
});

Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// MARK: - Admin
Route::resource('/admin/danhmuc', DanhMucController::class);
Route::resource('/admin/sach', SachController::class);
Route::resource('/admin/chuong', ChuongController::class);
Route::resource('/admin/account', AccountController::class);
