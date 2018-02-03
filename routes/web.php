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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::post('/create', 'TicketsController@store');
Route::get('/create', 'PagesController@create');
Route::get('/tickets', 'TicketsController@index');
Route::get('/tickets/{slug?}', 'TicketsController@show');
Route::get('/tickets/{slug?}/edit', 'TicketsController@edit');
Route::post('/tickets/{slug?}/edit', 'TicketsController@update');
Route::post('/tickets/{slug?}/delete', 'TicketsController@destroy');
Route::post('/comment', 'CommentsController@newComment');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function() {
		Route::get('users',[ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
		Route::get('roles', 'RolesController@index');
		Route::get('roles/create', 'RolesController@create');
		Route::post('roles/create', 'RolesController@store');
		Route::get('users/{id?}/edit', 'UsersController@edit');
		Route::post('users/{id?}/edit', 'UsersController@update');
		Route::get('/', 'PagesController@home');
		
		Route::get('posts', 'PostsController@index');
		Route::get('posts/create', 'PostsController@create');
		Route::post('posts/create', 'PostsController@store');
		Route::get('posts/{id?}/edit', 'PostsController@edit');
		Route::post('posts/{id?}/edit', 'PostsController@update');
		
		Route::get('categories', 'CategoriesController@index');
		Route::get('categories/create', 'CategoriesController@create');
		Route::post('categories/create', 'CategoriesController@store');
});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
?>