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

//homepage
Route::get('/', function () {
    return view('welcome');
});

//register & login
Auth::routes();

//dashboard
Route::get('/home', 'NoteController@index')->name('home');

//notes
Route::get('/notes/create-page', 'NoteController@createPage')->name('create.note.page');
Route::get('/notes/update-page/{id}', 'NoteController@updatePage')->name('update.note.page');
Route::post('notes/update', 'NoteController@update')->name('update.note');
Route::get('/notes/delete-page/{id}', 'NoteController@delete')->name('delete.note');
Route::post('/notes/create', 'NoteController@create')->name('create.note');
