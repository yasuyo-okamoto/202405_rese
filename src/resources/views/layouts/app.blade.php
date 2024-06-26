<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  @yield('css')
  <title>Rese</title>
</head>
<body>
  
<header>
  <div class="menu_button">
    <a href=''>≡</a>
  </div>
  <p class="title">Rese</p>
</header>
<main>
  @yield('content')
</main>
  <div id="menuModal" class="modal">
    <div class="modal-content">
        @if(Auth::check())
            @include('partials.menu_logged_in')
        @else
            @include('partials.menu_logged_out')
        @endif
    </div>
  </div>
</body>

</html>