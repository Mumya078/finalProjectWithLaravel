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
                    <div class="chat-product-header">
                        <div>
                            @php
                                $productImage = $images->where('product_id', $product->id)->first();
                            @endphp
                            @if($productImage && $productImage->image)
                                <img alt="Resim" src="/{{ $productImage->image }}">
                            @else
                                <img src="/assets/img/car.png" onclick="myFunction(this)">
                            @endif
                            <div>
                                <h5>{{$product->title}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat">
                    @foreach($chats as $rs)
                            @if($rs->from_user_id == \Illuminate\Support\Facades\Auth::user()->id)
                            <div class="chatbox-send">
                                {{$rs->content}}
                            </div>
                            @else
                            <div class="chatbox-recive">
                                {{$rs->content}}
                            </div>
                            @endif
                    @endforeach
                </div>
                <div class="chatinput">
                   <form action="/chat/{{$id}}/newmessage" method="post">
                       @csrf
                       <input type="text" placeholder="Mesajınızı Buraya Giriniz" name="contents">
                       <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;width: 125px">Gönder</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

