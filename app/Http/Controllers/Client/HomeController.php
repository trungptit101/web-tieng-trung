<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Teachers;
use App\Models\VideoStudent;
use App\Models\CourseTeacher;
use App\Models\Courses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teachers = Teachers::query()->get();
        $banners = Banners::query()->get();
        $videosStudent = VideoStudent::query()->get();
        $page = Pages::Where('slug', 'gioi-thieu-trung-tam-hua-hua')->first();
        return view('client.home', compact('banners', 'page', 'teachers', 'videosStudent'));
    }

    public function profile($slug)
    {
        $teacher = Teachers::Where('slug', $slug)->first();
        if(!isset($teacher)) return redirect()->back();
        $courses = CourseTeacher::query()->where('teacherId', $teacher->id)->get();
        return view('client.profile', compact('teacher', 'courses'));
    }

    public function detailCenterHuaHua()
    {
        $page = Pages::Where('slug', 'gioi-thieu-trung-tam-hua-hua')->first();
        return view('client.detail-center', compact('page'));
    }

    public function courses()
    {
        $courses = Courses::query()->get();
        return view('client.courses', compact('courses'));
    }

    public function coursesDetail($slug)
    {
        $course = Courses::query()->where('slug', $slug)->first();
        return view('client.courses-detail', compact('course'));
    }
}
