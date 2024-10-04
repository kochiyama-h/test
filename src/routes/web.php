<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view ('welcome');
});


Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);

Route::get('/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/thanks',[ContactController::class,'thanks']);



Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// ログインページ (Fortifyを使用)
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// 認証済みユーザーのみに管理画面へのアクセスを許可
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/details/{id}', [AdminController::class, 'show'])->name('admin.details');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});



// Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);


// Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);


// Route::middleware('auth')->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//     Route::get('/admin/details/{id}', [AdminController::class, 'show'])->name('admin.details'); Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.delete'); 
// });



