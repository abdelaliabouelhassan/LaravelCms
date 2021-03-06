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

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostCotroller@post']);
route::group(['middleware'=>'admin'],function (){
    Route::resource('/admin/user','AdminUsersController');
    Route::resource('/admin/post','AdminPostCotroller');
    Route::resource('/admin/category','AdminCategoryControler');
    Route::resource('/admin/media','AdminMediaController');
    Route::resource('/admin/comment','PostCommentController');
    Route::resource('/admin/post/commentreplay','CommentreplayController');
});


route::group(['middleware'=>'auth'],function () {
    Route::post('comment/replay','CommentreplayController@store');
});
