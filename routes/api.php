<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/pages', [PageController::class, 'index']);
Route::post('/pages', [PageController::class, 'store']);
Route::delete('/pages/{id}', [PageController::class, 'destroy']);
Route::get('/pages/{id}/edit', [PageController::class, 'edit']);
Route::put('/pages/{id}', [PageController::class, 'update']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function () {
    return response()->json(['message' => 'Test API is working!']);
});