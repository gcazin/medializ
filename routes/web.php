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

Route::namespace('Post')->group(function() {
    Route::get('/admin', 'PostController@index')->name('admin.index');
    Route::get('/admin/create', 'PostController@create')->name('admin.create');
    Route::get('/admin/update/{id}', 'PostController@update')->name('admin.update');
    Route::post('/admin/create', 'PostController@store')->name('admin.store');
    Route::get('/admin/list/post', 'PostController@show')->name('admin.show');
    Route::get('/admin/delete/{id}', 'PostController@delete')->name('admin.delete');
    Route::get('/media', 'PostController@media')->name('media');
    Route::get('/media/subcategory/{subcategory_id}', 'PostController@subcategory')->name('subcategory');
    Route::get('/media/{id}/{title}', 'PostController@detail')->name('detail');
    Route::get('/twittosphere', 'PostController@twittosphere')->name('twittosphere');
});

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Auth')->group(function() {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::post('/profile', 'UserController@update_avatar');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/settings', 'UserController@settings')->name('settings');

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset');
});
