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
                        @php
                            $user = \App\Models\User::find($data->user_id)
                        @endphp
                        <div class="d-flex justify-content-between">
                            <a  href="/productdetail/{{$data->id}}/toggleFavorite">
                                @if($isAlreadyFavorited == false)
                                    <i @class(['fa-regular','fa-sm','fa-star']) style="margin-right: 5px"></i>Favorilerime Ekle
                                @else
                                    <i @class(['fa-solid','fa-sm','fa-star']) style="margin-right: 5px"></i>Favorilerimden Çıkar
                                @endif
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
                                <h6>{{$user->adress}}</h6>
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
                                        @foreach($allcat as $rs)
                                            @if($data->category_id == $rs->id && $rs->form_element1 != null)
                                                <li>
                                                    <strong>{{$rs->form_element1}}</strong>
                                                    <span>{{$data->form_element1}}</span>
                                                </li>
                                            @endif
                                            @if($data->category_id == $rs->id && $rs->form_element2 != null)
                                                <li>
                                                    <strong>{{$rs->form_element2}}</strong>
                                                    <span>{{$data->form_element2}}</span>
                                                </li>
                                            @endif
                                            @if($data->category_id == $rs->id && $rs->form_element3 != null)
                                                <li>
                                                    <strong>{{$rs->form_element3}}</strong>
                                                    <span>{{$data->form_element3}}</span>
                                                </li>
                                            @endif
                                            @if($data->category_id == $rs->id && $rs->form_element4 != null)
                                                <li>
                                                    <strong>{{$rs->form_element4}}</strong>
                                                    <span>{{$data->form_element4}}</span>
                                                </li>
                                                @else
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 productseller">
                            <div>
                                <h5>{{$user->name}}</h5>
                                <h6>Hesap Açma Tarihi :{{$user->created_at}}</h6>
                                <div>
                                    <strong>Cep:</strong>
                                    <span>+90 {{$user->telephone}}</span>
                                </div>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <a href="/productdetail/{{$data->id}}/chat">Mesaj Gönder</a>
                                @else
                                    <a href="/login">Mesaj Gönder</a>
                                @endif
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
                @if(\Illuminate\Support\Facades\Auth::check() && $data->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="edit">
                        <a href="{{route('adim3edit',$data->id)}}"><div class="btn btn-warning">Düzenle</div></a>
                        <div class="btn btn-danger">Sil</div>
                    </div>
                @endif
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
