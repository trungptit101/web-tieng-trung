@extends('client.layouts.master')
@section('title', 'Giới thiệu trung tâm HUA HUA')
@section('css')
<style>
    .carousel-container {
        display: none;
    }
    .detail-center-container {
        background-color: #f2f2f2;
    }

    .detail-center {
        text-align: center;
        padding: 0 0 50px 0;
    }

    .detail-center .header {
        font-size: 30px;
        font-weight: bold;
        color: #f05a22;
        padding: 30px 0;
        text-align: center;
        text-transform: uppercase;
    }

    .detail-center .header::after {
        content: '';
        display: block;
        width: 100px;
        height: 4px;
        background-color: #f05a22;
        margin: 5px auto;
    }

    .detail-center h2 {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
@endsection
@section('main')
<div class="detail-center-container">
    <div class="container">
        <section class="detail-center">
            <div class="header">
                <h2>
                    <span style="color: #F15928; text-transform: uppercase;">
                        <span>Giới Thiệu
                            <span style="color: #25366a">HUA HUA</span>
                        </span>
                    </span>
                </h2>
            </div>
            <div>
                <iframe
                    style="width: 100%; height: 400px; max-width: 600px;"
                    src="{{ $page->link }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
            <div style="margin-top: 30px; text-align: justify;">{!! $page->content !!}</div>
        </section>
    </div>
</div>
@endsection
