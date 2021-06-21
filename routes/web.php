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

Route::get('/', IndexController::class)->name('index');

Route::get('/about', 'SimplePageController@about')->name('about');

Route::get('/services', 'SimplePageController@services')->name('services');

Route::get('/contact', 'SimplePageController@contact')->name('contact');

Route::get('/author/{key}',PostByAuthorController::class)->name('post_by_author');

Route::get('/post/{id}',SinglePostController::class)->name('single_post');

Route::post('/post/{id}',SaveCommentController::class)->name('save_comment');

Route::get('/category/{key}',PostsByCategoryController::class)->name('post_by_category');

Route::get('/socnetwork','SocnetworkController@socnetwork')->name('socnetwork');

//ADMIN
Route::get('/admin/add_post','AdminPostsController@add')->name('add_post_get');

Route::post('/admin/add_post','AdminPostsController@save')->name('add_post_post');

Route::get('/admin/edit_post/{id}','AdminPostsController@edit')->name('edit_post_get');

Route::post('/admin/edit_post/{id}','AdminPostsController@edit_save')->name('edit_post_post');

Route::get('/admin/admin_post','AdminPostsController@delete')->name('admin_post_get');

Route::delete('/admin/admin_post','AdminPostsController@delete')->name('admin_post_post');

Route::get('/404', function (){return view('404');})->name('404');

//Cart actions

Route::get('/cart/add_to_cart/{id}','CartAction@add')->name('add_to_cart');

Route::get('/cart','CartAction@show')->name('cart');

Route::get('/cart/delete/{id}','CartAction@delete')->name('delete_from_cart');

Route::post('/cart/update','CartAction@update')->name('update_cart');

//AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




