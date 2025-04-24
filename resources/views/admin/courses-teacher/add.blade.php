@extends('admin.master')
@section('title','Thêm video khoá học của giáo viên')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tạo mới</li>
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
                            <h5 class="m-0">Thông tin khoá học của giáo viên</h5>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="courseForm" action="{{ route('courses.teacher.create', $teacherId) }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Tiêu đề
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Tiêu đề" id="title" class="form-control title @error(" title") is-invalid @enderror" name="title"></textarea>
                                        @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Link video
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="link video youtube">
                                        @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i> Lưu lại
                                </button>
                                <a href="{{ route('courses.teacher.index', $teacherId) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                    Trở về
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
