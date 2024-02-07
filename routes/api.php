<?php

use App\Http\Controllers\BrewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('brews', [BrewController::class, 'brews']);
Route::post('brews/total', [BrewController::class, 'total']);