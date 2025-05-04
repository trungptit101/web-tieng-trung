@extends('admin.master')
@section('title','Danh sách đăng ký tư vấn')
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
                            <h5 class="m-0">Danh sách đăng ký tư vấn</h5>
                        </div>
                        <div class="row" style="margin-top: 0.5rem; padding: 0 1.3rem;">
                            <div class="col-12" style="text-align: right">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-news" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Khoá học</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$forms->isEmpty())
                                        @foreach($forms as $key => $form)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $form->name }}</td>
                                            <td>{{ $form->email }}</td>
                                            <td>{{ $form->phone }}</td>
                                            <td>{{ $form->course }}</td>
                                            <td>{{ $form->created_at }}</td>
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
                "lengthMenu": "Hiển thị _MENU_ tin tức trên 1 trang",
                "emptyTable": "Chưa có tin tức",
                "info": "Hiển thị _START_ -> _END_ trên _TOTAL_ kết quả",
            }
        });
    });
</script>
@endsection
