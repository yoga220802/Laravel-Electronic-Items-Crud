<?php

use App\Http\Controllers\ElectronicItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('electronic-items', ElectronicItemController::class);