@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<main>
  <body>
    <div class="container">
      <div class="user-info">
        {{ $user->name }} さんのマイページ
      </div>

      <div class="reservations">
        <h2>予約状況</h2>
        @foreach($reservations as $reservation)
          <div class="reservation-item">
            <div class="title">
              <i class="fa fa-clock"></i> 予約 {{ $loop->iteration }}
            </div>
          <div class="details">
            <div>Shop: {{ $reservation->shop->name }}</div>
            <div>Date: {{ $reservation->date }}</div>
            <div>Time: {{ $reservation->time }}</div>
            <div>Number: {{ $reservation->number }}人</div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="favorites">
        <h2>お気に入り店舗</h2>
        @foreach($favorites as $favorite)
          <div class="favorite-item">
            <div class="shop-name">{{ $favorite->shop->name }}</div>
              <div class="details">
                <img src="{{ $favorite->shop->image }}" alt="{{ $favorite->shop->name }}" style="width:100%;">
                <div>Area: {{ $favorite->shop->area->area }}</div>
                <div>Genre: {{ $favorite->shop->genre->genre }}</div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </body>
</main>


@endsection