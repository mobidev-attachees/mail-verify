<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//validation routes
Route::post('/validate', [\App\Http\Controllers\ValidationController::class, 'validateEmail'])->name('validate.mail');
