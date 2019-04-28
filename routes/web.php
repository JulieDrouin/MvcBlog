<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommController;


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

Route::get('/inscription', function () {
    return view('auth.register');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home/{id}', 'HomeController@index')->name('index');;
Route::get('/home/{id}', 'HomeController@create')->name('contactForm');
//Route::get('/home/{id}', 'HomeController@build')->name('contact.build');

Route::get('/comm/{id}', 'CommController@index');
Route::resource('comm', 'CommController');

Route::post('billet/new', 'PostController@store')->name('post.store');
Route::get('billet/new', 'PostController@create')->name('post.create');
Route::get('/billet/{id}', 'PostController@index');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{id}', 'PostController@show')->name('postsShow');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::get('/billet/{id}/edit', 'PostController@edit');
Route::put('/posts/{id}', 'PostController@update')->name('posts.update');
Route::get('/billet/{id}', 'PostController@show')->name('posts.show');
Route::get('/delete/{id}', 'PostController@deletePost')->name('post.delete');
Route::delete('/delete/{id}', 'PostController@deletePost');
Route::delete('/billet/{id}/delete', 'PostController@deletePost');

Route::delete('/posts/{id}/delete', 'PostController@destroy')->name('post.destroy');
Route::resource('post', 'PostController')->except(['show', 'update']);



Route::get('/show/{id}/edit/','UserPasswordController@edit')->name('showUpPass')->middleware('verified');
Route::get('/show/{id}/update','UserPasswordController@update')->name('updatePassword')->middleware('verified');


Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser')->middleware('verified');
Route::post('user/{id}/update', 'UserController@update')->name('update')->middleware('verified');
Route::get('/show/{id}', 'UserController@show')->name('show')->middleware('verified');
Route::post('/user/{id}/edit', 'UserController@edit')->name('updateUser')->middleware('verified');
Route::resource('user', 'UserController');
Auth::routes(['verify' => true]);

