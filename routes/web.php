<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RomanToNumController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/romantonum/{romanNum}', [RomanToNumController::class, 'convert']);
