<?php

use App\Http\Controllers\pendaftaran\pendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(pendaftaranController::class)->group(function () {
    Route::get('afirmasi', 'index');
});