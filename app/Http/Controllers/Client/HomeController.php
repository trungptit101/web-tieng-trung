<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Teachers;
use App\Models\VideoStudent;
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

    public function profile()
    {
        return view('client.profile');
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
