<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

// Login form
Route::get('/dang-nhap', 'Auth\LoginController@loginClient')->name('user.loginClient');
Route::post('/login', 'Auth\LoginController@login')->name('login');

// Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('/profile-giao-vien/{slug}', 'Client\HomeController@profile')->name('profile');
Route::get('/hoc-vien-noi-gi-ve-chung-toi', 'Client\HomeController@studentTalkAbout')->name('studentTalkAbout');
Route::get('/khoa-hoc', 'Client\HomeController@courses')->name('courses');
Route::get('/khoa-hoc/{slug}', 'Client\HomeController@coursesDetail')->name('courses-detail');
Route::get('/gioi-thieu-trung-tam-hua-hua', 'Client\HomeController@detailCenterHuaHua')->name('detail-center');
Route::get('/tai-lieu/{slug}', 'Client\HomeController@documentCourse')->name('document-course');
Route::post('/dang-ky-tu-van', 'Client\HomeController@registerAdvise')->name('register-advise');
Route::get('/dang-ky-tu-van-thanh-cong', 'Client\HomeController@registerAdviseSuccess')->name('register-advise-success');
Route::get('/cach-viet-chu-han', 'Client\HomeController@writeWords')->name('write-words');
Route::get('/giao-vien-tai-nang-tam-huyet', 'Client\HomeController@listTeachers')->name('list-teachers');
Route::get('/lien-he', 'Client\HomeController@contactClient')->name('contact-client');

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
            Route::get('{id}/detail', 'Admin\DashboardController@detailVideoStudent')->name('detail');
            Route::post('{id}/detail', 'Admin\DashboardController@updateVideoStudent')->name('update');
            Route::post('delete/{id}', 'Admin\DashboardController@deleteVideoStudent')->name('delete');
        });

        // Quan ly khoa hoc giao vien
        Route::group(['prefix' => 'courses/teacher', 'as' => 'courses.teacher.'], function () {
            Route::get('{id}/index', 'Admin\CourseTeacherController@listCoursesTeacher')->name('index');
            Route::get('{id}/add', 'Admin\CourseTeacherController@addCourseTeacher')->name('add');
            Route::post('{id}/add', 'Admin\CourseTeacherController@createCourseTeacher')->name('create');
            Route::get('{id}/detail', 'Admin\CourseTeacherController@detailCourseTeacher')->name('detail');
            Route::post('{id}/detail', 'Admin\CourseTeacherController@updateCourseTeacher')->name('update');
            Route::post('{id}/delete', 'Admin\CourseTeacherController@deleteCourseTeacher')->name('delete');
        });

        // Quan ly khoa hoc trung tam
        Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
            Route::get('index', 'Admin\CoursesController@listCourses')->name('index');
            Route::get('add', 'Admin\CoursesController@addCourse')->name('add');
            Route::post('add', 'Admin\CoursesController@createCourse')->name('create');
            Route::get('detail/{id}', 'Admin\CoursesController@detailCourse')->name('detail');
            Route::post('detail/{id}', 'Admin\CoursesController@updateCourse')->name('update');
            Route::post('delete/{id}', 'Admin\CoursesController@deleteCourse')->name('delete');
        });

        // tai lieu
        Route::group(['prefix' => 'documents', 'as' => 'documents.'], function () {
            Route::get('/index', 'Admin\DocumentsController@index')->name('index');
            Route::get('/add', 'Admin\DocumentsController@add')->name('add');
            Route::post('/add', 'Admin\DocumentsController@addNew')->name('add');
            Route::get('/detail/{id}', 'Admin\DocumentsController@detail')->name('detail');
            Route::post('/delete/{id}', 'Admin\DocumentsController@delete')->name('delete');
            Route::post('/detail/{id}', 'Admin\DocumentsController@update')->name('update');
        });

        // quan ly dang ky tu van
        Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
            Route::get('/index', 'Admin\DashboardController@listRegister')->name('index');
        });

        // Trang lien he
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/detail', 'Admin\DashboardController@detailContact')->name('detail');
            Route::post('/detail', 'Admin\DashboardController@updateContact')->name('update');
        });

        // footer
        Route::group(['prefix' => 'footer', 'as' => 'footer.'], function () {
            Route::get('/index', 'Admin\FooterController@index')->name('index');
            Route::get('/add', 'Admin\FooterController@add')->name('add');
            Route::post('/add', 'Admin\FooterController@addNew')->name('add');
            Route::get('/detail/{id}', 'Admin\FooterController@detail')->name('detail');
            Route::post('/delete/{id}', 'Admin\FooterController@delete')->name('delete');
            Route::post('/detail/{id}', 'Admin\FooterController@update')->name('update');
        });
    }
);
