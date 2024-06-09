@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="done-message">
        <div class="done-title">ご予約ありがとうございます</div>
        <a href="/mypage" class="back-button">戻る</a>
    </div>
</div>
@endsection