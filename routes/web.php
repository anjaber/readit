<?php

use App\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/','PagesController@pagewellcom');
Route::get('/about','PagesController@about');
Route::get('/contact','PagesController@contact');
Route::post('/contact','PagesController@store');
Route::get('/message','PagesController@message');
Route::get('/message/{id}/view','PagesController@messageview');
Route::get('message/{id}/delete','PagesController@messagedelete');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//Route::resource('Categories', 'CategoriesContrller');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/Categories', 'CategoriesContrller@index'); 
Route::get('/Categories/create', 'CategoriesContrller@create');
Route::post('/Categories/create', 'CategoriesContrller@store');
Route::get('/Categories/{id}/edit', 'CategoriesContrller@edit'); 
Route::post('/Categories/{id}', 'CategoriesContrller@update'); 
Route::get('/Categories/{id}/destroy', 'CategoriesContrller@destroy'); 
Route::get('/Categories/{id}/view', 'CategoriesContrller@show'); 

Route::get('/Tags', 'TagsController@index'); 
Route::get('/Tags/create', 'TagsController@create');
Route::post('/Tags/create', 'TagsController@store');
Route::get('/Tags/{id}/edit', 'TagsController@edit'); 
Route::post('/Tags/{id}', 'TagsController@update'); 
Route::get('/Tags/{id}/destroy', 'TagsController@destroy'); 
//Route::get('/Tags/{id}/view', 'TagsController@show'); 

Route::get('/posts', 'PostsController@index'); 
Route::get('/posts/create', 'PostsController@create'); 
Route::post('/posts/create', 'PostsController@store'); 
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::post('/posts/{id}', 'PostsController@update');
Route::get('/posts/{id}/destroy', 'PostsController@destroy'); 
Route::get('/posts/{id}/show', 'PostsController@show'); 
Route::get('/posts/trashed', 'PostsController@trashed'); 
Route::get('/posts/views', 'PostsController@viewallpost');
Route::post('/posts/{id}/comment', 'PostsController@createcomment');
//Route::get('/posts/{id}/comment', 'PostsController@createcomment');


Route::group( ['auth'] , function(){
    Route::get('/users', 'UserController@index')->name('users.index'); 
    Route::get('/users/create', 'UserController@create')->name('users.create'); 
});

Route::get('/dashboard', 'DashboardController@index'); 

