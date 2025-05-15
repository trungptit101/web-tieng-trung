@extends('client.layouts.master')
@section('title', $course->title)
@section('css')
<style>
    .carousel-container {
        display: none;
    }

    .banner-background {
        display: none !important;
    }

    #header-kh {
        /* background: url("../theme_client/images/khoa-hoc.png"); */
        background: #dd5704;
        background-size: 100%;
    }

    .course-detail-banner {
        padding-top: 10px;
    }

    .text-tr {
        max-width: 600px;
        margin: auto;
        color: #fff;
        font-size: 21px;
        line-height: 26px;
    }

    .route-step-course {
        background: #FCB400;
        color: #000;
        padding-bottom: 20px;
    }

    .no-mar {
        padding: 15px 0;
        font-size: 19px;
        font-weight: 600;
    }

    .no-mar::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #fff;
        margin: 5px auto;
    }

    .title-step {
        margin-top: 30px;
        padding: 15px 0;
        font-size: 19px;
        font-weight: 600;
    }

    .title-step::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #000;
        margin: 5px auto;
    }

    .step .desc {
        font-size: 16px;
    }

    @media (min-width: 576px) {
        .step {
            position: relative;
        }

        .icon-img {
            position: absolute;
            top: -35px;
            left: calc(50% - 35px);
        }

    }

    @media (max-width: 576px) {
        .route-step-course {
            padding-top: 20px;
        }

        .step {
            margin-bottom: 20px;
        }

    }

    @media (max-width: 768px) {
        .documents-list {
            padding: 0 0 0 20px;
        }

    }

    .bg-tabkhoa {
        background: #eee;
        padding: 50px 0;
    }

    .nav-tabs {
        background: #ffffff;
        border: none !important;
        font-size: 20px;
    }

    button:focus {
        border: none !important;
    }

    .nav-tabs .nav-link .active,
    .nav-link:focus,
    .nav-link:hover,
    .nav-link:focus-visible {
        outline: none !important;
        border-color: #fff !important;
    }

    .nav-link.active {
        border-color: #fff !important;
        color: #f05a22 !important;
        position: relative;
    }

    .nav-link.active::after {
        content: '';
        display: block;
        width: 100%;
        height: 3px;
        background-color: #f05a22;
        position: absolute;
        bottom: -2px;
        left: 0px;
    }

    .nav-link {
        height: 58px;
        font-weight: 600;
        background: #ffffff;
        outline: none !important;
    }

    .tab-pane {
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 20px;
        background: url("./theme_client/images/bg-qua.jpg");
    }

    .tab-pane ul {
        padding: 0;
        margin-bottom: 0px;
    }

    .tab-pane ul li {
        line-height: 30px;
        font-size: 19px;
    }

    .tab-pane ul li i {
        color: #f05a22;
        margin-right: 5px;
    }

    .bg-tvh {
        /* background: url("../theme_client/images/khoa-hoc.png"); */
        background: #dd5704;
        margin-bottom: 40px;
    }

    .bg-tvh .title {
        font-size: 32px;
        color: white;
    }

    .bg-tvh .title::after {
        content: '';
        display: block;
        width: 50px;
        height: 5px;
        background-color: white;
        margin: 5px auto;
    }

    .box-title {
        padding: 40px 0 20px 0;
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
        background: #fff;
        height: 42px;
        border-radius: 4px;
        border: 1px solid #ddd;
        padding: 1px;
    }

    .form-group .fa {
        z-index: 1;
        padding-left: 10px;
        padding-top: 12px;
        position: absolute;
        left: 0;
    }

    .form-1 {
        position: absolute;
        padding-left: 30px;
        background: #fff;
        border-radius: 4px;
        left: 1px;
        top: 1px;
        right: 1px;
        bottom: 1px;
        padding-right: 0;
    }

    .form-control {
        display: block;
        width: 100%;
        height: 35px;
        padding: 6px 12px;
        font-size: 15px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px !important;
    }

    .form-group .form-control {
        border: 0;
    }

    .btn-register {
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        background: #FCB400;
        color: #000;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 12px;
        font-size: 16px;
        text-transform: uppercase;
        border-radius: 4px;
        width: 100%;
        margin-bottom: 20px;
    }

    .btn-register:focus {
        border: none !important;
        outline: none;
    }

    .bg-khoa {
        /* background: url("../theme_client/images/khoa-hoc.png"); */
        background: #dd5704;
        padding-bottom: 40px;
    }

    .title-khai-giang {
        font-size: 24px;
        text-transform: uppercase;
        font-weight: bold;
        color: #fff;
        padding: 40px 0;
    }

    .title-khai-giang::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #fff;
        margin: 5px auto;
    }

    .watch-calendar-course {
        background: #FCB400;
        width: fit-content;
        padding: 12px;
        text-transform: uppercase;
        color: #000;
        font-weight: 600;
        position: relative;
        bottom: 100px;
        left: calc(50% - 136px);
    }

    .bg-w-1 {
        background: #fff;
        padding: 30px 0;
    }

    .title-document {
        font-size: 24px;
        text-transform: uppercase;
        font-weight: 600;
        color: #F15928;
        padding: 40px 0;
    }

    .title-document::after {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background-color: #F15928;
        margin: 5px auto;
    }

    .resource-document {
        background: #FCB400;
    }

    .resource-document-left {
        display: flex;
        align-items: center;
        /* background: url("../theme_client/images/khoa-hoc.png"); */
        background: #dd5704;
    }

    .resource-document-title {
        font-size: 36px;
        color: #ffffff;
        text-align: center;
        font-weight: 600;
    }

    .resource-document-right {
        padding: 10px 15px;
    }

    .resource-document-right i {
        font-size: 34px;
    }

    .resource-document-right .desc {
        font-weight: 600;
        color: #000;
    }

    .step-resource-course {
        cursor: pointer;
        background: #FCB400;
        padding: 10px;
        margin: 15px 5px;
        padding-left: 60px;
        font-weight: bold;
        color: #000;
    }

    .step-number {
        height: 40px;
        line-height: 40px;
        width: 40px;
        text-align: center;
        position: absolute;
        left: -10px;
        top: -10px;
        background: #E21E26;
        color: #fff;
        font-size: 24px;
    }

    .title-course {
        color: #ff0;
        font-weight: bold;
        font-size: 46px;
    }

    .category-course {
        margin-top: 15px;
        font-size: 36px;
        font-weight: bold;
        color: #fff;
    }

    .desc {
        font-weight: 600;
        color: #fff;
        font-size: 22px;
        padding: 0 20%;
    }

    @media (max-width: 1024px) {
        .title-course {
            font-size: 38px;
        }

        .category-course {
            font-size: 30px;
        }

        .desc {
            font-size: 20px;
            padding: 0 10%;
        }
    }

    @media (max-width: 768px) {
        .title-course {
            font-size: 30px;
        }

        .category-course {
            font-size: 26px;
        }

        .desc {
            font-size: 16px;
            padding: 0;
        }
    }
