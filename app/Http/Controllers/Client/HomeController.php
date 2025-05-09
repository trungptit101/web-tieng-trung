<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Teachers;
use App\Models\VideoStudent;
use App\Models\CourseTeacher;
use App\Models\Documents;
use App\Models\Courses;
use App\Models\Footer;
use App\Models\Contact;
use App\Models\RegisterAdvise;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teachers = Teachers::query()->orderBy('created_at', 'DESC')->get();
        $banners = Banners::query()->get();
        $courses = Courses::query()->get();
        $footers = Footer::query()->get();
        $videosStudent = VideoStudent::query()->orderBy('created_at', 'DESC')->limit(8)->get();
        $page = Pages::Where('slug', 'gioi-thieu-trung-tam-hua-hua')->first();
        return view('client.home', compact('banners', 'page', 'teachers', 'videosStudent', 'courses', 'footers'));
    }

    public function profile($slug)
    {
        $teacher = Teachers::Where('slug', $slug)->first();
        if(!isset($teacher)) return redirect()->back();
        $courses = CourseTeacher::query()->where('teacherId', $teacher->id)->get();
        return view('client.profile', compact('teacher', 'courses'));
    }

    public function listTeachers()
    {
        $teachers = Teachers::query()->orderBy('created_at', 'DESC')->get();
        return view('client.list-teachers', compact('teachers'));
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

    public function studentTalkAbout()
    {
        $videosStudent = VideoStudent::query()->get();
        return view('client.student-talk-about', compact('videosStudent'));
    }

    public function documentCourse($slug)
    {
        $document = Documents::where('slug', $slug)->first();
        return view('client.document-course', compact('document'));
    }

    public function registerAdvise(Request $request)
    {
        try {
            $register = new RegisterAdvise();
            $register->name = $request->input('name');
            $register->email = $request->input('email');
            $register->phone = $request->input('phone');
            $register->course = $request->input('course');
            $register->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('register-advise-success');
    }

    public function registerAdviseSuccess()
    {
        return view('client.register-advise-success');
    }

    public function coursesDetail($slug)
    {
        $course = Courses::query()->where('slug', $slug)->first();
        return view('client.courses-detail', compact('course'));
    }

    public function writeWords()
    {
        return view('client.write-words');
    }

    public function contactClient()
    {
        $contact = Contact::query()->where('slug', 'lien-he')->first();
        return view('client.contact-client', compact('contact'));
    }
}
