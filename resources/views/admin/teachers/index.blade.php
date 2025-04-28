@extends('admin.master')
@section('title','Danh sách giáo viên')
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
                            <h5 class="m-0">Danh sách giáo viên</h5>
                        </div>
                        <div class="row" style="margin-top: 0.5rem; padding: 0 1.3rem;">
                            <div class="col-3">
                                <div class="mt-1">
                                    <a href="{{ route('teachers.add') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-plus"></i> Thêm mới
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-accounts" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th>Avatar</th>
                                            <th>Banner</th>
                                            <th>Email</th>
                                            <th>Họ và tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Giới thiệu</th>
                                            <th>Thành tích</th>
                                            <th>Khoá học</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teachers as $key => $teacher)
                                        <tr>
                                            <td class="text-center" style="font-weight: bold;">{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($teacher->avatar) }}" height="100" style="border-radius: 50%" /></td>
                                            <td style="padding: 10px 20px;"><img src="{{ asset($teacher->banner) }}" style="max-height: 300px;" /></td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->userName }}</td>
                                            <td>{{ $teacher->phoneNumber }}</td>
                                            <td style="max-width: 400px">{!! $teacher->introduce !!}</td>
                                            <td>{!! $teacher->skills !!}</td>
                                            <td style="min-width: 100px; font-weight: bold; color: #f05a22;">
                                                <a href="{{ route('courses.teacher.index', $teacher->id) }}">{!! \App\Models\Teachers::getCountCourse($teacher->id) !!} khoá học</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('teachers.detail', $teacher->id) }}" class="btn btn-primary btn-xs" title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-xs btn-danger delete" data-link="{{ route('teachers.delete', $teacher->id) }}" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
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
@section('css')
<style>
    table.dataTable.table-sm>thead>tr>th {
        padding-right: 20px;
        border-bottom: 1px;
        border-top: 1px;
    }

    table.table th {
        padding-top: 1.1rem;
        padding-bottom: 1rem;
    }
</style>
@endsection
