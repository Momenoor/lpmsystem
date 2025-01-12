<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\HonorListController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\StaffController;
use App\Http\Controllers\Dashboard\StatisticsController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard/')->group(function () {

Route::resource('blogs',BlogController::class);
Route::resource('courses',CourseController::class);
Route::resource('departments',DepartmentController::class);
Route::resource('events',EventController::class);
Route::resource('galleries',GalleryController::class);
Route::resource('honorlists',HonorListController::class);
Route::resource('sittings',SettingController::class);
Route::resource('sttafs',StaffController::class);
Route::resource('sliders',SliderController::class);
Route::resource('statistics',StatisticsController::class);
Route::resource('subjects',SubjectController::class);
Route::resource('subscribers',SubscriberController::class);

});
Route::get('/language/{language}', function ($language) {
    $supportedLocales = config('app.supported_locales', ['en', 'ar']);
    if (in_array($language, $supportedLocales)) {
        session(['locale' => $language]); // Store the language in the session
        app()->setLocale($language); // Set the application's locale
    }

    return redirect()->back(); // Redirect back to the previous page
})->name('set-locale');

Route::resource('blogs', \App\Http\Controllers\Dashboard\BlogController::class);
