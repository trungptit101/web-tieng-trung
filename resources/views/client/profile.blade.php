@extends('client.layouts.master')
@section('title', 'Trang giới thiệu')
@section('css')
<style>
    .carousel-container {
        display: none;
    }

    .teacher-section {
        background-color: #f2f2f2;
    }

    .teacher-section-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 40px 0;
    }

    .teacher-card {
        color: #fff;
        width: 300px;
        border-radius: 20px;
        text-align: center;
        flex-shrink: 0;
    }

    .teacher-img {
        width: 100%;
        border-radius: 10px;
    }

    .teacher-info .main-title {
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0 5px;
    }

    .teacher-info .sub-title {
        font-size: 14px;
        font-style: italic;
        margin-bottom: 15px;
    }

    .teacher-info ul {
        list-style: none;
        padding: 0;
        margin-bottom: 10px;
        text-align: left;
    }

    .teacher-info ul li {
        margin: 5px 0;
    }

    .teacher-info .quote {
        font-size: 12px;
        font-style: italic;
        color: #fff;
        margin-top: 10px;
    }

    .teacher-detail {
        flex: 1;
        min-width: 300px;
        padding: 30px 0 0 30px;
    }

    .teacher-detail h3 {
        margin: 15px 0 10px;
        color: #333;
    }

    .teacher-detail ul {
        padding-left: 20px;
    }

    .teacher-detail ul li {
        margin-bottom: 8px;
    }

    iframe {
        height: 100%;
        width: 100%;
    }

    .list-course {
        text-align: center;
        padding: 0 0 50px 0;
        background-color: #fff;
    }

    .list-course .header {
        font-size: 24px;
        font-weight: bold;
        color: #F15928;
        padding: 30px 0;
        text-align: center;
    }

    .list-course .header::after {
        content: '';
        display: block;
        width: 50px;
        height: 5px;
        background-color: #F15928;
        margin: 5px auto;
    }

    .list-course h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .list-course .highlight {
        color: #e63946;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .video-item .title {
        text-align: left;
        font-weight: bold;
    }

    .video-item .author {
        text-align: left;
        color: #515050;
        font-size: 15px;
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

    .teacher-detail h4 {
        color: #F15928;
        font-weight: bold;
    }

    .introduce {
        font-weight: bold;
        text-align: justify;
    }

    .skills {
        font-weight: bold;
        text-align: justify;
    }
</style>
@endsection
@section('main')

<div class="teacher-section">
    <div class="container">
        <div class="teacher-section-container">
            <div class="teacher-card">
                <img src="{{ $teacher->banner }}" alt="Giảng viên" class="teacher-img">
            </div>

            <div class="teacher-detail">
                <h4>
                    <span style="color: #25366a;">
                        <span>Giới Thiệu về
                            <span style="color: #F15928">{{ $teacher->userName }}</span>
                        </span>
                    </span>
                </h4>
                <div class="introduce">
                    {!! $teacher->introduce !!}
                </div>

                <h4>THÀNH TÍCH:</h4>
                <div class="skills">{!! $teacher->skills !!}</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <section class="list-course">
        <div class="header">KHOÁ HỌC</div>
        <div class="video-grid">
            @foreach($courses as $course)
            <div class="video-item">
                <iframe src="{{ $course->link }}" allowfullscreen></iframe>
                <div class="title">
                    {{$course->title}}
                </div>
                <div class="author">Hán Ngữ Hua Hua</div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
