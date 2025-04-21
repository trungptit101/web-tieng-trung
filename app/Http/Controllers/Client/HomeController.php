<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
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
