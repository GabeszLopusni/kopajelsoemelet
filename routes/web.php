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

Route::get('/home', [
    'uses' => 'PostController@index',
    'as'   => 'home',
    'middleware' => 'auth'
  ]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth' //FIXME: kideríteni miért nem működik és javítani!!!
  ]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
  ]);

Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
  ]);

Route::post('/editProfile', [
    'uses' => 'HomeController@editProfile',
    'as' => 'editProfile'
  ]);
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
     'as' => 'like'
   ]);
