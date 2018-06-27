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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('/admin/users', 'UserController')->middleware('can:admin');
Route::get('/admin/catandtags', 'CatandtagsController@index')->name('catandtags')->middleware('auth');
Route::resource('/admin/categories', 'CategorieController')->middleware('auth');
Route::resource('/admin/tags', 'TagController')->middleware('auth');
Route::resource('/admin/articles', 'ArticleController')->middleware('auth');
Route::resource('/admin/services', 'ServiceController')->middleware('can:admin');
Route::resource('/admin/carousel', 'CarouselController')->middleware('can:admin');
Route::resource('/admin/projets', 'ProjetController')->middleware('can:admin');
Route::resource('/admin/clients', 'ClientController')->middleware('can:admin');
Route::resource('/admin/testimoniaux', 'TestimonialController')->middleware('can:admin');

