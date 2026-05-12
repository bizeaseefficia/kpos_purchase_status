<?php

use App\Http\Controllers\StatusController;

use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::controller(StatusController::class)
    ->group(function () {
        Route::get('/', function () {
            return Inertia::render('Top');
        });

        Route::get('/check/{token}', [StatusController::class, 'show'])
            ->name('purchase-status.show');
    });
