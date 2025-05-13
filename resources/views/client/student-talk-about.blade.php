@extends('client.layouts.master')
@section('title', 'Học viên nói gì về chúng tôi')
@section('css')
<style>
    .video-section-container {
        background-image: url('theme_client/images/Layer-11-1.jpg');
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: 50% 50%;
        padding-bottom: 20px;
    }

    .video-section .video-title {
        font-weight: bold;
        padding: 30px 0;
        font-size: 24px;
        text-align: center;
        color: #25366a;
    }

    .video-section .video-title .highlight {
        color: #F15928 !important;
    }

    .video-fixed-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, auto);
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .video-item iframe {
        width: 100%;
        height: 250px;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Breakpoints */
    @media (max-width: 1024px) {
        .video-fixed-grid {
            grid-template-columns: repeat(2, 1fr);
            /* 2 cột trên tablet */
            grid-template-rows: repeat(2, auto);
            /* Giữ 2 hàng */
        }
    }

    @media (max-width: 768px) {
        .video-fixed-grid {
            grid-template-columns: 1fr;
            /* 1 cột trên mobile */
            grid-template-rows: repeat(2, auto);
            /* Giữ 2 hàng */
            padding: 0 10px;
            /* Giảm padding trên mobile */
        }
    }
</style>
@endsection
@section('main')
<div class="video-section-container">
    <div class="container">
        <section class="video-section">
            <div class="video-title">HƠN <span class="highlight">100.000+</span> HỌC VIÊN TIN TƯỞNG LỰA CHỌN</div>
            <div class="video-fixed-grid">
                @foreach($videosStudent as $video)
                <div class="video-item"><iframe src="{{ $video->video }}" allowfullscreen></iframe></div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
