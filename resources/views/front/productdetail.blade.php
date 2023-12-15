<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/productdetail.scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
    <div class="container">
        <div class="row">
            <div class="main">
                <div class="content d-flex">
                    <div class="content-header justify-content-between">
                        <h4>{{$data->title}}</h4>
                        <div class="d-flex justify-content-between">
                            <a  href="javascript:void(0)">
                                <i @class(['fa-solid','fa-sm','fa-star']) style="margin-right: 5px"></i>Favorilerime Ekle
                            </a>
                            <div class="socialmedia">
                                <a href="javascript:void(0)">
                                    <img src="/assets/img/facebook.png">
                                </a>
                                <a href="javascript:void(0)">
                                    <img src="/assets/img/facebook.png">
                                </a>
                                <a href="javascript:void(0)">
                                    <img src="/assets/img/facebook.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-inner">
                        <div class="col-md-9 d-flex">
                            <div class="col-md-7 productgallery">
                                <div class="images">
                                    <div class="image-big">
                                        @if($data)
                                            @php
                                                $firstImage = $images->where('product_id', $data->id)->first();
                                            @endphp

                                            @if($firstImage && $firstImage->image)
                                                <img id="imageBox" src="/{{ $firstImage->image }}">
                                            @else
                                                <img src="/assets/img/car.png">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="bottom">
                                        <div id="slider" class="images-small">
                                            @php
                                                $foundImage = false;
                                            @endphp

                                            @foreach($images as $rs)
                                                @if(($rs->product_id == $data->id) && ($rs->image != null))
                                                    <img src="/{{ $rs->image }}" onclick="myFunction(this)">
                                                    @php
                                                        $foundImage = true;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if(!$foundImage)
                                                <img src="/assets/img/car.png">
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 productinfo">
                                <h5>{{$data->price}} TL</h5>
                                <h6>Karabük / Safranbolu / Emek </h6>
                                <div class="d-flex">
                                    <ul>
                                        <li>
                                            <strong>İlan No</strong>
                                            <span>{{$data->id}}</span>
                                        </li>
                                        <li>
                                            <strong>İlan Tarihi</strong>
                                            <span>{{$data->created_at}}</span>
                                        </li>
                                        <li>
                                            <strong>Kategori</strong>
                                            <span>{{$data->category}}</span>
                                        </li>
                                        <li>
                                            <strong>Türü</strong>
                                            <span>{{$data->type}}</span>
                                        </li>
                                        <li>
                                            <strong>Category Form Element 1 Gerekirse bütün categoryi çek if else ile uygununu yazdır</strong>
                                            <span>{{$data->form_element1}}</span>
                                        </li>
                                        <li>
                                            <strong>Form Element2</strong>
                                            <span>{{$data->form_element2}}</span>
                                        </li>
                                        <li>
                                            <strong>Form Element3</strong>
                                            <span>{{$data->form_element3}}</span>
                                        </li>
                                        <li>
                                            <strong>Form Element4</strong>
                                            <span>{{$data->form_element4}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 productseller">
                            <div>
                                <h5>Yusuf Emir</h5>
                                <h6>Hesap Açma Tarihi: 29 Ekim 2023</h6>
                                <div>
                                    <strong>Cep</strong>
                                    <span>0(542) 535 66 02</span>
                                </div>
                                <a href="">Mesaj Gönder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="product-detail">
                        <div class="product-features">
                            <div class="product-title">
                                Açıklama
                            </div>
                            <div class="product-features-main" aria-labelledby="dropdownMenuButton">
                                {{$data->desc}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction(smallImg){
        var fullImg = document.getElementById("imageBox")
        fullImg.src = smallImg.src;
    }
    let buttonRight = document.getElementById('slideRight');
    let buttonLeft = document.getElementById('slideLeft');

    buttonLeft.addEventListener('click',function (){
        document.getElementById('slider').scrollLeft+=180;
    });
    buttonRight.addEventListener('click',function (){
        document.getElementById('slider').scrollLeft-=180;
    });
</script>
