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
Route::get('/', 'FrontController@index')->name('main');
Route::get('/services', 'FrontController@services')->name('services');
Route::get('/blog', 'FrontController@blog')->name('blog');
Route::get('/article/{article}', 'FrontController@article')->name('article');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::post('/sendmail', 'FrontController@contactForm')->name('backHome');
Route::post('/newsletter', 'FrontController@newsletterForm')->name('backMain');

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
Route::resource('/admin/newsletter', 'NewsletterController')->middleware('can:admin');

