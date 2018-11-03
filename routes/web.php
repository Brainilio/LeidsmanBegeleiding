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

// Pagina route, dit leidt naar de index
Route::get('/', 'PagesController@index');

// Pagina route, dit leidt naar de about page
Route::get('/about', 'PagesController@about');

// Pagina route, dit leidt naar de services page
Route::get('/services', 'PagesController@services');


// Favorieten, zodra je op een post op favourite klikt, stopt hij dit in de favorieten en leidt hij je naar waar de controlle rje naar toe leidt
Route::post('/', 'FavController@favourite');

// Resource controller voor CRUD
Route::resource('posts', 'PostsController');

// Route voor comments
Route::resource('comments', 'CommentsController');

// Route voor het posten van een search filter, zodra er op search wordt geklikt na de filter dan zoekt hij
Route::post('search/filter', 'SearchController@filtersearch');

// Route voor het searchen in de search balk, zodra er op search wordt geklikt zal de value hier naar toe gepost worden
Route::post('search', 'SearchController@search');



// Route voor home dashboard
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route voor user dashboard
Auth::routes();

Route::get('/home/users', 'PagesController@userlist');

// Route voor fav dashboard
Auth::routes();

Route::get('/home/fav', 'FavController@showFavourite');


//Route voor het schakelen van status
Auth::routes();

Route::post('/home', 'HomeController@status');

//Route voor het editen van profiel
Auth::routes();
Route::get('/home/edituser/{id}', 'HomeController@edit');

//Route voor het updaten van profiel
Auth::routes();
Route::put('/home/{id}', 'HomeController@update');




