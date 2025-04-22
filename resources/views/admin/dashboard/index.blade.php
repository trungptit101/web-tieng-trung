@extends('admin.master')
@section('title', 'Thống kê')
@section('css')
<style>
    .table-header {
        background: #ccc;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 tab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active tab1" data-toggle="tab" href="#menu1">Biểu đồ thống kê</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab2" data-toggle="tab" href="#menu2">Xem thống kê chi tiết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
