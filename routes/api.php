<?php

use App\Http\Controllers\Api\CekAccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('verifyApiKey')->group(function () {
    Route::prefix('v1/cek-account')->group(function () {
        Route::post('mobile-legends', [CekAccountController::class, 'mobileLegends']);
    });
});
