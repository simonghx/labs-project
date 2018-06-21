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
//route temporaire
Route::get('/', function () {
    return view('index');
});
Route::get('/services', function () {
    return view('front.services');
});
Route::get('/blog', function () {
    return view('front.blog');
});
Route::get('/post', function () {
    return view('front.article');
});
Route::get('/contact', function () {
    return view('front.contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin/users', 'UserController');
Route::get('/admin/catandtags', 'CatandtagsController@index')->name('catandtags');
// Route::get('/admin/catandtags/edit/{categorie}', 'CatandtagsController@editCategorie')->name('categorieEdit');
Route::resource('/categories', 'CategorieController');
Route::resource('/tags', 'TagController');
Route::resource('/admin/articles', 'ArticleController');

