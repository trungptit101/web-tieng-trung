@extends('client.layouts.master')
@section('title', 'Giáo viên tài năng tâm huyết')
@section('css')
<style>
    .carousel-container {
        display: none;
    }

    .list-teachers-container {
        background-color: #f2f2f2;
    }

    .list-teachers-container {
        text-align: center;
        padding: 0 0 50px 0;
    }

    .list-teachers-container .section-title {
        font-size: 30px;
        font-weight: bold;
        color: #25366a;
        padding: 30px 0;
        text-align: center;
        text-transform: uppercase;
    }

    .list-teachers-container .section-title::after {
        content: '';
        display: block;
        width: 100px;
        height: 4px;
        background-color: #f05a22;
        margin: 5px auto;
    }

    .list-teachers-container h2 {
        font-weight: bold;
        text-transform: uppercase;
    }

    .teacher-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        width: calc(25% - 15px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        cursor: pointer;
    }

    .list-teachers {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .teacher-card {
            width: 90%;
        }
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
</style>
@endsection
@section('main')
<div class="list-teachers-container">
    <div class="container">
        <div class="section-title">20+ <span style="color: #f05a22">GIÁO VIÊN TÀI NĂNG TÂM HUYẾT</span></div>

        <div class="list-teachers">
            @foreach($teachers as $teacher)
            <div class="teacher-card" onClick="openProfileTeacher('{{ $teacher->slug }}')">
                <img src="{{ $teacher->avatar }}" alt="{{ $teacher->userName }}" class="teacher-image">
                <div class="teacher-name">{{ $teacher->userName }}</div>
                <div class="teacher-info">
                    {!! $teacher->skills !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function openProfileTeacher(slug) {
        window.location.href = `/profile-giao-vien/${slug}`;
    }
</script>
@endsection
