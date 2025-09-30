<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfesionalController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/calendar', function () {
        return view('common.calendar');
    })->name('calendar');

    // CRUD de Profesionales - FORMA CORRECTA
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('profesionales', ProfesionalController::class);
    });

    Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class, 'handle']);
});