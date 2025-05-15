@extends('client.layouts.master')
@section('title', 'Khoá học')
@section('css')
<style>
    .carousel-container {
        display: none;
    }

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
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .video-item .desc {
        font-size: 15px;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        height: 50px;
        overflow: hidden;
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

    .video-item .more-detail a {
        text-decoration: none;
        color: #fff;
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
            <div class="header">
                <span style="color: #25366a; text-transform: uppercase;">
                    <span>HỌC TIẾNG TRUNG
                        <span style="color: #F15928">THEO NHU CẦU CỦA BẠN</span>
                    </span>
                </span>
            </div>
            <div class="video-grid">
                @foreach($courses as $course)
                <div class="video-item">
                    <a href="{{ route('courses-detail', $course->slug) }}"><img src="{{ asset($course->avatar) }}" /></a>
                    <div class="title">
                        {{ $course->title }}
                    </div>
                    <div class="desc">{!! $course->description !!}</div>
                    <div class="more-detail">
                        <a href="{{ route('courses-detail', $course->slug) }}">XEM CHI TIẾT</a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
