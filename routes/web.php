<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware('auth', 'admin');
Route::resource('/post', 'App\Http\Controllers\PostController')->middleware('auth');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
      Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->middleware('auth')->name('admin.home');
      Route::namespace('App\Http\Controllers\Admin\Auth')->group(function () {
            Route::get('/login', 'LoginController@showLoginForm')
                  ->name('admin.login');
            Route::post('logout', 'LoginController@logout')
                  ->name('admin.logout');
            Route::post('/login', 'LoginController@login');
      });
});
