<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('konfigurasi/roles', RoleController::class);
    Route::resource('konfigurasi/navigation', NavigationController::class);
    Route::resource('konfigurasi/permissions', PermissionController::class);

    Route::resource('users', UserController::class);

    Route::prefix('api')->name('api.')->group(function () {
        Route::get('settings', [ApiController::class, 'setting'])->name('setting');
        Route::get('documentations', [ApiController::class, 'documentation'])->name('documentation');
        Route::post('generate', [ApiController::class, 'generate'])->name('generate');
    });

    // Route::prefix('games')->name('games.')->group(function () {
    //     Route::get('', [GameController::class, 'index'])->name('index');
    //     Route::get('create', [GameController::class, 'create'])->name('create');
    //     Route::post('', [GameController::class, 'store'])->name('store');
    // });
});
