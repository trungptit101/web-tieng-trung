@extends('admin.master')
@section('title','Danh sách khoá học của giáo viên')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Danh sách khoá học của giáo viên</h5>
                        </div>
                        <div class="row" style="margin-top: 0.5rem; padding: 0 1.3rem;">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <div class="float-right mt-1">
                                    <a href="{{ route('courses.teacher.add', $teacher->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-plus"></i> Thêm mới
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Video</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$courses->isEmpty())
                                        @foreach($courses as $key => $course)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td><iframe style="height: 150px; width: auto" src="{{ $course->link }}" allowfullscreen></iframe></td>
                                            <td>
                                                <a href="{{ route('courses.teacher.detail', $course->id) }}" class="btn btn-primary btn-xs" title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-xs btn-danger delete" data-link="{{ route('courses.teacher.delete', $course->id) }}" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="10" class="text-center text-danger">
                                                Không có dữ liệu!
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
