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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Question Route
Route::resource('questions', 'QuestionController');
Route::get('questions.create', 'QuestionController@create')->name('questions.create');
Route::post('questions.store', 'QuestionController@store')->name('questions.store');
Route::get('questions.edit.{id}', 'QuestionController@edit')->name('questions.edit');

// Admin Routes
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
