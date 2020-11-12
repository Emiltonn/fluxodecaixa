<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
  
Route::get('/dashboard', function () {
    return view('welcome');
});

Route::resource('entities', EntityController::class);

Route::resource('account', AccountController::class);

Route::resource('transactions', TransactionController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
