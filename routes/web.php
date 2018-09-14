<?php

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

// Base Routes
Route::get('/', 'MainMenuController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main_menu', 'MainMenuController@index')->name('main_menu');

// Group 1
Route::get('/g1_entry', 'Group1Controller@entry')->name('g1_entry');
Route::post('/g1_submit_entry', 'Group1Controller@submit_entry')->name('g1_submit_entry');
Route::get('/g1_history', 'Group1Controller@history')->name('g1_history');
Route::get('/g1_cat_boxes', 'Group1AdminController@category_boxes')->name('g1_cat_boxes');

// Administration
Route::get('/category_boxes', 'Admin\CategoryBoxController@index')->name('category_boxes');