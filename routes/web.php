<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContraceptiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
});

Route::view('/login', 'auth.login')->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::group(["prefix" => "admin", "middleware" => "auth", "as" => "admin."], function () {
    Route::get('/', [DashboardController::class, 'analytics']);
    Route::resource('/admins', AdminController::class)->only('index', 'store', 'destroy');
    Route::resource('/patients', PatientController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('/announcements', NotificationController::class)->only('index', 'store', 'destroy');
    Route::resource('/contraceptive', ContraceptiveController::class)->only('index', 'store', 'destroy');
    Route::view('/settings', 'settings');
});
