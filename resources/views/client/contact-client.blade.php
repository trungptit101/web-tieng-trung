@extends('client.layouts.master')
@section('title', 'Liên hệ')
@section('css')
<style>
    .detail-center-container {
        background-color: #f2f2f2;
    }

    .detail-center {
        text-align: center;
        padding: 0 0 50px 0;
    }

    .detail-center .header {
        font-size: 24px;
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
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
        text-transform: uppercase;
    }
</style>
@endsection
@section('main')
<div class="detail-center-container">
    <div class="container">
        <section class="detail-center">
            <div class="header">Liên Hệ</div>
            <div>{!! $contact->contact !!}</div>
        </section>
    </div>
</div>
@endsection
