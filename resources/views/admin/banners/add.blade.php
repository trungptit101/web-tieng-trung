@extends('admin.master')
@section('title','Thêm ảnh')
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
                            <h5 class="m-0">Thông tin ảnh</h5>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="courseForm" action="{{ route('banners.createImage') }}">
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hình ảnh
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" placeholder="Hình ảnh bài giảng">
                                        @error('banner')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i> Lưu lại
                                </button>
                                <a href="{{ route('banners.index') }}" class="btn btn-secondary">
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
