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

//Admin Side Routes
//Admin Dashboard
Route::get('/admin', 'DashboardController@login')->name('Admin.auth');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
});

//Tacos
Route::get('/tacos', 'TacosController@index')->name('Tacos.index');
Route::get('/create-tacos', 'TacosController@create')->name('Tacos.create');
Route::get('/tacos-edit/{tacos}', 'TacosController@edit')->name('Tacos.edit');
Route::get('/tacos-destroy/{tacos}', 'TacosController@destroy')->name('Tacos.destroy');
Route::get('/tacos/{tacos}', 'TacosController@show')->name('Tacos.read');
Route::post('/tacos-store', 'TacosController@store')->name('Tacos.store');
Route::patch('/tacos-update/{tacos}', 'TacosController@update')->name('Tacos.update');

//Drinks
Route::get('/drinks', 'DrinkController@index')->name('Drinks.index');
Route::get('/drinks/{filter}', 'DrinkController@filter')->name('Drinks.index.filter');
Route::get('/create-drink', 'DrinkController@create')->name('Drinks.create');
Route::get('/drink-destroy/{drink}', 'DrinkController@destroy')->name('Drinks.destroy');
Route::get('/drink/{id}', 'DrinkController@show')->name('Drinks.show');
Route::get('/drink-edit/{id}', 'DrinkController@edit')->name('Drinks.edit');
Route::post('/drink-store', 'DrinkController@store')->name('Drinks.store');
Route::patch('/drink-update/{drink}', 'DrinkController@update')->name('Drinks.update');

//Menus
Route::get('/menus', 'MenuController@index')->name('Menus.index');
Route::get('/menu-create', 'MenuController@create')->name('Menus.create');
Route::get('/menu/{id}', 'MenuController@show')->name('Menus.show');
Route::get('/menu-destroy/{id}', 'MenuController@destroy')->name('Menus.destroy');
Route::get('/menu-edit/{id}', 'MenuController@edit')->name('Menus.edit');
Route::post('/menu-store', 'MenuController@store')->name('Menus.store');
Route::patch('/menu-update', 'MenuController@update')->name('Menus.update');

//Auth routes
Auth::routes();


//Client Side Routes
//Landing Page
Route::get('/', 'LandingPageController@index')->name('LandingPage');

//Tacos items
Route::get('/tacos-menu', 'TacosMenuController@index')->name('TacosMenu.index');
Route::get('/tacos-search', 'TacosMenuController@search')->name('TacosMenu.search');
Route::get('/addToCart/{id}', 'CartController@store')->name('Tacos.addToCart');
// Route::get('/cart', 'CartController@index')->name('cart');



Route::get('/home', 'HomeController@index')->name('home');
