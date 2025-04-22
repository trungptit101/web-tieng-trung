<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Pages;
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

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard.index');
    // }

    public function index(Request $request)
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

    public function deleteImage(Request $request, $bannerId)
    {
        $banner = Banners::find($bannerId);
        $banner->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function detailIntroduce(Request $request)
    {
        $page = Pages::Where('slug', 'gioi-thieu-hua-hua')->first();
        if(empty($page)) {
            $page = new Pages();
            $page->title = "Giới Thiệu HUA HUA";
            $page->link = "";
            $page->content = "";
            $page->slug = "gioi-thieu-hua-hua";
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
            $page = Pages::Where('slug', 'gioi-thieu-hua-hua')->first();
            $page->title = $request->input('title');
            $page->link = $request->input('link');
            $page->content = $request->input('content');
            $page->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('pages.introduce.detail')->with('success', 'Cập nhật thông tin giới thiệu thành công!');
    }
}
