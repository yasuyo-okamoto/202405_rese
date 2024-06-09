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

</body>

</html>