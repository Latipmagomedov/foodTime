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

Route::get('/', "App\Http\Controllers\MainController@home")->name("home");
Route::get('/menu', "App\Http\Controllers\MainController@menu")->name("menu");
Route::get('/admin', "App\Http\Controllers\MainController@admin")->name("admin");

Route::get('/admin-orders', "App\Http\Controllers\MainController@adminOrders")->name("admin-orders");
Route::get('/admin-order-remove/{id}', "App\Http\Controllers\ApplicationController@removeOrder")->name("remove-order");

Route::get('/admin-add-category', "App\Http\Controllers\MainController@adminAddCategory")->name("admin-add-category");
Route::post('/add-category', "App\Http\Controllers\AdminController@addCategory")->name("add-category");
Route::get('/remove-category/{id}', "App\Http\Controllers\AdminController@removeCategory")->name("remove-category");

Route::get('/admin-sign-in', "App\Http\Controllers\MainController@signIn")->name("admin-signin");
Route::get('/admin-sign-up', "App\Http\Controllers\MainController@signUp")->name("admin-signup");

Route::get('/menu/{category}', "App\Http\Controllers\MainController@category")->name("category");
Route::get('admin/{category}', "App\Http\Controllers\MainController@categoryAdmin")->name("categoryAdmin");

Route::post('/signup', "App\Http\Controllers\AuthController@signUp")->name("signup");
Route::post('/signin', "App\Http\Controllers\AuthController@signIn")->name("signin");
Route::get('/signout', "App\Http\Controllers\AuthController@signOut")->name("signout");

Route::post('/add-product', "App\Http\Controllers\AdminController@addProduct")->name("addproduct");
Route::get('/remove-product/{id}', "App\Http\Controllers\AdminController@removeProduct")->name("removeproduct");