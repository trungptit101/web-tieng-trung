@extends('admin.master')
@section('title','Chi tiết tài liệu')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết tài liệu</li>
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
                        <form action="{{ route('documents.update', $document->id) }}" method="post" id="formRegisterCoach" class="form-horizontal" enctype="multipart/form-data">
                            <div class="card-header">
                                <h5 class="m-0">Chi tiết tài liệu</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Tiêu đề
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Tiêu đề" id="title" class="form-control title @error(" title") is-invalid @enderror" name="title">{{ $document->title }}</textarea>
                                        @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Nội dung
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Mô tả tài liệu" id="description" class="form-control ckeditor description @error(" description") is-invalid @enderror" name="description">{{ $document->description }}</textarea>
                                        @error("description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right btn-sm">
                                    <i class="fas fa-save"></i> Cập nhật
                                </button>
                                <a href="{{ route('documents.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-circle-left"></i>
                                    Trở về
                                </a>
                            </div>
                        </form>
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
@section('js')
<script type="text/javascript">
    CKEDITOR.replace('description', {
        height: 500,
        filebrowserBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '/public/theme_admin/vendor/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '/public/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/public/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '/public/theme_admin/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKEDITOR.config.extraPlugins = 'colorbutton';
</script>
@endsection
