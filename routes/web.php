<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', 'Client\HomeController@index');
Route::get('/profile', 'Client\HomeController@profile');
Route::get('/courses', 'Client\HomeController@courses');
Route::get('/courses-detail', 'Client\HomeController@coursesDetail');
Route::get('/login', 'Auth\LoginController@loginClient')->name('user.loginClient');

Auth::routes();

// Route::get('/home', [
//     App\Http\Controllers\HomeController::class,
//     'index',
// ])->name('home');
