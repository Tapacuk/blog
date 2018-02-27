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
		
		Route::get('products', 'ProductController@index');
		Route::get('products/create', 'ProductController@create');
		Route::post('products/create', 'ProductController@store');
		Route::get('products/edit/{slug?}', 'ProductController@edit');
		Route::post('products/edit/{slug?}', 'ProductController@update');
		
		Route::get('products/categories', 'ProductCategoriesController@index');
		Route::get('products/categories/create','ProductCategoriesController@create');
		Route::post('products/categories/create','ProductCategoriesController@store');
});

Route::get('/profile/{id}',[ 'as' => 'users.index', 'uses' => 'UserProfileController@index']);
Route::get('/profile/{id}/pass', 'UserProfileController@changePass');
Route::post('/profile/{id}/pass', 'UserProfileController@storePass');
Route::post('/profile', 'UserProfileController@update_avatar');
Route::get('/users/posts/{id}', 'UserProfileController@posts');
Route::get('/users/posts/{id}/edit', 'UserProfileController@edit');
Route::post('/users/posts/{id}/edit', 'UserProfileController@update');

Route::get('/blog', 'BlogController@index');
Route::post('/blog', 'BlogController@search');
Route::get('/blog/{slug?}', 'BlogController@show');
Route::get('/bloggers/create', 'BlogController@create');
Route::post('/bloggers/create', 'BlogController@store');

Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider_facebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback_facebook');

/* Market Routes */

Route::get('/market', 'Market\MarketController@index');
Route::get('/market/{slug?}', 'Market\MarketController@show');

/* End Market Routes */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
?>