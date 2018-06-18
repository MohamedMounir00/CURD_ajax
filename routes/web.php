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

Route::group(['middleware' => ['web']], function() {
  Route::resource('post','PostsController');
  Route::POST('addPost','PostsController@addPost');
  Route::POST('editPost','PostsController@editPost');
 Route::POST('deletePost','PostsController@deletePost');
});
