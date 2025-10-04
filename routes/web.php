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

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('profesionales', ProfesionalController::class)->parameters([
            'profesionales' => 'profesional'
        ]);
    });

    // Rutas de Clientes (CRUD completo)
    // Route::prefix('admin')->name('admin.')->group(function () {
    //     Route::resource('clientes', \App\Http\Controllers\Admin\ClienteController::class)->parameters([
    //         'clientes' => 'cliente'
    //     ]);
    // });
 

    Route::prefix('storage')->group(function () {
        Route::get('clientes/{filename}', function ($filename) {
            $path = Storage::disk('public')->path('clientes/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }

            if (auth()->user()->hasRole('admin')) {
                // Admin puede acceder a todas las fotos
                return response()->file($path);
            } else {
                // Usuarios normales solo pueden acceder a sus propias fotos
                $cliente = \App\Models\Cliente::where('foto', 'clientes/' . $filename)->first();

                if (!$cliente || $cliente->user_id !== auth()->id()) {
                    abort(403);
                }

                return response()->file($path);
            }
        })->where('filename', '.*');
    });


    Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class, 'handle']);
});