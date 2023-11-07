<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/ilan-ver.scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
    <div style="background: #FAFAFA">
        <div class="container">
            <div class="row">
                <div class="adim1-main">
                    <div class="adim1-content">
                        <h5>Adım Adım Kategori Seç</h5>
                        <div class=" adim1-content-inner">

                            @foreach($categorydata as $rs)
                                @if( $rs->parent_id == 0)
                                    <a href="/ilan-ver/adim2">
                                        <div class="item">
                                            <div class="item-banner" style="background-color:{{$rs->color}}">
                                            </div>
                                            <div class="item-content">
                                                <div class="d-flex flex-column justify-content-center text-center">
                                                    <div class="icon-holder" style="background-color: {{$rs->color}}">
                                                        <i class="fa-solid {{$rs->image}}"></i>
                                                    </div>
                                                    <h5>{{$rs->title}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
