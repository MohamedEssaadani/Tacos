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
Route::get('/admin', 'Admin\DashboardController@login')->name('Admin.auth');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
});

//Tacos
Route::get('/tacos', 'Admin\TacosController@index')->name('Tacos.index');
Route::get('/create-tacos', 'Admin\TacosController@create')->name('Tacos.create');
Route::get('/tacos-edit/{tacos}', 'Admin\TacosController@edit')->name('Tacos.edit');
Route::get('/tacos-destroy/{tacos}', 'Admin\TacosController@destroy')->name('Tacos.destroy');
Route::get('/tacos/{tacos}', 'Admin\TacosController@show')->name('Tacos.read');
Route::post('/tacos-store', 'Admin\TacosController@store')->name('Tacos.store');
Route::patch('/tacos-update/{tacos}', 'Admin\TacosController@update')->name('Tacos.update');

//Drinks
Route::get('/drinks', 'Admin\DrinkController@index')->name('Drinks.index');
Route::get('/drinks/{filter}', 'Admin\DrinkController@filter')->name('Drinks.index.filter');
Route::get('/create-drink', 'Admin\DrinkController@create')->name('Drinks.create');
Route::get('/drink-destroy/{drink}', 'Admin\DrinkController@destroy')->name('Drinks.destroy');
Route::get('/drink/{id}', 'Admin\DrinkController@show')->name('Drinks.show');
Route::get('/drink-edit/{id}', 'Admin\DrinkController@edit')->name('Drinks.edit');
Route::post('/drink-store', 'Admin\DrinkController@store')->name('Drinks.store');
Route::patch('/drink-update/{drink}', 'Admin\DrinkController@update')->name('Drinks.update');

//Menus
Route::get('/menus', 'Admin\MenuController@index')->name('Menus.index');
Route::get('/menu-create', 'Admin\MenuController@create')->name('Menus.create');
Route::get('/menu/{id}', 'Admin\MenuController@show')->name('Menus.show');
Route::get('/menu-destroy/{id}', 'Admin\MenuController@destroy')->name('Menus.destroy');
Route::get('/menu-edit/{id}', 'Admin\MenuController@edit')->name('Menus.edit');
Route::post('/menu-store', 'Admin\MenuController@store')->name('Menus.store');
Route::patch('/menu-update', 'Admin\MenuController@update')->name('Menus.update');

//Auth routes
Auth::routes();


//Client Side Routes
//Landing Page
Route::get('/', 'ClientSide\LandingPageController@index')->name('LandingPage');

//Tacos items
Route::get('/tacos-menu', 'ClientSide\TacosMenuController@index')->name('TacosMenu.index');
Route::get('/search', 'TacosMenuController@search')->name('TacosMenu.search');

//Cart
Route::get('/addToCart/{id}', 'ClientSide\CartController@store')->name('Tacos.addToCart');
Route::get('/cart', 'ClientSide\CartController@index')->name('Cart');
Route::get('/cart/{id}', 'ClientSide\CartController@remove')->name('Cart.remove');


Route::get('/home', 'HomeController@index')->name('home');
