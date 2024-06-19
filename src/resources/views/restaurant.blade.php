@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/restaurant.css') }}">
@endsection

@section('content')
<main>
    <body>
        <div class="search">
            <div class="search-bar">
                <form method="GET" action="{{ route('shop.search') }}">
                <select name="area_id">
                    <option value="">All area</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ $request->area_id == $area->id ? 'selected' : '' }}>
                        {{ $area->area }}
                        </option>
                    @endforeach
                </select>
                <select name="genre_id">
                    <option value="">All genre</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $request->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    @endforeach
                </select>
                <div class="separator"></div>
                <input type="text" name="search_name" value="{{ $request->search_name }}" placeholder="Search by name" class="search-input">
                <button type="submit" class="search-button">
                    <i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="container">
            <!-- 飲食店リスト -->
            <div class="restaurant-container">
            @foreach($restaurants as $restaurant)
                <div class="restaurant-card">
                    <img src="{{ $restaurant->photo }}" alt="{{ $restaurant->name }}" class="restaurant-image">
                    <div class="restaurant-name">{{ $restaurant->name }}</div>
                    <div class="restaurant-all">
                        <div class="restaurant-info"># {{ $restaurant->area->area }}</div>
                        <div class="restaurant-info"># {{ $restaurant->genre->genre }}</div>
                    </div>

                    <a href="{{ route('detail', ['restaurant_id' => $restaurant->id]) }}" class="view-details-button">詳しくみる</a>
                    <div class="favorite-icon">
                    @auth
                    @if(Auth::user()->favoriteRestaurants->contains($restaurant->id))
                        <form action="{{ route('favorite.remove', ['restaurant_id' => $restaurant->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="favorite-icon__btn favorite">&#x2661;</button>
                        </form>
                        @else
                        <form action="{{ route('favorite.add', ['restaurant_id' => $restaurant->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="favorite-icon__btn">&#x2661;</button>
                        </form>
                    @endif
                    @else
                        <a href="{{ route('login') }}" class="favorite-icon__btn">&#x2661;</a>
                    @endauth
                    </div>
                </div>
            @endforeach
            </div>
        </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // すべてのお気に入りアイコンを取得
    var favoriteIcons = document.querySelectorAll('.favorite-icon');

    // お気に入りアイコンがクリックされたときの処理を追加
    favoriteIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            // ハートの色を切り替える
            if (icon.classList.contains('favorite')) {
                icon.classList.remove('favorite');
            } else {
                icon.classList.add('favorite');
            }
        });
    });
});
    </script>
    </body>
</main>
@endsection