<?php

use App\Http\Controllers\GoogleSheetsController;
use Illuminate\Support\Facades\Route;

Route::post('/api', [GoogleSheetsController::class, 'appendRow']);
Route::get('/', function() { 
    return view('main2');
});