<nav class="nav">
    <ul class="nav__ul">
        <li class="nav__ul__li">
            <a href="/producten">Producten</a>
        </li>
        <li class="nav__ul__li">
            <a href="/maak">Maak product</a>
        </li>
        <li class="nav__ul__li">
            <a href="/profiel">Profiel</a>
        </li>
        @if (Auth::check())
            <li class="nav__ul__li">
                <a href="/dashboard">Logout</a>
            </li>
        @else
            <li class="nav__ul__li">
                <a href="/login">Login</a>
            </li>
        @endif
    </ul>
</nav>
