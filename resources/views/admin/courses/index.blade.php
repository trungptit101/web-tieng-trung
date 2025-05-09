@extends('admin.master')
@section('title','Danh sách khoá học của Trung Tâm')
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
                            <h5 class="m-0">Danh sách khoá học của Trung Tâm</h5>
                        </div>
                        <div class="row" style="margin-top: 0.5rem; padding: 0 1.3rem;">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <div class="float-right mt-1">
                                    <a href="{{ route('courses.add') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-plus"></i> Thêm mới
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-news" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả khoá học</th>
                                            <th>Thông tin khoá học</th>
                                            <th>Đầu ra khoá học</th>
                                            <th>Quyền lợi học viên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$courses->isEmpty())
                                        @foreach($courses as $key => $course)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td><img src="{{ asset($course->avatar) }}" style="max-height: 200px" /></td>
                                            <td>{!! $course->description !!}</td>
                                            <td>{!! $course->infomationCourse !!}</td>
                                            <td>{!! $course->outputCourse !!}</td>
                                            <td>{!! $course->interestCourse !!}</td>
                                            <td>
                                                <a href="{{ route('courses.detail', $course->id) }}" class="btn btn-primary btn-xs" title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-xs btn-danger delete" data-link="{{ route('courses.delete', $course->id) }}" title="Xóa">
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
<link rel="stylesheet" href="{{ asset('/theme_admin/vendor/dataTable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/theme_admin/vendor/dataTable/responsive.bootstrap4.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('/theme_admin/vendor/dataTable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/theme_admin/vendor/dataTable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/theme_admin/vendor/dataTable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/theme_admin/vendor/dataTable/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-news").DataTable({
            "responsive": true,
            "autoWidth": false,
            "sort": false,
            "language": {
                "paginate": {
                    "previous": "Trước",
                    "next": "Sau"
                },
                "lengthMenu": "Hiển thị _MENU_ khoá học trên 1 trang",
                "emptyTable": "Chưa có khoá học",
                "info": "Hiển thị _START_ -> _END_ trên _TOTAL_ kết quả",
            }
        });
    });
</script>
@endsection
