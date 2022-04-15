<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeluhanController;
use App\Http\Kernel;

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

Route::prefix('pelaporan')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('pelaporan-home');
    Route::get('/login', [LogInController::class, 'index'])->name('pelaporan-login')->middleware('guest');
    Route::get('/signup', [SignUpController::class, 'index'])->name('pelaporan-signup')->middleware('guest');
    Route::post('/savesignup', [SignUpController::class, 'savesignup'])->name('pelaporan-simpan-tamu')->middleware('guest');
    Route::post('/authlogin', [LogInController::class, 'authenticate'])->name('pelaporan-auth-login')->middleware('guest');
    
    Route::get('/keluhan', [KeluhanController::class, 'index'])->name('keluhan-list')->middleware('auth');
    Route::get('/newkeluhan', [KeluhanController::class, 'newkeluhan'])->name('keluhan-new')->middleware('auth');
    Route::post('/savenew', [KeluhanController::class, 'savenewkeluhan'])->name('keluhan-save')->middleware('auth');
    Route::get('/{id}/detail', [KeluhanController::class, 'keluhandetail'])->name('keluhan-detail')->middleware('auth');
    Route::get('/{id}/edit', [KeluhanController::class, 'keluhanedit'])->name('keluhan-edit')->middleware('auth');
    Route::post('/{id}/saveedit', [KeluhanController::class, 'saveedit'])->name('keluhan-saveedit')->middleware('auth');
    Route::post('/{id}/delete', [KeluhanController::class, 'deletekeluhan'])->name('keluhan-delete')->middleware('auth');
});

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'login'])->name('admin-login')->middleware('guest:admins');
    Route::post('/adminlogin', [AdminController::class, 'authenticate'])->name('admin-auth-login')->middleware('guest:admins');
    Route::group(['middleware' =>'auth:admins'], function(){
    Route::get('/home', [AdminController::class, 'index'])->name('admin-home');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan-list')->middleware('auth');
    Route::get('/detaillaporan/{id}',[AdminController::class,'detaillaporan'])->name('detaillaporan')->middleware('auth');
    Route::get('/editlaporan/{id}',[AdminController::class,'editlaporan'])->name('editlaporan')->middleware('auth');
    Route::post('/saveeditlaporan/{id}',[AdminController::class,'saveeditlaporan'])->name('saveeditlaporan')->middleware('auth');
    Route::get('/deletelaporan/{id}',[AdminController::class,'deletelaporan'])->name('deletelaporan')->middleware('auth');
    });
    Route::post('/logout', [LogInController::class, 'logout'])->name('pelaporan-logout');
    Route::post('/adminlogout', [AdminController::class, 'logout'])->name('admin-logout');
});

Route::prefix('/profile')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile-profile')->middleware('auth');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile-edit')->middleware('auth');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile-update')->middleware('auth');
});
