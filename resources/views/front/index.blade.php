<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/index.scss')}}" rel="stylesheet">
<link href="{{asset('/node_modules/bootstrap/scss/bootstrap/scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
<div class="container" style="margin-top: 10px;margin-bottom: 135px">
    <div class="row" >
        <div class="main d-flex">
            <div class="d-flex col-md-3">
                @include('layouts.front.navbar')
            </div>
            <div class="d-flex col-md-9 main">
               <div>
                   <h5>Anasayfa Vitrini</h5>
                   <div class="content">
                       @foreach($productdata as $rs)
                           <div class="d-flex">
                               <a href="{{ route('productdetail', ['id' => $rs->id]) }}" class="item">
                                   @php
                                       $productImage = $images->where('product_id', $rs->id)->first();
                                   @endphp
                                   @if($productImage && $productImage->image)
                                       <img alt="Resim" src="/{{ $productImage->image }}">
                                   @else
                                       <img src="/assets/img/car.png" onclick="myFunction(this)">
                                   @endif
                                   <h4>{{ $rs->title }}</h4>
                               </a>
                           </div>
                       @endforeach

                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
