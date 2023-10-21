<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('login','auth.login')->name('login');
Route::view('register','auth.register')->name('register');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/register',[AuthController::class,'register'])->name('auth.register');
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::middleware('auth')->group(function(){
    Route::view('/','user.index')->name('home');
    Route::resource('/programs',ProgramController::class);
    Route::resource('/batches',BatchController::class);
    Route::resource('/students',StudentController::class);
    Route::get('/masscreate/students',[StudentController::class,'masscreate'])->name('students.masscreate');
    Route::post('/massstore/students',[StudentController::class,'massstore'])->name('students.massstore');
});

Route::get('/print/{memberid}',[IndexController::class,'print'])->name('students.print');
