<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/productdetail.scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
    <div class="container">
        <div class="row">
            <div class="main">
                <div class="content d-flex">
                    <div class="content-header justify-content-between">
                        <h4>BASLIK BASLIK BASLIK</h4>
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
                                        <img id="imageBox" src="/assets/img/car.png">
                                    </div>
                                    <div class="bottom">
                                        <div id="slider" class="images-small">
                                            <img src="/assets/img/car.png" onclick="myFunction(this)">
                                            <img src="/assets/img/facebook.png" onclick="myFunction(this)">
                                            <img src="/assets/img/car.png" onclick="myFunction(this)">
                                            <img src="/assets/img/car.png" onclick="myFunction(this)">
                                            <img src="/assets/img/facebook.png" onclick="myFunction(this)">
                                            <img src="/assets/img/facebook.png" onclick="myFunction(this)">
                                            <img src="/assets/img/car.png" onclick="myFunction(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 productinfo">
                                <h5>975.000TL</h5>
                                <h6>Karabük / Safranbolu / Emek </h6>
                                <div class="d-flex">
                                    <ul>
                                        <li>
                                            <strong>İlan No</strong>
                                            <span>02165164861</span>
                                        </li>
                                        <li>
                                            <strong>İlan Tarihi</strong>
                                            <span>29 Ekim 2023</span>
                                        </li>
                                        <li>
                                            <strong>Kategori</strong>
                                            <span>Otomobil</span>
                                        </li>
                                        <li>
                                            <strong>Model</strong>
                                            <span>Nissan GTR R-35</span>
                                        </li>
                                        <li>
                                            <strong>Yıl</strong>
                                            <span>2018</span>
                                        </li>
                                        <li>
                                            <strong>Motor Gücü</strong>
                                            <span>200HP</span>
                                        </li>
                                        <li>
                                            <strong>KM</strong>
                                            <span>55.000</span>
                                        </li>
                                        <li>
                                            <strong>Durumu</strong>
                                            <span>Satılık</span>
                                        </li>
                                        <li>
                                            <strong>Türü</strong>
                                            <span>Spor</span>
                                        </li>
                                        <li>
                                            <strong>Takas</strong>
                                            <span>Evet</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 productseller">
                            <div>
                                <h5>Yusuf Emir Tatlı</h5>
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
                                Burasu text yeri        Burasu text yeri
                                Burasu text yeri
                                Burasu text yeri     Burasu text yeri
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
