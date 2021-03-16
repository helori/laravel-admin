<?php

Route::middleware('web')->group(function () {

    Route::group(['prefix' => 'admin'], function ($router) {
                    
        Route::get('login', [
            'uses' => '\Helori\LaravelAdmin\Controllers\LoginController@showLoginForm', 
            'as' => 'admin-login'
        ]);

        Route::post('login', [
            'uses' => '\Helori\LaravelAdmin\Controllers\LoginController@login', 
            'as' => 'admin-post-login'
        ]);

        Route::post('logout', [
            'uses' => '\Helori\LaravelAdmin\Controllers\LoginController@logout', 
            'as' => 'admin-logout'
        ]);

        Route::get('password-forgot', [
            'uses' => '\Helori\LaravelAdmin\Controllers\ForgotPasswordController@showLinkRequestForm', 
            'as' => 'admin-password-forgot'
        ]);

        Route::post('password-email', [
            'uses' => '\Helori\LaravelAdmin\Controllers\ForgotPasswordController@sendResetLinkEmail', 
            'as' => 'admin-password-email'
        ]);

        Route::get('password-reset/{token}', [
            'uses' => '\Helori\LaravelAdmin\Controllers\ResetPasswordController@showResetForm', 
            'as' => 'admin-password-reset'
        ]);

        Route::post('password-reset', [
            'uses' => '\Helori\LaravelAdmin\Controllers\ResetPasswordController@reset', 
            'as' => 'admin-post-password-reset'
        ]);

        Route::group(['middleware' => 'auth:admin'], function ()
        {
        	// protected routes...

            Route::get('/', function(){
                return view('laravel-admin::home');
            });
        });

    });
});


