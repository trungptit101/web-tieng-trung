@extends('admin.master')
@section('title','Chỉnh sửa trang liên hệ')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa trang liên hệ</li>
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
                        <form action="{{ route('contact.update') }}" method="post" id="formRegisterCoach" class="form-horizontal" enctype="multipart/form-data">
                            <div class="card-header">
                                <h5 class="m-0">Chỉnh sửa trang liên hệ</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Nội dung
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Nội dung" id="contact" class="form-control ckeditor contact @error("contact") is-invalid @enderror" name="contact">{{ $contact->contact }}</textarea>
                                        @error("contact")
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
