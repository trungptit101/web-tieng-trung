<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    public function index(Request $request)
    {
        $documents = Documents::query()
            ->orderByDesc('id')->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function detail(Request $request, $id)
    {
        $document = Documents::find($id);
        return view('admin.documents.detail', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:8',
            'description' => 'required|min:8',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được trống!',
            'description.required' => 'Mô tả không được trống!',
            'title.unique' => 'Tiêu đề đã bị trùng!',
            'title.min' => 'Tiêu đề ít nhất 8 kí tự!',
            'description.min' => 'Mô tả ít nhất 8 kí tự!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $document = Documents::find($id);
            $document->title = $request->input('title');
            $document->description = $request->input('description');
            $document->slug = Str::slug($document->title);
            $document->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('documents.index')->with('success', 'Cập nhật tài liệu thành công!');
    }

    public function delete($id)
    {
        Documents::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa tài liệu thành công');
    }

    public function add(Request $request)
    {
        return view('admin.documents.add');
    }

    public function addNew(Request $request)
    {
        $rules = [
            'title' => 'required|min:8',
            'description' => 'required|min:8',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được trống!',
            'description.required' => 'Mô tả không được trống!',
            'title.min' => 'Tiêu đề ít nhất 8 kí tự!',
            'description.min' => 'Mô tả ít nhất 8 kí tự!',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $document = new Documents();
            $document->title = $request->input('title');
            $document->description = $request->input('description');
            $document->slug = Str::slug($document->title);
            $document->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }
        return redirect()->route('documents.index')->with('success', 'Thêm mới tài liệu thành công!');
    }
}
