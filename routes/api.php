<?php

use App\Http\Controllers\DesaController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/desa', [DesaController::class, 'indexDesa']);
Route::get('/desa/{id}', [DesaController::class, 'detailDesa']);
Route::post('/desa', [DesaController::class, 'createDesa']);
Route::put('/desa/{id}', [DesaController::class,'editDesa']);
Route::delete('/desa/{id}',[DesaController::class,'deleteDesa']);