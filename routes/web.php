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

Route::get('/category/{key}',PostsByCategoryController::class)->name('post_by_category');

Route::get('/socnetwork','SocnetworkController@socnetwork')->name('socnetwork');
