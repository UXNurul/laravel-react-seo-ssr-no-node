<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

// Route::get('/data/{path?}', [PageController::class, 'getData']);
// Route::get('{path?}', [PageController::class, 'renderPage'])->where('path', '.*');


// Route::get('/', function () {
//     return view('app');
// });
