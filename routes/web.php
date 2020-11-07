<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//userlike
Route::post('/react', [\App\Http\Controllers\UserlikeController::class,'index'])->name('user.react');

//Close user

Route::get('/close-users', [App\Http\Controllers\HomeController::class, 'closeUser'])->name('users.close');




//UserProfile
Route::get('User/Profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile.user');
Route::post('User/Update/Profile', [\App\Http\Controllers\ProfileController::class,'Update'])->name('update.user');

//Password

Route::get('User/Password',[\App\Http\Controllers\ProfileController::class,'Password'])->name('change.password');
Route::post('User/Update/Password', [\App\Http\Controllers\ProfileController::class,'PasswordUpdate'])->name('update.password');












