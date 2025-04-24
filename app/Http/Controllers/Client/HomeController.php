<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Teachers;
use App\Models\VideoStudent;
use App\Models\CourseTeacher;
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
        return view('client.courses');
    }

    public function coursesDetail()
    {
        return view('client.courses-detail');
    }
}
