<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/profesionales', function () {
        return view('livewire.admin.profesionales');
    })->name('admin.profesionales');

    Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class, 'handle']);
});