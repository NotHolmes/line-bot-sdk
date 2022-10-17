<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/liff', [\App\Http\Controllers\LineWebHookController::class, 'liff']);

Route::get('/liff/login', [\App\Http\Controllers\LineWebHookController::class, 'login']);

Route::get('/liff/logout', [\App\Http\Controllers\LineWebHookController::class, 'logout']);
