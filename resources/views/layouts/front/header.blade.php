<div class="header">
    <div class="header-content">
        <a href="/home" class="banner" style="margin-right: 50px">
            alıcısına.com
        </a>
        <div class="searchbox-header">
            @include('layouts.front.searchbox')
        </div>
        @guest
            <div class="header-login">
                <a href="{{route('login')}}">Giriş Yap</a>|<a href="{{route('register')}}">Hesap Aç</a>
                <a href="{{route('login')}}"><button class="btn btn-sm btn-primary">Ücretsiz İlan ver</button></a>
            </div>
        @endguest
        @auth
            <div class="header-profile">
                <div class="dropdown">
                    <a class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile')}}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{route('myads')}}">İlanlarım</a></li>
                        <li><a class="dropdown-item" href="#">Favorilerim</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
                <a href="{{route('adim1')}}"><button class="btn btn-sm btn-primary">Ücretsiz İlan ver</button></a>
            </div>
        @endauth
    </div>
</div>
<script src="https://unpkg.com/@popperjs/core@2"></script>
