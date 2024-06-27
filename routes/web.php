<?php

use EvoManager\Http\Controllers\AppController;
use EvoManager\Http\Controllers\AuthController;
use EvoManager\Http\Controllers\ConfigurationController;
use EvoManager\Http\Controllers\DashboardController;
use EvoManager\Http\Controllers\ElementsController;
use EvoManager\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:web')/*->prefix('/backend')*/->group(fn() => [
    Route::withoutMiddleware(['auth:web'])->group(fn() => [
        Route::match(['post', 'get'], 'login', [AuthController::class, 'login'])->name('login'),
        Route::match(['post', 'get'], 'logout', [AuthController::class, 'logout'])->name('logout'),
    ]),

    Route::get('/', [AppController::class, 'index'])->name('home'),

    Route::get('/dashboard', [DashboardController::class, 'index']),

    Route::get('/configuration', [ConfigurationController::class, 'read']),
    Route::post('/configuration', [ConfigurationController::class, 'update']),

    Route::get('/elements/{element}', [ElementsController::class, 'index']),

    Route::apiResource('templates', TemplateController::class),
]);
