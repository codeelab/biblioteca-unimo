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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'HomeController@authenticationValidateAdmin')->name('admin.route')->middleware('admin');
Route::get('admin/users', 'AdminController@index')->middleware('admin');
Route::get('admin/crear', 'AdminController@crear')->middleware('admin');
Route::resource('users', 'UsersController');
Route::post('admin/crear', 'UsersController@store')->name('crear');