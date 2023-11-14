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
                <a>{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                <a href="{{route('adim1')}}"><button class="btn btn-sm btn-primary">Ücretsiz İlan ver</button></a>
            </div>
        @endauth
    </div>
</div>
