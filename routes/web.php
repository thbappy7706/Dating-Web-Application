 
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

Route::get('/home', 'UserController@users')->name('home');

Route::group(['namespace'=>'Auth'], function(){

// Login Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->middleware(['guest'])->name('register');
    Route::post('register', 'RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});


Route::group(['middleware' => 'auth'], function () {

        Route::get('/users', 'UserController@users')->name('users.list');
        Route::get('/near-users', 'UserController@nearUsers')->name('near.users.list');
        Route::post('/toggleLike', 'LikeController@storeOrToggleLike')->name('like.storeOrToggle');



});

//Profile
Route::get('User/Profile','ProfileController@index')->name('profile.user');
Route::post('User/Update/Profile', 'ProfileController@Update')->name('update.user');

//Password

Route::get('User/Password','ProfileController@Password')->name('change.password');
Route::post('User/Update/Password','ProfileController@PasswordUpdate')->name('update.password');