</style>
@endsection
@section('main')
<div id="header-kh">
    <div class="container">
        <div class="course-detail-banner">
            <div class="text-center category-course">
                KHOÁ HỌC TIẾNG TRUNG
            </div>
            <div class="text-center title-course">
                {{ $course->title }}
            </div>
            <div class="text-center desc">
                <div class="normal">
                    Khóa học tiếng Trung HSK3 / HSKK chuyên về giao tiếp dành cho người mới bắt đầu, giúp bạn hoàn thiện 4 kỹ năng NGHE - NÓI - ĐỌC - VIẾT cơ bản tạo nên tảng vững chắc để học lên trình độ HSK4
                </div>
                <div>
                    <img src="{{ asset('/theme_client/images/tap-the-trung-1.png') }}" alt="khoa-hoc" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="route-step-course">
    <div class="bg-ctt ">
        <div class="container ">
            <div class="steps row">
                <div class="col-xs-12 col-sm-4 text-center step">
                    <div class="icon-img">
                        <img src="{{ asset('theme_client/images/uy-tin-lau-nam.png') }}" alt="UY TÍN LÂU NĂM" class=" bor-15" style="margin :0 auto">
                    </div>
                    <div class="title-step">
                        UY TÍN LÂU NĂM
                    </div>
                    <div class="pd-lr-10" style="font-weight: bold;">Trung tâm tiếng Trung SOFL hoạt động từ năm 2008 là đơn vị tiên phong trong lĩnh vực đào tạo tiếng Trung cho người Việt.</div>
                    <div class="clear"></div>
                </div>
                <div class="col-xs-12 col-sm-4 text-center step">
                    <div class="icon-img">
                        <img src="{{ asset('theme_client/images/doi-ngu-giang-vien-gioi.png') }}" alt="ĐỘI NGŨ GIẢNG VIÊN GIỎI" class=" bor-15" style="margin :0 auto">
                    </div>
                    <div class="title-step">
                        ĐỘI NGŨ GIẢNG VIÊN GIỎI
                    </div>
                    <div class="pd-lr-10" style="font-weight: bold;">100% đội ngũ giáo viên đều có bằng chứ chỉ HSK 5 trở lên, là cử nhân của các trường đại học lớn, kinh nghiệm giảng dạy trên 3 năm.</div>
                    <div class="clear"></div>
                </div>
                <div class="col-xs-12 col-sm-4 text-center step">
                    <div class="icon-img">
                        <img src="{{ asset('theme_client/images/phuong-phap-toi-uu.png') }}" alt="PHƯƠNG PHÁP TỐI ƯU" class=" bor-15" style="margin :0 auto">
                    </div>
                    <div class="title-step">
                        PHƯƠNG PHÁP TỐI ƯU
                    </div>
                    <div class="pd-lr-10" style="font-weight: bold;">Lộ trình học chuẩn quốc tế, xây dựng các giờ học tập chung và các hoạt động học bằng hình ảnh, âm thanh kết hợp trò chơi.</div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-tabkhoa">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="infomation-course" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    THÔNG TIN KHOÁ HỌC
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="course-output" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    ĐẦU RA KHOÁ HỌC
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="student-rights" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    QUYỀN LỢI HỌC VIÊN
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="infomation-course">
                {!! $course->infomationCourse !!}
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="course-output">
                {!! $course->outputCourse !!}
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="student-rights">
                {!! $course->interestCourse !!}
            </div>
        </div>
    </div>
