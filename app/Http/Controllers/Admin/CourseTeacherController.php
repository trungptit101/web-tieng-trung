<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use App\Models\Pages;
use App\Models\Teachers;
use App\Models\VideoStudent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Province;
use App\Models\Order;
use App\Notifications\InfoAccountNotification;
use Hash;
use Illuminate\Support\Facades\Notification;
use DateTime;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Mail;

class CourseTeacherController extends Controller
{
    public function listCoursesTeacher(Request $request, $teacherId)
    {
        $teacher = Teachers::findOrFail($teacherId);
        $courses = CourseTeacher::query()->where('teacherId', $teacherId)->orderBy('created_at', 'DESC')->get();
        return view('admin.courses-teacher.index', compact('courses', 'teacher'));
    }

    public function addCourseTeacher(Request $request, $teacherId)
    {
        return view('admin.courses-teacher.add', compact('teacherId'));
    }

    public function createCourseTeacher(Request $request, $teacherId)
    {
        $rules = [
            'link' => 'required',
            'title' => 'required',
        ];
        $message = [
            'link.required' => 'Link video không được trống!',
            'title.required' => 'Tiêu đề không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $video = new CourseTeacher();
            $video->title = $request->input('title');
            $video->link = $request->input('link');
            $video->slug = Str::slug($request->input('title'));
            $video->teacherId = $teacherId;
            $video->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('courses.teacher.index', $teacherId)->with('success', 'Thêm khoá học của giáo viên thành công!');
    }

    public function deleteCourseTeacher(Request $request, $id)
    {
        $course = CourseTeacher::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.teacher.index', $course->teacherId)->with('success', 'Xoá khoá học của giáo viên thành công!');
    }

    public function detailCourseTeacher(Request $request, $id)
    {
        $course = CourseTeacher::findOrFail($id);
        return view('admin.courses-teacher.detail', compact('course'));
    }

    public function updateCourseTeacher(Request $request, $id)
    {
        $rules = [
            'link' => 'required',
            'title' => 'required',
        ];
        $message = [
            'link.required' => 'Link video không được trống!',
            'title.required' => 'Tiêu đề không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $video = CourseTeacher::findOrFail($id);
            $video->title = $request->input('title');
            $video->link = $request->input('link');
            $video->slug = Str::slug($request->input('title'));
            $video->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('courses.teacher.index', $video->teacherId)->with('success', 'Cập nhật khoá học của giáo viên thành công!');
    }

}
