@extends('admin.master')
@section('title','Thêm mới danh mục footer')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới danh mục footer</li>
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
                        <form action="{{ route('footer.add') }}" method="post" id="formRegisterCoach" class="form-horizontal" enctype="multipart/form-data">
                            <div class="card-header">
                                <h5 class="m-0">Thêm mới danh mục footer</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Tiêu đề
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Tiêu đề" id="title" class="form-control title @error(" title") is-invalid @enderror" name="title">{{ old("title") }}</textarea>
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
                                        <textarea placeholder="Mô tả" id="description" class="form-control ckeditor description @error(" description") is-invalid @enderror" name="description">{{ old("description") }}</textarea>
                                        @error("description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right btn-sm">
                                    <i class="fas fa-save"></i> Thêm mới
                                </button>
                                <a href="{{ route('footer.index') }}" class="btn btn-secondary btn-sm">
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
<script src="/public/theme_admin/vendor/ckeditor/ckeditor.js"></script>
<script src="public/theme_admin/vendor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        height: 400,
        extraAllowedContent: 'iframe[src,frameborder,allow,allowfullscreen,width,height,style,class,id]',
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
