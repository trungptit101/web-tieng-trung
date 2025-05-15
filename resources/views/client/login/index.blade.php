@extends('client.layouts.master')
@section('title', 'Đăng nhập')
@section('css')
<style>
    .banner-background {
        display: none !important;
    }

    .carousel-container {
        display: none;
    }

    .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        overflow: hidden;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        text-align: center;
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-container h2 {
        color: #fff;
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .input-group {
        position: relative;
        margin-bottom: 30px;
    }

    .input-group input {
        width: 100%;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 10px;
        font-size: 16px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .input-group input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .input-group input:focus {
        background: rgba(255, 255, 255, 0.3);
        outline: none;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    .input-group label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .input-group input:focus+label,
    .input-group input:not(:placeholder-shown)+label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: #fff;
        background: #2a5298;
        padding: 0 5px;
        border-radius: 5px;
    }

    .login-container button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(45deg, #ff6b6b, #feca57);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .login-container button:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
    }

    .forgot-password {
        margin-top: 20px;
    }

    .forgot-password a {
        color: #feca57;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .login-container {
            margin: 15px;
            padding: 25px;
            max-width: 90%;
        }

        .login-container h2 {
            font-size: 24px;
        }

        .login-container button {
            padding: 10px;
            font-size: 14px;
        }

        .input-group input {
            padding: 10px;
            font-size: 14px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            overflow: hidden;
        }
    }

    .text-invalid {
        color: #ff0018;
        font-size: 15px;
        text-align: left;
        margin-top: -20px;
        margin-bottom: 10px;
        margin-left: 16px;
    }
</style>
@endsection

@section('main')
<div class="login-page">
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input type="email" name="email" class="@error('password') is-invalid @enderror" placeholder=" " required autocomplete="email">
                <label for="email">Tên đăng nhập</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder=" " required autocomplete="current-password">
                <label for="password">Mật khẩu</label>
            </div>
            @error('password')
            <div class="text-invalid">{{ $message }}</div>
            @enderror
            <button type="submit">Đăng Nhập</button>
            <div class="forgot-password">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</div>
@endsection
