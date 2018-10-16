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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout'); /* Need for link logout */
Route::get('/main_menu', 'MainMenuController@index')->name('main_menu');

// Agent search
Route::get('/agent_search','AgentSearchController@search')->name('agent_search');

// Group 1
Route::get('/g1_entry', 'Group1Controller@entry')->name('g1_entry');
Route::post('/g1_submit_entry', 'Group1Controller@submit_entry')->name('g1_submit_entry');
Route::get('/g1_history', 'Group1Controller@history')->name('g1_history');
Route::get('/g1_record_details/{id}', 'Group1Controller@record_details')->name('g1_record_details');

// Group 1 Admin
Route::get('/g1_admin', 'Group1AdminController@admin_main')->name('g1_admin');
Route::get('/g1_admin_history', 'Group1AdminController@entry_history')->name('g1_admin_history');
Route::get('/g1_admin_search', 'Group1AdminController@admin_search')->name('g1_admin_search');

Route::get('/g1_cat_boxes/{type}/{id}', 'Group1AdminController@category_boxes')->name('g1_cat_boxes');
Route::get('/g1_cat_boxes_edit/{id}/{state}', 'Group1AdminController@category_boxes_edit')->name('g1_cat_boxes_edit');
Route::get('/g1_cat_boxes_save', 'Group1AdminController@category_boxes_save')->name('g1_cat_boxes_save');
Route::get('/g1_cat_boxes_trash', 'Group1AdminController@category_boxes_trash_bin')->name('g1_cat_boxes_trash');
Route::get('/g1_cat_boxes_restore/{id}', 'Group1AdminController@category_boxes_restore')->name('g1_cat_boxes_restore');

Route::get('/g1_dd_menus/{id}', 'Group1AdminController@drop_menus')->name('g1_dd_menus');
Route::get('/g1_dd_menus_edit/{id}/{state}', 'Group1AdminController@drop_menus_edit')->name('g1_dd_menus_edit');
Route::get('/g1_dd_menus_save', 'Group1AdminController@drop_menus_save')->name('g1_dd_menus_save');
Route::get('/g1_dd_menus_trash', 'Group1AdminController@drop_menus_trash_bin')->name('g1_dd_menus_trash');

// System Administration
Route::get('/category_boxes', 'Admin\CategoryBoxController@index')->name('category_boxes');
