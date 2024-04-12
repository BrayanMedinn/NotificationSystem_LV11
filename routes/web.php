<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;


// Inicio y envio de notificación

Route::get('/', [HomeController::class, 'Types']);

Route::get('/nueva-categoria', function () {
    return view('AddCategories');
});
Route::get('/nueva-notificacion', function () {
    return view('AddNotifications');
});

Route::post('/send-notification', [NotificationController::class, 'send']);
Route::post('/add-category', [CategoriesController::class, 'add']);
Route::post('/add-notification', [NotificationController::class, 'add']);


// Auth
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

// Usuarios
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
