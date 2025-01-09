<?php

use App\Http\Controllers\Dashboard\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::prefix('dashboard/')->group(function () {

// Route::resource('blogs',[BlogController::class]);

});