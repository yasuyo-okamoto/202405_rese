@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/restaurant.css') }}">
@endsection

@section('content')
<main>
  <body>
    <!-- 飲食店リスト -->
    <div class="restaurant-container">
        <!-- 仮のデータ -->
        <div class="restaurant-card">
            <img src="https://via.placeholder.com/300" alt="Restaurant Image" class="restaurant-image">
            <div class="restaurant-name">Restaurant Name</div>
            <div class="restaurant-all">
                <div class="restaurant-info"># Tokyo</div>
                <div class="restaurant-info"># Japanese</div>
            </div>

            <a href="#" class="view-details-button">詳しくみる</a>
            <div class="favorite-icon">
                <a href="#" class="favorite-icon__btn">&#x2661;</a>
            </div>
        </div>
        <!-- 他の飲食店カードも同様に追加 -->
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
</html>

</main>


@endsection