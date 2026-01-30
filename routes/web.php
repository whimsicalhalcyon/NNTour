<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');

Route::get('/registration', [\App\Http\Controllers\PageController::class, 'registration'])->name('registration');
Route::post('/reg', [\App\Http\Controllers\UserController::class, 'reg'])->name('reg');
Route::get('/authorization', [\App\Http\Controllers\PageController::class, 'authorization'])->name('authorization');
Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/admin/tour', [\App\Http\Controllers\TourController::class, 'index'])->name('admin.tour');
Route::post('/admin/tour/store', [\App\Http\Controllers\TourController::class, 'store'])->name('admin.tour.store');
Route::delete('/admin/tour/delete/{tour}', [\App\Http\Controllers\TourController::class, 'destroy'])->name('admin.tour.destroy');
Route::put('/admin/tour/update/{tour}', [\App\Http\Controllers\TourController::class, 'update'])->name('admin.tour.update');

Route::post('/admin/city/store', [\App\Http\Controllers\CityController::class, 'store'])->name('admin.city.store');

Route::get('/admin/sale', [\App\Http\Controllers\SaleController::class, 'index'])->name('admin.sale');
Route::post('/admin/sale/store', [\App\Http\Controllers\SaleController::class, 'store'])->name('admin.sale.store');
Route::put('/admin/sale/update/{sale}', [\App\Http\Controllers\SaleController::class, 'update'])->name('admin.sale.update');
Route::delete('/admin/sale/delete/{sale}', [\App\Http\Controllers\SaleController::class, 'destroy'])->name('admin.sale.destroy');

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::put('/profile/update', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

Route::get('/tours', [\App\Http\Controllers\TourController::class, 'show'])->name('tours');
Route::get('/booking/{tour}', [\App\Http\Controllers\TourController::class, 'view'])->name('booking.view');
