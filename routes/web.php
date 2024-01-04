<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by theRouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    sleep(2);
    return view('welcome');
});

Route::get('/status', function () {
    sleep(3);
    return view('welcome');
});

Route::get('/contact', function () {
    sleep(2);
    return view('welcome');
});

Route::get('/export', function () {
    sleep(2);
    return view('welcome');
});

Route::get('/premium', function () {
    sleep(2);
    return view('welcome');
});

Route::get('/api', function () {
    sleep(2);
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
