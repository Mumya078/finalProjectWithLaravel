<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/messages.scss')}}" rel="stylesheet">
<link href="{{asset('/node_modules/bootstrap/scss/bootstrap/scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="main" style="background-color: lightgrey;  margin-bottom: 15px">
            <div class="content">
                <h5>Mesajlarım</h5>

                <div class="message-list">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @foreach($messages as $rs)
                            @php
                                $productImage = $images->where('product_id', $rs->product->id)->first();
                            @endphp
                            <a href="chat/{{$rs->id}}" style="text-decoration: none!important;color: inherit!important;">
                                <div class="each-message">
                                    <div class="image-holder">
                                        <img src="/{{$productImage->image}}">
                                    </div>
                                    <div class="body">
                                        <h2>
                                            @if($rs->product->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                @php
                                                    $user = \App\Models\User::find($rs->from_user_id)
                                                @endphp
                                                <h2>
                                                    {{$user->name}}
                                                    <p>(Gelen Mesaj)</p>
                                                </h2>
                                            @else
                                                @php
                                                    $user = \App\Models\User::find($rs->to_user_id)
                                                @endphp
                                                <h2>
                                                    {{$user->name}}
                                                    <p>(Giden Mesaj)</p>
                                                </h2>
                                            @endif
                                        </h2>
                                        <h4>
                                            {{$rs->product->title}}
                                        </h4>
                                    </div>
                                    <div class="date">
                                        {{$rs->created_at->format('F-d')}} / {{$rs->created_at->format('H:i')}}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
