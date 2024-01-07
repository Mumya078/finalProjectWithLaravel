<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/profile.scss')}}" rel="stylesheet">
<link href="{{asset('/node_modules/bootstrap/scss/bootstrap/scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
<div style="margin-top: 30px">
        <div class="main">
            <div class="content">
                <h5>Kişisel Bilgilerim</h5>
                <form action="{{route('profile_store')}}" method="post">
                    @csrf
                    <div class="content-inner">
                        <div>
                            <div class="leftcontent">İsim Soyisim:</div>
                            <input name="name" class="rightcontent" value="{{$user->name}}">
                        </div>
                        <div>
                            <div class="leftcontent">Telefon:</div>
                            <input name="telephone" class="rightcontent" value="{{$user->telephone}}">
                        </div>
                        <div>
                            <div class="leftcontent">Mail:</div>
                            <input name="email" class="rightcontent" value="{{$user->email}}">
                        </div>
                        <div>
                            <div class="leftcontent">Adres:</div>
                            <input name="adress" class="rightcontent" value="{{$user->adress}}">
                        </div>
                    </div>
                    <div style="width: 100%; display: flex; justify-content: center">
                        <button class="btn btn-primary" style="margin-top: 15px"> Kaydet </button>
                    </div>
            </form>
        </div>
</div>
@endsection
