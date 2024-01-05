<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/messages.scss')}}" rel="stylesheet">
<link href="{{asset('/node_modules/bootstrap/scss/bootstrap/scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="main" style="background-color: lightgrey;  margin-bottom: 15px">
            <div class="content">
                <h5>Yeni Mesaj</h5>
                <div class="chat-header">
                    <h5>{{$user->name}}</h5>
                    <label>+90({{$user->telephone}})</label>
                </div>
                <div class="chat">
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                    <div class="chatbox">
                        sa
                    </div>
                </div>
                <div class="chatinput">
                   <form>
                       @csrf
                       <input type="text" placeholder="Mesajınızı Buraya Giriniz">
                       <button class="btn btn-primary" style="margin-bottom: 5px;width: 125px">Gönder</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
