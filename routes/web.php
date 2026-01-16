<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');

Route::get('/registration', [\App\Http\Controllers\PageController::class, 'registration'])->name('registration');
Route::post('/reg', [\App\Http\Controllers\UserController::class, 'reg'])->name('reg');
Route::get('/authorization', [\App\Http\Controllers\PageController::class, 'authorization'])->name('authorization');
Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/admin/tour', [\App\Http\Controllers\TourController::class, 'index'])->name('admin.tour');
Route::post('/admin/tour', [\App\Http\Controllers\TourController::class, 'store'])->name('admin.tour.store');

Route::post('/admin/city/store', [\App\Http\Controllers\CityController::class, 'store'])->name('admin.city.store');
