<?php

use App\Http\Controllers\BrewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BrewController::class, 'home'])->name('home');
Route::get('/brew/{brew}', [BrewController::class, 'show'])->name('brew');
