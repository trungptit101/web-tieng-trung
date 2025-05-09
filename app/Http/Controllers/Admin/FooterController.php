<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $footers = Footer::query()
            ->orderByDesc('id')->get();
        return view('admin.layouts-footer.index', compact('footers'));
    }

    public function detail(Request $request, $id)
    {
        $footer = Footer::find($id);
        return view('admin.layouts-footer.detail', compact('footer'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required',
        ];
        $message = [
            'description.required' => 'Mô tả không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $footer = Footer::find($id);
            $footer->title = $request->input('title');
            $footer->description = $request->input('description');
            $footer->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('footer.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function delete($id)
    {
        Footer::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }

    public function add(Request $request)
    {
        return view('admin.layouts-footer.add');
    }

    public function addNew(Request $request)
    {
        $rules = [
            'description' => 'required',
        ];
        $message = [
            'description.required' => 'Mô tả không được trống!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $footer = new Footer();
            $footer->title = $request->input('title');
            $footer->description = $request->input('description');
            $footer->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('footer.index')->with('success', 'Thêm mới danh mục thành công!');
    }
}
