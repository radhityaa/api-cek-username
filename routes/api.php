<?php

use App\Http\Controllers\Api\CekAccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('verifyApiKey')->group(function () {
    Route::prefix('v1/cek-account')->group(function () {
        Route::post('mobile-legends', [CekAccountController::class, 'mobileLegends']);
        Route::post('free-fire', [CekAccountController::class, 'freeFire']);
        Route::post('arena-of-valor', [CekAccountController::class, 'Aov']);
        Route::post('valorant', [CekAccountController::class, 'Valorant']);
        Route::post('call-of-duty-mobile', [CekAccountController::class, 'Cod']);
        Route::post('point-blank', [CekAccountController::class, 'Pb']);
        Route::post('super-sus', [CekAccountController::class, 'Sus']);
    });
});
