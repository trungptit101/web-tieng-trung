@extends('client.layouts.master')
@section('title', 'Đăng ký tư vấn thành công')
@section('css')
<style>
    .register-advise-success {
        padding: 40px 0 0 0;
        text-align: center;
    }

    .img {
        max-width: 100%;
    }
</style>
@endsection
@section('main')
<div class="register-advise-success">
    <div class="container">
        <div>
            <img class="img" src="{{ asset('/theme_client/images/cam-on-sofl.jpg') }}" />
        </div>
        <div style="padding: 20px; font-weight: bold;">
            <a href="/" style="color: #F15928; text-decoration: none; font-size">Quay về trang chủ</a>
        </div>
    </div>
</div>
@endsection
