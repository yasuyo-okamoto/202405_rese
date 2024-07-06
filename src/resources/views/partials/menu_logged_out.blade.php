<!DOCTYPE html>
  <html lang="ja">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/menu_logged.css') }}" />
      @yield('css')
      <title>Rese</title>
    </head>
  <body>

<ul class="menu">
    <li><a href="javascript:history.back()">Back</a></li>
    <li><a href="{{ route('shop.search') }}">Home</a></li>
    <li><a href="{{ route('register') }}">Registration</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
</ul>

</body>
</html>

