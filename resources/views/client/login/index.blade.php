@extends('client.layouts.master')
@section('title', 'Đăng nhập')
@section('css')
<style>
</style>
@endsection

@section('main')
<div style="background-color: rgb(208, 1, 27);">
    <div style="
        background-image: url('/images/banner-login.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        min-height: 500px;
        display: flex;
        align-items: center;
        padding: 3% 0;
        justify-content: flex-end;">
        <div class="modal-content rounded">
            <div class="col-inner login-form">
                <div class="d-sm-none pb-4"><button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button></div>
                <div class="site-logo text-center d-sm-none"><a href="https://sanpay.vn"><img src="{{ asset('/images/logo-sanpay2.png') }}" alt="sanpay" class="img-fluid"></a></div>
                <div class="modal-header">
                    <h5 class="modal-title modal-title-1">
                        <span>Đăng nhập</span>
                    </h5>
                    <h5 class="modal-title modal-title-2 d-none">
                        <span class="form-come-back" onclick="formBack()"><i aria-hidden="true" class="fa fa-arrow-left"></i></span>
                        <span> Đăng nhập</span>
                    </h5>
                    <!-- <button type="button" data-dismiss="modal" aria-label="Close" class="close d-none d-sm-block"><span aria-hidden="true">×</span></button> -->
                </div>
                <div class="modal-body">
                    <div class="container" style="margin-top: 10px;">
                        <form method="POST" action="" id="login-form">
                            <div class="form-group">
                                <label for="">Email / Số điện thoại<span>*</span></label>
                                <input type="text" name="username" placeholder="Nhập Email" class="form-control">
                            </div>
                            <div class="form-group password">
                                <label for="">Mật khẩu<span>*</span></label>
                                <input type="password" name="password" minlength="6" placeholder="Nhập mật khẩu" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 10px; margin-bottom: 5px;">
                                <!-- <button type="button" onclick="clickBtnCheckUserName()" class="btn btn-primary btn-block btn-check-login">
                                    <i aria-hidden="true" class="fa fa-arrow-circle-right"></i>
                                    <span>TIẾP TỤC</span>
                                </button> -->
                                <button type="button" onclick="handleLogin()" class="btn btn-primary btn-block btn-login">
                                    <i aria-hidden="true" class="fa fa-arrow-circle-right"></i>
                                    <span>ĐĂNG NHẬP</span>
                                </button>
                            </div>
                            <div style="font-size: .85rem; cursor: pointer; display: flex; justify-content: space-between;">
                                <a class="hZ5QQO" href="">Quên mật khẩu</a>
                                <a class="hZ5QQO" href="">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <input type="hidden" name="valid_otp" value="">
            <div class="awPXwj">
                <div class="NleHE1">
                    <div class="rEVZJ2"></div><span class="EMof35">hoặc</span>
                    <div class="rEVZJ2"></div>
                </div>
                <div class="SR5mQ0 social-login">
                    <a class="eADVqX b7kM6N KIySnv facebook" href="">
                        <div class="zwXUkg">
                            <i class="lab la-facebook-f"></i>
                        </div>
                        <div class="">Facebook</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
