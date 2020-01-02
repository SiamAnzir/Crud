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
//Route::get('/home','Crud@search')->name('search');
Route::get('/viewTodos','Crud@viewTodos')->name('viewTodos');
Route::get('/addTodos','Crud@createTodo')->name('createTodo');
Route::post('/addTodos','Crud@addTodos')->name('addTodos');
Route::delete('/deleteTodo{id}','Crud@deleteTodo')->name('deleteTodo');
Route::get('/editTodo{id}','Crud@editTodo')->name('editTodo');
Route::put('/updateTodo{id}','Crud@updateTodo')->name('updateTodo');
