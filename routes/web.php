<?php

use EvoManager\Http\Controllers\AppController;
use EvoManager\Http\Controllers\AuthController;
use EvoManager\Http\Controllers\ConfigurationController;
use EvoManager\Http\Controllers\DashboardController;
use EvoManager\Http\Controllers\ElementsController;
use EvoManager\Http\Controllers\TemplateController;
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

Route::middleware('auth:web')->group(fn() => [
    Route::withoutMiddleware(['auth:web'])->match(['post', 'get'], 'login', [AuthController::class, 'login'])
        ->name('login'),
    Route::withoutMiddleware(['auth:web'])->match(['post', 'get'], 'logout', [AuthController::class, 'logout'])
        ->name('logout'),

    Route::get('/', [AppController::class, 'index'])->name('home'),

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'),
    Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration'),

    Route::get('/elements/{element}', [ElementsController::class, 'index'])->name('elements'),

    Route::apiResource('templates', TemplateController::class),
]);
