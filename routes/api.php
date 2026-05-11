<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PurchaseStatusController;

Route::prefix('v1')
    ->middleware('kpos.api')
    ->group(function () {
        Route::post('/purchase-status', [PurchaseStatusController::class, 'update']);
    });
