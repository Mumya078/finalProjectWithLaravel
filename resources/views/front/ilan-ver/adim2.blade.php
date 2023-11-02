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
                        <div class="adim1-content-inner">
                            <a href="#" style="margin-left: 15px; color: #489AF1; margin-top: -10px; font-size: 14px">
                                Vasıta
                            </a>
                            <div class="adim2-table" id="maincategory">
                                <ul>
                                    <li>
                                        <a href="#" onclick="">
                                            Spor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            4X4
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Motorsiklet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Karavan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Jeep
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            SUV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Benzinli
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Süperspor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Antika
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Yarış
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Otobüs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Turbo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Elektrikli
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Elektrikli
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="">
                                            Elektrikli
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="adim2-table" id="year">
                                <ul>
                                    <li>
                                        <a href="#">
                                            2023
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2022
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2020
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2019
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2018
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2017
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2016
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2015
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2014
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2013
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2012
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2011
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2010
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2009
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            2008
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="adim2-table" id="model">
                                <ul>
                                    <li>
                                        <a href="#">
                                            BMW
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Mercedes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Ford
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Lamborghini
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Ferrari
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Tofaş
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="devam">
                           <a href="/ilan-ver/adim3">
                               <div class="btn-primary btn">
                                   Devam
                               </div>
                           </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".scrollable-div").on('mousewheel', function(e) {
            var scrollTo = null;

            if (e.originalEvent.wheelDelta > 0) {
                scrollTo = "-=50px";
            } else {
                scrollTo = "+=50px";
            }

            if (scrollTo !== null) {
                $(this).animate({
                    scrollTop: $(this).scrollTop() + scrollTo
                });
            }
        });
    });
</script>
