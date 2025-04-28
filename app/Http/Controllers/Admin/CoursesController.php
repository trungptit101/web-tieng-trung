<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    public function listCourses(Request $request)
    {
        $courses = Courses::query()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function addCourse()
    {
        return view('admin.courses.add');
    }

    public function createCourse(Request $request)
    {
        $rules = [
            'title' => 'required',
            'avatar' => 'required',
            'description' => 'required',
            'infomationCourse' => 'required',
            'outputCourse' => 'required',
            'interestCourse' => 'required',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được trống!',
            'avatar.required' => 'Hình ảnh không được trống!',
            'description.required' => 'Mô tả không được trống!',
            'infomationCourse.required' => 'Thông tin khoá học không được trống!',
            'outputCourse.required' => 'Đầu ra khoá học không được trống!',
            'interestCourse.required' => 'Quyền lợi học viên không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $course = new Courses();
            $course->title = $request->input('title');
            $course->description = $request->input('description');
            $course->infomationCourse = $request->input('infomationCourse');
            $course->outputCourse = $request->input('outputCourse');
            $course->interestCourse = $request->input('interestCourse');
            $course->slug = Str::slug($request->input('title'));
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/courses/';
                $file->move($filePath, $filename);
                $course->avatar = '/uploads/courses/' . $filename;
            }
            $course->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('courses.index')->with('success', 'Thêm khoá học thành công!');
    }

    public function detailCourse(Request $request, $id)
    {
        $course = Courses::findOrFail($id);
        return view('admin.courses.detail', compact('course'));
    }

    public function updateCourse(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'infomationCourse' => 'required',
            'outputCourse' => 'required',
            'interestCourse' => 'required',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được trống!',
            'description.required' => 'Mô tả không được trống!',
            'infomationCourse.required' => 'Thông tin khoá học không được trống!',
            'outputCourse.required' => 'Đầu ra khoá học không được trống!',
            'interestCourse.required' => 'Quyền lợi học viên không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $course = Courses::findOrFail($id);
            $course->title = $request->input('title');
            $course->description = $request->input('description');
            $course->infomationCourse = $request->input('infomationCourse');
            $course->outputCourse = $request->input('outputCourse');
            $course->interestCourse = $request->input('interestCourse');
            $course->descriptionDocument = $request->input('descriptionDocument');
            $course->quote = $request->input('quote');
            $course->slug = Str::slug($request->input('title'));
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/courses/';
                $file->move($filePath, $filename);
                $course->avatar = '/uploads/courses/' . $filename;
            }

            $titles = $request->input('resource_titles', []);
            $links = $request->input('resource_links', []);
            $resources = array_map(function ($title, $link) {
                return [
                    'title' => $title,
                    'link' => $link
                ];
            }, $titles, $links);
            $course->resources = $resources;
            $course->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('courses.index')->with('success', 'Cập nhật khoá học thành công!');
    }

    public function deleteCourse($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index', $course->teacherId)->with('success', 'Xoá khoá học thành công!');
    }
}
