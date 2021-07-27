<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/players/{id}', [PlayerController::class, 'index']);
