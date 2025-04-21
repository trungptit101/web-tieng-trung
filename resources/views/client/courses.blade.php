@extends('client.layouts.master')
@section('title', 'Khoá học')
@section('css')
<style>
    .list-course-container {
        /* background: url("./theme_client/images/bg-courses.png"); */
        background-color: #f2f2f2;
        /* background-size: cover; */
    }

    .list-course {
        text-align: center;
        padding: 0 0 50px 0;
    }

    .list-course .header {
        font-size: 24px;
        font-weight: bold;
        color: #f05a22;
        padding: 30px 0;
        text-align: center;
    }

    .list-course .header::after {
        content: '';
        display: block;
        width: 50px;
        height: 5px;
        background-color: #f05a22;
        margin: 5px auto;
    }

    .list-course h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .list-course .highlight {
        color: #f05a22;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .video-item {
        background: #fff;
        padding: 10px;
        border-radius: 12px;
    }

    .video-item img {
        width: 100%;
        cursor: pointer;
    }

    .video-item .title {
        font-size: 18px;
        font-weight: 700;
    }

    .video-item .desc {
        font-size: 15px;
        font-weight: 600;
    }

    .video-item .more-detail {
        font-size: 15px;
        font-weight: 600;
        background: #f05a22;
        width: fit-content;
        margin: 0px auto;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 10px 20px;
        color: #ffffff;
        cursor: pointer;
    }

    .video-item .title::after {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background-color: #f05a22;
        margin: 5px auto;
    }

    .video-item iframe {
        width: 100%;
        height: 180px;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive: Điều chỉnh chiều cao iframe trên thiết bị nhỏ hơn */
    @media (max-width: 576px) {
        .video-item iframe {
            height: 160px;
        }
    }
</style>
@endsection
@section('main')
<div class="list-course-container">
    <div class="container">
        <section class="list-course">
            <div class="header">KHOÁ HỌC</div>
            <div class="video-grid">
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course1.png') }}" />
                    <div class="title">
                        KHOÁ TIẾNG TRUNG HSK 3
                    </div>
                    <div class="desc">Toàn diện 4 kỹ năng nghe - nói - đọc - viết trong 5 tháng</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course2.jpg') }}" />
                    <div class="title">
                        KHOÁ TIẾNG TRUNG HSK 4
                    </div>
                    <div class="desc">Tích luỹ 1200 từ vựng và 150 cấu trúc ngữ pháp trình độ HSK 4</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course3.jpg') }}" />
                    <div class="title">
                        HỌC TIẾNG TRUNG ONLINE
                    </div>
                    <div class="desc">Toàn diện 4 kỹ năng NGHE - ĐỌC - NÓI - VIẾT, lích học linh hoạt, Tương tác trục tiếp</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course1.png') }}" />
                    <div class="title">
                        KHOÁ TIẾNG TRUNG HSK 3
                    </div>
                    <div class="desc">Toàn diện 4 kỹ năng nghe - nói - đọc - viết trong 5 tháng</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course2.jpg') }}" />
                    <div class="title">
                        KHOÁ TIẾNG TRUNG HSK 4
                    </div>
                    <div class="desc">Tích luỹ 1200 từ vựng và 150 cấu trúc ngữ pháp trình độ HSK 4</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
                <div class="video-item">
                    <img src="{{ asset('theme_client/images/course3.jpg') }}" />
                    <div class="title">
                        HỌC TIẾNG TRUNG ONLINE
                    </div>
                    <div class="desc">Toàn diện 4 kỹ năng NGHE - ĐỌC - NÓI - VIẾT, lích học linh hoạt, Tương tác trục tiếp</div>
                    <div class="more-detail">XEM CHI TIẾT</div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
