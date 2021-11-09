<?php

use App\Http\Controllers\addController;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return redirect('/dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/addRes', function () {
    return view('addRes');
})->name('addRes');

/**Route::middleware(['auth:sanctum', 'verified'])->get('resRating/{id}', function () {
    return view('resRating/{id}');
})->name('resRating/{id}');*/

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
Route::get('resRating/{id}', [addController::class, 'resRating']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
