<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;


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
Route::get('/dashboard',  [DashboardController::class, 'dashboard_data'])->middleware(['auth'])->name('dashboard');
Route::get('/navigation',  [DashboardController::class, 'dashboard_notification']);
Route::post('/subscribe', [SubscriptionController::class, 'newSubscription']);

require __DIR__.'/auth.php';
