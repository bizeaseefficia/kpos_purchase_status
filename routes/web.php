<?php

use App\Http\Controllers\StatusController;

use Illuminate\Support\Facades\Route;

Route::controller(StatusController::class)
    ->group(function () {
        Route::get('/', 'index');
    });
