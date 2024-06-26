<ul class="menu">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a></li>
    <li><a href="{{ route('mypage') }}">Mypage</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
