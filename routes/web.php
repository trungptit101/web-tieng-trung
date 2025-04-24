<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

// Login form
Route::get('/login', 'Auth\LoginController@loginClient')->name('user.loginClient');
Route::post('/login', 'Auth\LoginController@login')->name('login');

// Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('/profile-giao-vien/{slug}', 'Client\HomeController@profile')->name('profile');
Route::get('/courses', 'Client\HomeController@courses')->name('courses');
Route::get('/courses-detail', 'Client\HomeController@coursesDetail')->name('courses-detail');
Route::get('/gioi-thieu-trung-tam-hua-hua', 'Client\HomeController@detailCenterHuaHua')->name('detail-center');

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

        // Quan ly giao vien
        Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function () {
            Route::get('index', 'Admin\DashboardController@listTeachers')->name('index');
            Route::get('add', 'Admin\DashboardController@addFormTeacher')->name('add');
            Route::post('add', 'Admin\DashboardController@createTeacher')->name('create');
            Route::get('detail/{id}', 'Admin\DashboardController@detailTeacher')->name('detail');
            Route::post('update/{id}', 'Admin\DashboardController@updateTeacher')->name('update');
            Route::post('delete/{id}', 'Admin\DashboardController@deleteTeacher')->name('delete');
        });

        // Quan ly video hoc vien
        Route::group(['prefix' => 'videos/student', 'as' => 'videos.student.'], function () {
            Route::get('index', 'Admin\DashboardController@listVideosStudent')->name('index');
            Route::get('add', 'Admin\DashboardController@addVideoStudent')->name('add');
            Route::post('add', 'Admin\DashboardController@createVideoStudent')->name('create');
            Route::post('delete/{id}', 'Admin\DashboardController@deleteVideoStudent')->name('delete');
        });

        // Quan ly video hoc vien
        Route::group(['prefix' => 'courses/teacher', 'as' => 'courses.teacher.'], function () {
            Route::get('{id}/index', 'Admin\CourseTeacherController@listCoursesTeacher')->name('index');
            Route::get('{id}/add', 'Admin\CourseTeacherController@addCourseTeacher')->name('add');
            Route::post('{id}/add', 'Admin\CourseTeacherController@createCourseTeacher')->name('create');
            Route::get('{id}/detail', 'Admin\CourseTeacherController@detailCourseTeacher')->name('detail');
            Route::post('{id}/detail', 'Admin\CourseTeacherController@updateCourseTeacher')->name('update');
            Route::post('{id}/delete', 'Admin\CourseTeacherController@deleteCourseTeacher')->name('delete');
        });
    }
);
