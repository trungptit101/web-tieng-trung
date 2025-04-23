@extends('admin.master')
@section('title','Giới thiệu về HUA HUA')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giới thiệu về HUA HUA</li>
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
                        <form action="{{ route('pages.introduce.update') }}" method="post" id="formRegisterCoach" class="form-horizontal" enctype="multipart/form-data">
                            <div class="card-header">
                                <h5 class="m-0">Giới thiệu về HUA HUA</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Tiêu đề
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Tiêu đề" id="title" class="form-control title @error("title") is-invalid @enderror" name="title">{{ $page->title }}</textarea>
                                        @error("title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Đường dẫn video
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Đường dẫn video" id="link" class="form-control link @error("link") is-invalid @enderror" name="link">{{ $page->link }}</textarea>
                                        @error("link")
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
                                        <textarea placeholder="Nội dung" id="content" class="form-control ckeditor content @error("content") is-invalid @enderror" name="content">{{ $page->content }}</textarea>
                                        @error("content")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right btn-sm">
                                    <i class="fas fa-save"></i> Cập nhật
                                </button>
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
    CKEDITOR.replace('content', {
        height: 500,
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