</div>
<div class="bg-tvh" id="form-chinh">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6" style="display: flex; align-items: center;">
                <img alt="" src="{{ asset('theme_client/images/mask-group-2.png') }}" style="max-width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="box-title">
                    <div class="title text-center">ĐĂNG KÝ TƯ VẤN KHOÁ HỌC</div>
                </div>
                <div id="dkkh">
                    <div class="login-wrapper">
                        <div class="login-content">
                            <form action="{{ route('register-advise') }}" method="POST" id="test-form">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-user"></i>
                                        <span class="form-1">
                                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên của bạn" required="">
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group ">
                                        <i class="fa fa-envelope"></i>
                                        <span class="form-1">
                                            <input type="email" class="form-control" name="email" placeholder="Nhập Email" required="">
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group ">
                                        <i class="fa fa-phone"></i>
                                        <span class="form-1">
                                            <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required="" pattern="([0-9]{10})">
                                        </span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <i class="fa fa-pencil-square"></i>
                                        <span class="form-1">
                                            <input type="text" class="form-control" name="course" value="{{ $course->title }}" readonly="" required="">
                                        </span>
                                    </div>
                                </div>
                                <button class="btn-register" type="submit">Đăng kí tư vấn </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-khoa">
    <div class="container">
        <div class="title-khai-giang">
            <div class="text-center">Lịch khai giảng {{ $course->title }}</div>
        </div>
        <div class="mr-10">
            <img alt="" src="{{ asset($course->calendarOpening) }}" style="width: 100%">
        </div>
        <!-- <div class="text-center watch-calendar-course">
            Xem chi tiết lịch khai giảng
        </div> -->
        <div class="clear"></div>
    </div>
</div>
@if($course->descriptionDocument)
<div class="bg-w-1">
    <div class="container">
        <div class="">
            <div class="title-document">
                <div class="text-center">Tài liệu {{ $course->title }}</div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <img src="{{ asset('theme_client/images/giao-trinh-boya_7_1.jpg') }}" alt="Tài liệu học khóa học HSK 3" style="width: 100%">
                </div>
                <div class="col-xs-12 col-md-6">
                    {!! $course->descriptionDocument !!}
                </div>
            </div>
        </div>
        <div>
            <div class="row resource-document">
                <div class="col-md-4 resource-document-left">
                    <div class="resource-document-title"> NGUỒN TÀI LIỆU HỌC BỔ ÍCH</div>
                </div>
                <div class="col-md-8 resource-document-right">
                    <i class="fa fa-quote-left"></i>
                    <div class="desc">
                        {{ $course->quote }}
                    </div>
                    <div class="text-right">
                        <i class="fa fa-quote-right fr"></i>
                    </div>
                </div>
            </div>
            <div class="documents-list row" style="margin-top: 40px">
                @if($course->resources)
                @foreach(json_decode($course->resources) as $key => $resource)
                <div class="col-xs-12 col-md-6">
                    <a>
                        <div class="step-resource-course" onClick="openDocumentLink('{{ $resource->link }}')">
                            <div class="step-number">
                                @if($key < 9)
                                    0{{$key + 1}}
                                    @else
                                    {{$key + 1}}
                                    @endif
                                    </div>
                                    Tuyển tập bộ đề thi HSK 3 “cực sát” năm 2022
                            </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection
<script>
    function openDocumentLink(link) {
        window.location.href = link;
    }
</script>
