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

Route::get('/', 'HomeController@index')->name('index');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/dashboard', 'HomeController@adminIndex')->name('index');
    Route::group(
        [
            'prefix' => '/users',
            'as' => 'users.',
        ],
        function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::get('/show', 'UserController@show')->name('show');
            Route::put('/update/{id}', 'UserController@update')->name('update');
            Route::post('/block', 'UserController@toggleBlock')->name('block');
            Route::get('/option', 'UserController@option')->name('option');
        }
    );
    Route::group(
        [
            'prefix' => 'product',
            'as' => 'product.'
        ], 
        function () {
            Route::get('/', 'Admin\ProductController@index')->name('list');
            Route::delete('{product?}', 'Admin\ProductController@destroy')->name('destroy');
        }
    );

});

Route::group(
    [
        'prefix' => '/register',
        'as' => 'register.'
    ], 
    function () {
        Route::group([
            'namespace' => 'Auth',
        ], function () {
            Route::get('/verify/{verify_token}', 'RegisterController@verify')->name('verify');
            Route::get('/resendEmail', 'RegisterController@showResendForm')->name('showResendForm');
            Route::post('/resendEmail', 'RegisterController@resendEmail')->name('resendEmail');
        });
    }
);

Auth::routes();
