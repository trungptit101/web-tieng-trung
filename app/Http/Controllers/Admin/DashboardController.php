<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Pages;
use App\Models\Contact;
use App\Models\Teachers;
use App\Models\VideoStudent;
use App\Models\RegisterAdvise;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function listImage()
    {
        $banners = Banners::query()->get();
        return view('admin.banners.index', compact('banners'));
    }
    public function addImage()
    {
        return view('admin.banners.add');
    }
    public function createImage(Request $request)
    {
        $rules = [
            'banner' => 'required',
        ];
        $message = [
            'banner.required' => 'Ảnh không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $banner = new Banners();
            if ($request->file('banner')) {
                $file = $request->file('banner');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/banners/';
                $file->move($filePath, $filename);
                $banner->image = '/uploads/banners/' . $filename;
            }
            $banner->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('banners.index')->with('success', 'Thêm ảnh thành công!');
    }

    public function deleteImage($bannerId)
    {
        $banner = Banners::find($bannerId);
        $banner->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function detailIntroduce(Request $request)
    {
        $page = Pages::Where('slug', 'gioi-thieu-trung-tam-hua-hua')->first();
        if (empty($page)) {
            $page = new Pages();
            $page->title = "Giới Thiệu HUA HUA";
            $page->link = "";
            $page->content = "";
            $page->slug = "gioi-thieu-trung-tam-hua-hua";
            $page->save();
        }
        return view('admin.pages.detail', compact('page'));
    }

    public function updateIntroduce(Request $request)
    {
        $rules = [
            'title' => 'required|min:8',
            'content' => 'required',
            'link' => 'required',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được trống!',
            'content.required' => 'Mô tả không được trống!',
            'link.required' => 'Đường dẫn video không được trống!',
            'title.min' => 'Tiêu đề ít nhất 8 kí tự!',
            'content.min' => 'Mô tả ít nhất 8 kí tự!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $page = Pages::Where('slug', 'gioi-thieu-trung-tam-hua-hua')->first();
            $page->title = $request->input('title');
            $page->link = $request->input('link');
            $page->content = $request->input('content');
            $page->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('pages.introduce.detail')->with('success', 'Cập nhật thông tin giới thiệu thành công!');
    }

    public function listTeachers(Request $request)
    {
        $teachers = Teachers::query()->paginate(20);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function addFormTeacher(Request $request)
    {
        return view('admin.teachers.add');
    }

    public function detailTeacher(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('admin.teachers.detail', compact('teacher'));
    }

    public function createTeacher(Request $request)
    {
        $rules = [
            'userName' => 'required',
            'email' => 'required|unique:users',
            'phoneNumber' => 'required',
            'skills' => 'required',
            'introduce' => 'required',
            'avatar' => 'required',
            'banner' => 'required',
        ];
        $message = [
            'email.required' => 'Email không được trống!',
            'email.unique' => 'Email đã tồn tại!',
            'phoneNumber.required' => 'Số điện thoại không được trống!',
            'userName.required' => 'Họ và tên không được trống!',
            'skills.required' => 'Thành tích không được trống!',
            'introduce.required' => 'Giới thiệu không được trống!',
            'avatar.required' => 'Ảnh không được trống!',
            'banner.required' => 'Banner không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $teacher = new Teachers();
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/avatar/';
                $file->move($filePath, $filename);
                $teacher->avatar = '/uploads/avatar/' . $filename;
            }
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/avatar/';
                $file->move($filePath, $filename);
                $teacher->banner = '/uploads/avatar/' . $filename;
            }
            $teacher->userName = $request->input('userName');
            $teacher->email = $request->input('email');
            $teacher->phoneNumber = $request->input('phoneNumber');
            $teacher->skills = $request->input('skills');
            $teacher->introduce = $request->input('introduce');
            $teacher->slug = Str::slug($request->input('userName'));;
            $teacher->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('teachers.index')->with('success', 'Thêm mới giáo viên thành công!');
    }

    public function updateTeacher(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/avatar/';
            $file->move($filePath, $filename);
            $teacher->avatar = '/uploads/avatar/' . $filename;
        }
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/avatar/';
            $file->move($filePath, $filename);
            $teacher->banner = '/uploads/avatar/' . $filename;
        }
        $teacher->userName = $request->input('userName');
        $teacher->phoneNumber = $request->input('phoneNumber');
        $teacher->skills = $request->input('skills');
        $teacher->introduce = $request->input('introduce');
        $teacher->slug = Str::slug($teacher->userName);
        $teacher->save();
        return redirect()->route('teachers.index')->with('success', 'Cập nhật thông tin giáo viên thành công!');
    }

    public function deleteTeacher($id)
    {
        Teachers::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa giáo viên thành công');
    }

    public function listVideosStudent(Request $request)
    {
        $videos = VideoStudent::query()->get();
        return view('admin.videos-student.index', compact('videos'));
    }

    public function addVideoStudent()
    {
        return view('admin.videos-student.add');
    }

    public function deleteVideoStudent($id)
    {
        VideoStudent::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa video học viên thành công');
    }
    public function createVideoStudent(Request $request)
    {
        $rules = [
            'video' => 'required',
        ];
        $message = [
            'video.required' => 'Link video không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $video = new VideoStudent();
            $video->video = $request->input('video');
            $video->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('videos.student.index')->with('success', 'Thêm video học viên thành công!');
    }

    public function listRegister(Request $request)
    {
        $forms = RegisterAdvise::query()
            ->orderByDesc('id')->get();
        return view('admin.register.index', compact('forms'));
    }

    public function detailContact(Request $request)
    {
        $contact = Contact::where('slug', 'lien-he')->first();
        if (empty($contact)) {
            $contact = new Contact();
            $contact->contact = "";
            $contact->slug = "lien-he";
            $contact->save();
        }
        return view('admin.contact.detail', compact('contact'));
    }

    public function updateContact(Request $request)
    {
        try {
            $contact = Contact::where('slug', 'lien-he')->first();
            $contact->contact = $request->input('contact');
            $contact->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('contact.detail')->with('success', 'Cập nhật thông tin liên hệ thành công!');
    }
}
