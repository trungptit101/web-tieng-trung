<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banners::query()->get();
        return view('client.home', compact('banners'));
    }

    public function profile()
    {
        return view('client.profile');
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
