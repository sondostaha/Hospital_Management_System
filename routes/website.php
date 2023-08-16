<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WebSite Routes
|--------------------------------------------------------------------------
|
| Here is where you can register website routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "website" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
