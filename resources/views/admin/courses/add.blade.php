@extends('admin.master')
@section('title','Thêm khoá học')
<style>
    .resource-list {
        margin-top: 10px;
    }

    .resource-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .resource-item input {
        flex: 1;
        margin-right: 10px;
    }

    .resource-item button {
        background: #ff4444;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .resource-item button:hover {
        background: #cc0000;
    }

    .add-resource-btn {
        background: #0085ef;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 15px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .add-resource-btn:hover {
        background: #0468bb;
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(45deg, #f44336, #ff7043);
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
    }
</style>
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
                            <h5 class="m-0">Thông tin khoá học</h5>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" id="courseForm" action="{{ route('courses.create') }}">
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
                                    <label class="col-sm-2 col-form-label">Hình ảnh
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" placeholder="Hình ảnh khoá học">
                                        @error('avatar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Mô tả khoá học
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Mô tả khoá học" id="description" class="form-control ckeditor description @error(" description") is-invalid @enderror" name="description"></textarea>
                                        @error("description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Thông tin khoá học
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Thông tin khoá học" id="infomationCourse" class="form-control ckeditor infomationCourse @error(" infomationCourse") is-invalid @enderror" name="infomationCourse"></textarea>
                                        @error("infomationCourse")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Đầu ra khoá học
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Đầu ra khoá học" id="outputCourse" class="form-control ckeditor outputCourse @error(" outputCourse") is-invalid @enderror" name="outputCourse"></textarea>
                                        @error("outputCourse")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Quyền lợi học viên
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Quyền lợi học viên" id="interestCourse" class="form-control ckeditor interestCourse @error(" interestCourse") is-invalid @enderror" name="interestCourse"></textarea>
                                        @error("interestCourse")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Mô tả tài liệu
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Mô tả tài liệu" id="descriptionDocument" class="form-control ckeditor descriptionDocument @error(" descriptionDocument") is-invalid @enderror" name="descriptionDocument">
                                        </textarea>
                                        @error("descriptionDocument")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Trích dẫn
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Trích dẫn" id="quote" class="form-control quote @error(" quote") is-invalid @enderror" name="quote">
                                        </textarea>
                                        @error("quote")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">
                                        Danh sách tài liệu
                                    </label>
                                    <div class="resource-list col-sm-10" id="resource-list">
                                        <div class="resource-item">
                                            <input type="text" required class="form-control" name="resource_titles[]" placeholder="Nhập tài liệu (e.g., Tuyển tập bộ đề thi HSK 3...)">
                                            <input type="text" required class="form-control" name="resource_links[]" placeholder="Đường dẫn (e.g., https://example.com)">
                                            <button type="button" class="remove-resource">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">
                                    </label>
                                    <div class="resource-list col-sm-10" id="resource-list">
                                        <button type="button" class="add-resource-btn" id="add-resource">Thêm tài liệu</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i> Lưu lại
                                </button>
                                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
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
@section('js')
<script>
    const resourceList = document.getElementById('resource-list');
    const addResourceBtn = document.getElementById('add-resource');

    addResourceBtn.addEventListener('click', () => {
        const newResourceItem = document.createElement('div');
        newResourceItem.classList.add('resource-item');
        newResourceItem.innerHTML = `
                <input type="text" name="resource_titles[]" class="form-control" placeholder="Tiêu đề tài liệu (e.g., Tuyển tập bộ đề thi HSK 3...)">
                <input type="text" name="resource_links[]" class="form-control" placeholder="Đường dẫn (e.g., https://example.com)">
                <button type="button" class="remove-resource">Xóa</button>
            `;
        resourceList.appendChild(newResourceItem);
    });

    resourceList.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-resource')) {
            if (resourceList.children.length > 0) {
                e.target.parentElement.remove();
            } else {
                alert('Phải có ít nhất một tài liệu!');
            }
        }
    });
</script>
@endsection
