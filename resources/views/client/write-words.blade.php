@extends('client.layouts.master')
@section('title', 'Cách viết chữ Hán')
@section('css')
<style>
    .carousel-container {
        display: none;
    }

    .write-words {
        background-color: #f2f2f2;
        padding-bottom: 30px;
    }

    .write-words .write-words-title {
        font-size: 24px;
        font-weight: bold;
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
        width: 600px;
        height: 600px;
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
</style>
@endsection
@section('main')
<section class="write-words" id="write-words">
    <div class="container">
        <div class="write-words-title">
            <span style="color: #25366a; text-transform: uppercase;">
                <span>CÁCH VIẾT
                    <span style="color: #F15928">CHỮ HÁN</span>
                </span>
            </span>
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
            <!-- <button onclick="animateCharacter()">XEM HOẠT ẢNH</button> -->
            <button onclick="practiceCharacter()">LUYỆN VIẾT</button>
        </div>
    </div>
</section>
@endsection

@section('script')
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
                width: 600,
                height: 600,
                padding: 5,
                showOutline: true,
                strokeAnimationSpeed: 1,
                strokeHighlightSpeed: 2,
                drawingWidth: 40,
                strokeColor: '#f05a22', // Màu đỏ cho tất cả các nét
                onLoadCharDataSuccess: (data) => {
                    const totalStrokes = data.strokes.length;
                    writer.strokeColors = Array(totalStrokes).fill('#f05a22'); // Đặt tất cả nét thành màu đỏ
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
