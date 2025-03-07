<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/profile/{nama}/{kelas}/{npm}',
[UserController::class, 'profile']);

Route::get('/user/profile', action: [UserController::class, 'profile']);

Route::get('/user/create', action: [UserController::class, 'create']);

Route::post('/user/store', action: [UserController::class, 'store'])->name('user.store');