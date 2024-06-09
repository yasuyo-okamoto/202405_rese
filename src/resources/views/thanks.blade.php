@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="thanks-message">
        <div class="thanks-title">会員登録ありがとうございます</div>
        <a href="/login" class="login-button">ログインする</a>
    </div>
</div>
@endsection