@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('css')
<link rel="stylesheet" href="{{ asset('/theme_client/swiper-bundle.min.css') }}" />
<style>
    .banner-background {
        display: none !important;
    }

    .video-container {
        padding: 60px 0;
        background-color: #f2f2f2;
    }

    iframe {
        height: 100%;
        width: 100%;
    }

    .video-right {
        padding: 30px 0;
    }

    .is-divider {
        background-color: #F15928;
        height: 3px;
        display: block;
        margin: 1em 0 1em;
        width: 100%;
        max-width: 100px;
    }

    .gap-element-introduce {
        padding-top: 10px;
    }

    .btn-more {
        margin-top: 10px;
        background-color: #F15928;
        color: #ffff;
        padding: 10px 20px;
        font-weight: 600;
    }

    .btn-more:hover {
        background-color: rgb(201, 56, 8);
        color: #ffff;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .video-right {
            padding: 12px !important;
        }

        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }
    }

    .section-title {
        text-align: center;
        color: #25366a;
        font-size: 24px;
        font-weight: bold;
        padding: 30px 0;
    }

    .teacher-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .teacher-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 1px solid #ebebeb;
        text-align: center;
        cursor: pointer;
    }

    .teacher-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        /* border: 4px solid #e1e1e1; */
    }

    .teacher-name {
        font-size: 16px;
        font-weight: bold;
        color: #F15928;
        margin-bottom: 10px;
    }

    .teacher-info {
        font-size: 14px;
        text-align: left;
        line-height: 1.6;
    }

    .teacher-info ul {
        padding-left: 15px;
        font-size: 14px;
        font-weight: 600;
    }

    .video-section-container {
        background-image: url('theme_client/images/Layer-11-1.jpg');
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: 50% 50%;
        padding-bottom: 20px;
    }

    .video-section a:hover {
        text-decoration: none;
    }

    .video-section .video-title {
        font-weight: bold;
        padding: 30px 0;
        font-size: 24px;
        text-align: center;
        color: #F15928;
    }

    .video-section .video-title .highlight {
        color: #25366a !important;
    }

    @media (max-width: 480px) {
        .teacher-name {
            font-size: 15px;
        }

        .teacher-info {
            font-size: 13px;
        }
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

    .demand-study {
        background-color: #f2f2f2;
        padding-bottom: 30px;
    }

    .demand-study a:hover {
        text-decoration: none;
    }

    .write-words {
        padding-bottom: 30px;
    }

    .write-words .write-words-title {
        font-size: 24px;
        font-weight: bold;
        color: #F15928;
        padding: 30px 0;
        text-align: center;
    }

    .write-words-title a:hover {
        text-decoration: none;
    }

    .write-words .write-words-title::after {
        content: '';
        display: block;
        width: 50px;
        height: 5px;
        background-color: #F15928;
        margin: 5px auto;
    }

    .write-words .search-container {
        display: flex;
        align-items: center;
        border-radius: 25px;
        overflow: hidden;
        max-width: 600px;
        width: 100%;
        padding: 5px;
    }

    .write-words .logo {
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
        margin: 0 10px;
    }

    .write-words .search-input {
        flex: 1;
        border: 2px solid #87ceeb;
        border-right: none;
        padding: 10px;
        font-size: 16px;
        outline: none;
        border-radius: 20px 0 0 20px;
    }

    .write-words .search-button {
        background-color: #f0f0f0;
        border: 2px solid #87ceeb;
        border-left: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 0 20px 20px 0;
        transition: background-color 0.3s;
    }

    .write-words .search-button:hover {
        background-color: #e0e0e0;
    }

    .write-words .content {
        display: flex;
        justify-content: center;
    }

    .write-words .result-container {
        text-align: center;
    }

    .write-words .result-container .title {
        font-weight: 600;
        font-size: 18px;
    }

    .demand-study .header {
        font-size: 24px;
        font-weight: bold;
        color: #F15928;
        padding: 30px 0;
        text-align: center;
    }

    .demand-study .header::after {
        content: '';
        display: block;
        width: 50px;
        height: 5px;
        background-color: #F15928;
        margin: 5px auto;
    }

    .demand-study .content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .demand-study .content img {
        width: 100%;
    }

    .demand-study .content .card-label {
        text-align: center;
        margin-left: -15%;
        color: #F15928;
        font-weight: 600;
        padding: 10px;
        font-size: 18px;
    }

    .content-introduce {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .hanzi-container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        text-align: center;
    }

    .hanzi-container h2 {
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .search-container input {
        padding: 10px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-container button {
        margin-left: 10px;
        width: 150px;
        padding: 8px;
        background: #F15928;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .search-container button:hover {
        background: #d32f2f;
    }

    #hanzi-writer {
        width: 400px;
        height: 400px;
        margin: 20px auto;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .controls {
        margin-top: 20px;
        text-align: center;
    }

    .controls button {
        padding: 8px 15px;
        margin: 0 5px;
        background: #2da1ff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .controls button:hover {
        background: #0985e9;
    }

    @media (max-width: 600px) {
        .hanzi-container {
            padding: 20px;
            margin: 10px;
        }

        /* #hanzi-writer {
            width: 250px;
            height: 250px;
        } */

        .hanzi-container h2 {
            font-size: 20px;
        }
    }

    .title-list-teacher:hover {
        text-decoration: none;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .video-item {
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
        text-align: center;
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
        background: #F15928;
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
        background-color: #F15928;
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

    .swiper {
        width: 100%;
        padding: 0 0 20px 0;
    }

    .swiper-teacher {
        width: 100%;
        padding: 0 0 20px 0;
    }

    .swiper-button-next,
    .swiper-button-next-teacher,
    .swiper-button-next-video,
    .swiper-button-prev,
    .swiper-button-prev-teacher,
    .swiper-button-prev-video {
        color: #F15928;
        transition: color 0.3s ease;
    }

    .swiper-button-next:hover,
    .swiper-button-next-teacher:hover,
    .swiper-button-next-video:hover,
    .swiper-button-prev:hover,
    .swiper-button-prev-teacher:hover,
    .swiper-button-prev-video:hover {
        color: #F15928;
    }

    .swiper-pagination-bullet {
        background: #F15928;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        background: #F15928;
    }

    .swiper-button-next,
    .swiper-button-next-teacher,
    .swiper-button-next-video {
        color: #F15928;
        width: 50px;
        font-weight: bold;
        height: 50px;
        top: 50%;
        right: -50px;
    }

    .swiper-button-prev,
    .swiper-button-prev-teacher {
        color: #F15928;
        width: 50px;
        font-weight: bold;
        height: 50px;
        top: 50%;
        left: -50px;
    }

    .swiper-grid-column>.swiper-wrapper {
        flex-direction: column;
    }

    .swiper-grid-column>.swiper-wrapper>.swiper-slide {
        margin-bottom: 20px;
    }

    .swiper-pagination {
        position: relative;
        margin-top: 20px;
    }

    /* Responsive cho desktop (2 hàng x 3 cột) */
    @media (min-width: 1024px) {
        .swiper {
            --swiper-slides-per-view: 3;
            --swiper-slides-per-group: 3;
        }
    }

    /* Responsive cho tablet (4 video, 2x2) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .swiper {
            --swiper-slides-per-view: 2;
            --swiper-slides-per-group: 2;
        }
    }

    /* Responsive cho mobile (2 video, 1x2) */
    @media (max-width: 767px) {
        .swiper {
            --swiper-slides-per-view: 1;
            --swiper-slides-per-group: 1;
        }
    }

    .title-video-student {
        font-size: 16px;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: center;
    }
</style>
@endsection
@section('main')

@if(isset($page))
<div class="video-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <iframe
                    src="{{ $page->link }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="col-12 col-md-6 col-lg-6 video-right">
                <div class="col medium-6 small-12 large-6">
                    <div class="col-inner text-left">
                        <a href="/gioi-thieu-trung-tam-hua-hua" class="title_introduce">
                            <h2 style="text-align: left;">
                                <span style="color: #25366a; text-transform: uppercase;">
                                    <strong>Giới Thiệu
                                        <span style="color: #F15928">HUA HUA</span>
                                    </strong>
                                </span>
                            </h2>
                        </a>
                        <div class="is-divider divider clearfix"></div>
                        <div class="content-introduce">
                            {!! $page->content !!}
                        </div>
                        <a href="/gioi-thieu-trung-tam-hua-hua" class="btn-more">
                            <span>XEM THÊM</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container container-mobile">
    <a href="{{ route('list-teachers') }}" class="title-list-teacher">
        <div class="section-title">20+ <span style="color: #F15928">GIÁO VIÊN TÀI NĂNG TÂM HUYẾT</span></div>
    </a>
    <div style="position: relative;">
        <div class="swiper swiper-teacher">
            <div class="swiper-wrapper">
                @foreach($teachers as $teacher)
                <div class="swiper-slide">
                    <div class="teacher-card" onClick="openProfileTeacher('{{ $teacher->slug }}')">
                        <img src="{{ $teacher->avatar }}" alt="{{ $teacher->userName }}" class="teacher-image">
                        <div class="teacher-name">{{ $teacher->userName }}</div>
                        <div class="teacher-info">
                            {!! $teacher->skills !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-button-prev swiper-button-prev-teacher"></div>
        <div class="swiper-button-next swiper-button-next-teacher"></div>
    </div>
</div>
<div class="video-section-container">
    <div class="container container-mobile">
        <section class="video-section">
            <a href="{{ route('studentTalkAbout') }}">
                <div class="video-title">HƠN <span class="highlight">100.000+</span> HỌC VIÊN TIN TƯỞNG LỰA CHỌN</div>
            </a>
            <div style="position: relative;">
                <div class="swiper swiper-videos">
                    <div class="swiper-wrapper">
                        @foreach($videosStudent as $video)
                        <div class="swiper-slide">
                            <div class="video-item">
                                <iframe src="{{ $video->video }}" allowfullscreen></iframe>
                                <div class="title-video-student" title="{{ $video->title }}">{{ $video->title }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev swiper-button-prev-video"></div>
                <div class="swiper-button-next swiper-button-next-video"></div>
            </div>
        </section>
    </div>
</div>
<section class="demand-study">
    <div class="container container-mobile">
        <div class="header">
            <a href="{{ route('courses') }}">
                <span style="color: #25366a; text-transform: uppercase;">
                    <span>HỌC TIẾNG TRUNG
                        <span style="color: #F15928">THEO NHU CẦU CỦA BẠN</span>
                    </span>
                </span>
            </a>
        </div>
        <div style="position: relative;">
            <div class="swiper swiper-course">
                <div class="swiper-wrapper">
                    @foreach($courses as $course)
                    <div class="swiper-slide">
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
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<section class="write-words" id="write-words">
    <div class="container">
        <div class="write-words-title">
            <a href="{{ route('write-words') }}">
                <span style="color: #25366a; text-transform: uppercase;">
                    <span>CÁCH VIẾT
                        <span style="color: #F15928">CHỮ HÁN</span>
                    </span>
                </span>
            </a>
        </div>
        <div class="content">
            <div class="search-container">
                <img class="logo" src="{{ asset('/theme_client/images/logo_no_background.png') }}">
                <input type="text" id="hanzi-input" placeholder="Nhập ký tự Hán (e.g., 髦)" maxlength="1">
                <button onclick="loadCharacter()">HIỂN THỊ</button>
            </div>
        </div>
        <div id="hanzi-writer"></div>
        <div class="controls">
            <button onclick="animateCharacter()">XEM LẠI</button>
            <button onclick="practiceCharacter()">LUYỆN VIẾT</button>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="{{ asset('/theme_client/swiper-bundle.min.js') }}"></script>
<script>
    const swiper = new Swiper('.swiper-videos', {
        loop: true,
        slidesPerGroup: 1,
        grid: {
            rows: 2,
            fill: 'row',
        },
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-video',
            prevEl: '.swiper-button-prev-video',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                grid: {
                    rows: 2,
                },
            },
            1024: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                grid: {
                    rows: 2,
                },
            },
        },
    });

    const swiperTeacher = new Swiper('.swiper-teacher', {
        loop: true,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next-teacher',
            prevEl: '.swiper-button-prev-teacher',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });

    const swiperCourse = new Swiper('.swiper-course', {
        loop: true,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>
<script>
    function openProfileTeacher(slug) {
        window.location.href = `/profile-giao-vien/${slug}`;
    }
</script>
<script src="{{ asset('/theme_client/hanzi-writer.min.js') }}"></script>
<script>
    let writer;
    let currentCharacter = '髦'; // Ký tự mặc định

    // Tải ký tự Hán
    function loadCharacter() {
        const input = document.getElementById('hanzi-input').value.trim();
        if (input) {
            currentCharacter = input;
        }

        // Khởi tạo Hanzi Writer
        if (writer) {
            writer.setCharacter(currentCharacter);
        } else {
            writer = HanziWriter.create('hanzi-writer', currentCharacter, {
                width: 400,
                height: 400,
                padding: 5,
                showOutline: true,
                strokeAnimationSpeed: 1,
                strokeHighlightSpeed: 2,
                drawingWidth: 40,
                strokeColor: '#F15928', // Màu đỏ cho tất cả các nét
                outlineColor: '#000',
                onLoadCharDataSuccess: (data) => {
                    const totalStrokes = data.strokes.length;
                    writer.strokeColors = Array(totalStrokes).fill('#F15928'); // Đặt tất cả nét thành màu đỏ
                }
            });
        }
        writer.animateCharacter();
    }

    // Hiển thị hoạt ảnh stroke order
    function animateCharacter() {
        if (writer) {
            writer.animateCharacter();
        }
    }

    // Chế độ luyện viết
    function practiceCharacter() {
        if (writer) {
            writer.quiz({
                onCorrectStroke: () => console.log('Đúng nét!'),
                onMistake: () => alert('Sai nét, thử lại!'),
            });
        }
    }

    // Tải ký tự mặc định khi trang được tải
    window.onload = loadCharacter;
    document.getElementById('hanzi-input').value = currentCharacter;
</script>
@endsection
