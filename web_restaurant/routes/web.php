<?php

use App\Http\Controllers\addController;
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
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/addRes', function () {
    return view('addRes');
})->name('addRes');

Route::get('/header', function () {
    return view('header');
    // return 'restaurant';
});

Route::get('/footer', function () {
    return view('footer');
    // return 'restaurant';
});

Route::get('logout', [addController::class, 'logout']);
Route::post('add', [addController::class, 'add']);
Route::get('dashboard',[addController::class, 'index']);

Route::get('viewRes/{id}', [addController::class, 'viewRes']);
