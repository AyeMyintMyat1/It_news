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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/','BlogController@index')->name('index');
Route::get('/detail/{slug}','BlogController@detail')->name('detail');
Route::get('/category/{id}','BlogController@baseOnCategory')->name('baseOnCategory');
Route::get('/user/{id}','BlogController@baseOnUser')->name('baseOnUser');
Route::get('/date/{date}','BlogController@baseOnDate')->name('baseOnDate');
Route::get('auth/facebook',"FacebookLoginController@redirect")->name('fb.redirect');
Route::post('facebook/callback',"FacebookLoginController@callback")->name('fb.callback');
Route::get('auth/facebook/password',"FacebookLoginController@password")->name('fb.password');
//Route::post('auth/facebook/password',"FacebookLoginController@passwordAccount")->name('fb.passwordAccount');
Route::get('auth/google',"GoogleLoginController@redirect")->name('google.redirect');
Route::get('google/callback',"GoogleLoginController@callback")->name('google.callback');
//Route::get('auth/google/password',"GoogleLoginController@password")->name('google.password');
//Route::post('auth/google/password',"GoogleLoginController@passwordAccount")->name('google.passwordAccount');


Route::prefix('dashboard')->middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('profile')->group(function (){
        Route::get('photo/edit',"ProfileController@photoEdit")->name('profile.photo.edit');
        Route::post('photo/update',"ProfileController@photoUpdate")->name('profile.photo.update');
        Route::get('profilePhoto','ProfileController@profilePhoto')->name('profile.profilePhoto');
        Route::get('changePassword','ProfileController@changePassword')->name('profile.changePassword');
        Route::post('changePasswordAccount','ProfileController@changePasswordAccount')->name('profile.changePasswordAccount');
        Route::get('changeName','ProfileController@changeName')->name('profile.changeName');
        Route::post('changeNameAccount','ProfileController@changeNameAccount')->name('profile.changeNameAccount');
        Route::get('changeEmail','ProfileController@changeEmail')->name('profile.changeEmail');
        Route::post('changeEmailAccount','ProfileController@changeEmailAccount')->name('profile.changeEmailAccount');
    });

    Route::resource('category',"CategoryController");
    Route::resource('article',"ArticleController");
});
