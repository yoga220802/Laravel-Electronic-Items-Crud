<?php

use App\Http\Controllers\ElectronicItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('electronic-items.index');
});

Route::resource('electronic-items', ElectronicItemController::class);

