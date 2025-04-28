@extends('client.layouts.master')
@section('title', $document->title)
@section('css')
<style>
    .document-course-container {
        padding: 40px 0;
        margin: 0px auto;
    }

    .document-course {
        border: 2px dashed #ccc;
        border-radius: 10px;
        padding: 10px;
    }
    .header {
        font-size: 28px;
        font-weight: bold;
        color: #ff6200;
        text-align: center;
        padding: 15px 0;
    }
    .description {
        text-align: center;
    }
</style>
@endsection
@section('main')
<div class="document-course-container">
    <div class="container">
        <section class="document-course">
            <div class="header">{{ $document->title }}</div>
            <div class="description">{!! $document->description !!}</div>
        </section>
    </div>
</div>
@endsection
