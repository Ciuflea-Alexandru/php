<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/main', [MainController::class, 'main'])->name('main');
Route::get('/main/{page_title}', [MainController::class, 'showPage'])->name('show-page');
Route::post('/store-page', [MainController::class, 'storePage'])->name('store-page');
Route::match(['get', 'post'],'/update', [MainController::class, 'updateAllPages'])->name('update-all-pages');
Route::match(['get', 'post'],'/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);