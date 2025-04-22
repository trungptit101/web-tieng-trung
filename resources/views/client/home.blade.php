@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('css')
<style>
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
    }

    .section-title {
        text-align: center;
        color: #F15928;
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
        width: calc(25% - 15px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
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

    @media (max-width: 768px) {
        .teacher-card {
            width: 90%;
        }
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
        height: 200px;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .write-words {
        background-color: #f2f2f2;
        padding-bottom: 30px;
    }

    .write-words .write-words-title {
        font-size: 24px;
        font-weight: bold;
        color: #F15928;
        padding: 30px 0;
        text-align: center;
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
        background-color: #ff4500;
        border-radius: 50%;
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
</style>
@endsection
@section('main')

<div class="video-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <iframe
                    src="https://youtu.be/Ue1F8eh3uVo?si=M3TJWpTkmLlGw09s"
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
                        <h2 style="text-align: left;"><span style="color: #F15928;"><strong>GIỚI THIỆU VỀ HOU HOU</strong></span></h2>
                        <div class="is-divider divider clearfix"></div>
                        <div class="gap-element-introduce clearfix" style="display:block; height:auto;">
                        </div>

                        <p style="margin-bottom: 2rem;">
                            Trung tâm tiếng Trung Hua Hua tự hào là địa chỉ uy tín dành cho những ai đang theo đuổi hành trình chinh phục tiếng Trung.
                            Với đội ngũ giáo viên bản ngữ và Việt Nam giàu kinh nghiệm, phương pháp giảng dạy trực quan, sinh động, chúng tôi mang đến môi trường học tập chất lượng – hiệu quả – truyền cảm hứng.
                        </p>
                        <a href="/gioi-thieu/" target="_self" class="btn-more">
                            <span>XEM THÊM</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section-title">20+ <span style="color: #25366a">GIÁO VIÊN TÀI NĂNG TÂM HUYẾT</span></div>

    <div class="teacher-container">
        <!-- Teacher 1 -->
        <div class="teacher-card">
            <img src="{{ asset('theme_client/images/teachers/teacher1.png') }}" alt="Banze Abdulai" class="teacher-image">
            <div class="teacher-name">Banze Abdulai</div>
            <div class="teacher-info">
                <ul>
                    <li>Thạc sĩ giáo dục.</li>
                    <li>Cử nhân Ngôn ngữ Anh.</li>
                    <li>Chứng chỉ TESOL.</li>
                    <li>Chứng chỉ C1.</li>
                    <li>Phương pháp cho trẻ làm quen Tiếng Anh.</li>
                    <li>6 năm kinh nghiệm.</li>
                    <li>2 năm tại Việt Nam.</li>
                </ul>
            </div>
        </div>

        <!-- Teacher 2 -->
        <div class="teacher-card">
            <img src="{{ asset('theme_client/images/teachers/teacher2.png') }}" alt="Banze Abdulai" class="teacher-image">
            <div class="teacher-name">Richard Appiah</div>
            <div class="teacher-info">
                <ul>
                    <li>Thạc sĩ giáo dục.</li>
                    <li>Cử nhân Ngôn ngữ Anh.</li>
                    <li>Chứng chỉ TEFL.</li>
                    <li>Chứng chỉ C2.</li>
                    <li>Phương pháp cho trẻ.</li>
                    <li>6 năm kinh nghiệm.</li>
                    <li>6 năm kinh nghiệm.</li>
                    <li>2 năm tại Việt Nam.</li>
                </ul>
            </div>
        </div>

        <!-- Teacher 3 -->
        <div class="teacher-card">
            <img src="{{ asset('theme_client/images/teachers/teacher3.png') }}" alt="Banze Abdulai" class="teacher-image">
            <div class="teacher-name">Boseah Bernard</div>
            <div class="teacher-info">
                <ul>
                    <li>Thạc sĩ giáo dục.</li>
                    <li>Cử nhân Ngôn ngữ Anh.</li>
                    <li>Chứng chỉ TEFL.</li>
                    <li>Phương pháp cho trẻ.</li>
                    <li>10 năm kinh nghiệm.</li>
                    <li>4 năm tại Việt Nam.</li>
                </ul>
            </div>
        </div>

        <!-- Teacher 4 -->
        <div class="teacher-card">
            <img src="{{ asset('theme_client/images/teachers/teacher4.png') }}" alt="Banze Abdulai" class="teacher-image">
            <div class="teacher-name">Lytton Nakabugo</div>
            <div class="teacher-info">
                <ul>
                    <li>Cử nhân Giáo dục.</li>
                    <li>Chứng chỉ TESOL.</li>
                    <li>Chứng chỉ C1.</li>
                    <li>Phương pháp cho trẻ.</li>
                    <li>5 năm kinh nghiệm.</li>
                    <li>2 năm tại Việt Nam.</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="video-section">
        <div class="video-title">HƠN <span class="highlight">100.000+</span> HỌC VIÊN TIN TƯỞNG LỰA CHỌN</div>
        <div class="video-fixed-grid">
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
            <div class="video-item"><iframe src="https://www.youtube.com/embed/Ay2S3mshSF4?si=bV7QzgLOsY0BQHLM" allowfullscreen></iframe></div>
        </div>
    </section>

    <section class="demand-study">
        <div class="header">HỌC TIẾNG TRUNG THEO NHU CẦU CỦA BẠN</div>
        <div class="content">
            <div>
                <img src="{{ asset('theme_client/images/demand/2.png') }}" />
                <div class="card-label">DU HỌC/DỊCH</div>
            </div>
            <div>
                <img src="{{ asset('theme_client/images/demand/2.png') }}" />
                <div class="card-label">NGOẠI NGỮ 2</div>
            </div>
            <div>
                <img src="{{ asset('theme_client/images/demand/2.png') }}" />
                <div class="card-label">CÔNG VIỆC/KINH DOANH</div>
            </div>
    </section>
</div>
<section class="write-words">
    <div class="container">
        <div class="write-words-title">CÁCH VIẾT CHỮ HÁN</div>
        <div class="content">
            <div class="search-container">
                <img class="logo" src="{{ asset('/theme_client/images/logo.jpg') }}">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>
        </div>
        <div class="result-container">
            <div class="title">Thứ tự nét động của 我</div>
            <img src="{{ asset('/theme_client/images/drawing.jpg') }}">
        </div>
    </div>
</section>

@endsection
