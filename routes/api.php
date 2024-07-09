<?php

use EvoManager\Http\Controllers\Api\TemplateController;
use EvoManager\Http\Controllers\Api\TvController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::any('/', fn() => app()->version());

Route::get('/templates/menu', [TemplateController::class, 'menu']);
Route::get('/tmplvars/menu', [TvController::class, 'menu']);
