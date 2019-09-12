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

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->group(function() {
    Route::get('/admin', 'AdminController@index')->name('admin.index')->middleware('admin');
});

Route::namespace('Post')->group(function() {

    Route::name('admin.')->group(function () {
        Route::resource('admin/post', 'PostController', [
            'prefix' => 'admin.'
        ])->except(['index', 'show']);
        Route::resource('admin/subcategory', 'SubCategoryController', [
            'prefix' => 'admin.'
        ])->except(['index', 'show']);
    });
    Route::get('/admin/post/{id}/edit', 'PostController@edit')->name('admin.post.edit');

    Route::get('/admin/subcategory/{id}/edit', 'SubCategoryController@edit')->name('admin.subcategory.edit');

    Route::get('/videos', 'PostController@index')->name('post.index');
    Route::get('/post/{id}/{slug}', 'PostController@show')->name('post.show');
    Route::get('/posts/subcategory/{subcategory_id}', 'SubCategoryController@index')->name('subcategory');

    Route::get('/threads', 'PostController@threads')->name('threads');
});

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Auth')->group(function() {
    Route::get('/deconnexion', 'LoginController@logout')->name('logout');
    Route::get('/mon-compte', 'UserController@edit')->name('edit');
    Route::get('/options', 'UserController@options')->name('options');
    Route::get('/avances', 'UserController@advanced')->name('advanced');

    Route::resource('user', 'UserController')->except(['index', 'show', 'create']);

    Route::get('/connexion', 'LoginController@showLoginForm')->name('login');
    Route::post('/connexion', 'LoginController@login');
    // Registration Routes...
    Route::get('/inscription', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/inscription', 'RegisterController@register');
    // Password Reset Routes...
    Route::get('mot-de-passe/reinitialisation', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('mot-de-passe/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('mot-de-passe/reinitialisation/{token}', 'ResetPasswordController@showResetForm');
    Route::post('mot-de-passe/reinitialisation', 'ResetPasswordController@reset');
});
