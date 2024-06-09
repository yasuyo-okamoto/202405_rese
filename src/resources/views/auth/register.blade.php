@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<main>
<div class="container">
    <form class="registration-form" action="{{ route('register') }}" method="post">
        @csrf
        @error('username')
            <div class="error">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="registration-title">Registration</div>
        <div class="input-container">
            <img src="{{ asset('images/user-icon.svg') }}" alt="Username Icon" class="input-icon">
            <input type="text" name="username" class="input-field" placeholder="Username" required>
        </div>
        <div class="input-container">
            <img src="{{ asset('images/email-icon.svg') }}" alt="Email Icon" class="input-icon">
            <input type="email" name="email" class="input-field" placeholder="Email" required>
        </div>
        <div class="input-container">
            <img src="{{ asset('images/password-icon.svg') }}" alt="Password Icon" class="input-icon">
            <input type="password" name="password" class="input-field" placeholder="Password" required>
        </div>
        <button type="submit" class="submit-button">登録</button>
    </form>
</div>
</main>


@endsection