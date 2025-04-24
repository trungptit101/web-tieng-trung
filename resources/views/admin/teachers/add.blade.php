@extends('admin.master')
@section('title','Thêm mới giáo viên')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới giáo viên</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <form action="{{ route('teachers.create') }}" method="post" id="formRegisterCoach" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label">
                                Họ và tên<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="userName" value="{{ old('userName') }}" minlength="5" placeholder="Nhập họ tên" class="form-control userName @error('userName') is-invalid @enderror">
                                @error("userName")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label">
                                Email<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control email @error('email') is-invalid @enderror">
                                @error("email")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-sm-2 col-form-label">
                                Số điện thoại<span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" minlength="5" placeholder="Số điện thoại" class="form-control phoneNumber @error('phoneNumber') is-invalid @enderror">
                                @error("phoneNumber")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">
                                Giới thiệu
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Giới thiệu" id="introduce" class="form-control ckeditor introduce @error(" introduce") is-invalid @enderror" name="introduce"></textarea>
                                @error("introduce")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">
                                Thành tích
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <textarea placeholder="Thành tích" id="skills" class="form-control ckeditor skills @error(" skills") is-invalid @enderror" name="skills"></textarea>
                                @error("skills")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">
                                Banner
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" placeholder="File content">
                                @error('banner')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">
                                Avartar
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="File content">
                                @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right btn-sm">
                            <i class="fas fa-save"></i> Thêm mới
                        </button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-circle-left"></i>
                            Trở về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .label-permission {
        cursor: pointer;
        font-weight: 500 !important;
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('skills', {
        height: 400,
        filebrowserBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '/pulic/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/public/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '/public/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKEDITOR.config.extraPlugins = 'colorbutton';
</script>
@endsection
