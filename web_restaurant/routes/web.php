<?php

use App\Http\Controllers\addResFunc;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/header', function () {
    return view('header');
   // return 'restaurant';
});

Route::get('/footer', function () {
    return view('footer');
   // return 'restaurant';
<<<<<<< HEAD
});
=======
});

Route::middleware(['auth:sanctum', 'verified'])->get('/addRes', function () {
    return view('addRes');
})->name('addRes');


Route::post('add', [addResFunc::class, 'add']);
>>>>>>> 898d42667c810128b112ab3beb63695299860c67
