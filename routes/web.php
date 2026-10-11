<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/greeting', [\App\Http\Controllers\TestController::class,'ahmed']);
