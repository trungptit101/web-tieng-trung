<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

// Login form
Route::get('/login', 'Auth\LoginController@loginClient')->name('user.loginClient');
Route::post('/login', 'Auth\LoginController@login')->name('login');

// Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('/profile', 'Client\HomeController@profile')->name('profile');
Route::get('/courses', 'Client\HomeController@courses')->name('courses');
Route::get('/courses-detail', 'Client\HomeController@coursesDetail')->name('courses-detail');

// Admin route
Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        // Thong ke
        Route::group([], function () {
            Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        });

        // Banner
        Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
            Route::get('index', 'Admin\DashboardController@listImage')->name('index');
            Route::get('add', 'Admin\DashboardController@addImage')->name('add');
            Route::post('add', 'Admin\DashboardController@createImage')->name('createImage');
            Route::post('delete/{imageId}', 'Admin\DashboardController@deleteImage')->name('delete');
        });

        // Trang gioi thieu HUA HUA
        Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
            Route::get('/introduce/detail', 'Admin\DashboardController@detailIntroduce')->name('introduce.detail');
            Route::post('/introduce/detail', 'Admin\DashboardController@updateIntroduce')->name('introduce.update');
        });
    }
);
