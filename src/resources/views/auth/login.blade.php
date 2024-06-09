@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="container">
    <form class="login-form" action="{{ route('login') }}" method="post">
        @csrf
        <div class="login-title">Login</div>
        <div class="input-container">
            <img src="{{ asset('images/email-icon.svg') }}" alt="Email Icon" class="input-icon">
            <input type="email" name="email" class="input-field" placeholder="Email" required>
        </div>
        <div class="input-container">
            <img src="{{ asset('images/password-icon.svg') }}" alt="Password Icon" class="input-icon">
            <input type="password" name="password" class="input-field" placeholder="Password" required>
        </div>
        <button type="submit" class="submit-button">ログイン</button>
    </form>
</div>
@endsection