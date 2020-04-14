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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin Management
Route::prefix('/admin')->namespace('Admin')->group(function () {

//    Admin Login Route
    Route::match(['get', 'post'], '/login', 'AdminController@login');

//    Route Middleware is admin
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', 'AdminController@index');
    });


});
