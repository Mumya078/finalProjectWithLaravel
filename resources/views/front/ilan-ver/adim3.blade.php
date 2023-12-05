<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/ilan-ver.scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
    <div style="background: #FAFAFA">
        <div class="container">
            <div class="row">
                <div class="adim3-main">
                    <h5>Kategori</h5>
                    <div class="admin3-kategori-content">
                        {{$cat->title}} / {{$type->title}} / {{$model->title}} / {{$year->title}}
                    </div>
                </div>
                <div class="adim3-main">
                    <h5>
                        İlan Detayları
                    </h5>
                    <div class="admin3-content">
                        <form action="/ilan-ver/adim3/store" method="post">
                            @csrf
                            <div class="form-title">
                                <div>
                                    <h6>İlan Başlığı</h6>
                                    <input type="text" name="title">
                                </div>
                                <div>
                                    <h6>Açıklama</h6>
                                    <textarea type="input" name="desc"></textarea>
                                </div>
                                <div>
                                    <h6>Fiyat</h6>
                                    <input type="number" name="price"> TL
                                </div>
                            </div>
                            <div class="form-main">
                                <h6>KM</h6>
                                <input type="text" name="KM">
                                <h6>Renk</h6>
                                <select name="color">
                                    <option value="">Seçiniz</option>
                                    <option value="kırmızı">Kırmızı</option>
                                    <option value="mavi">Mavi</option>
                                    <option value="gri">Gri</option>
                                    <option value="bej">Bej</option>
                                    <option value="turkuaz">Turkuaz</option>
                                    <option value="sarı">Sarı</option>
                                </select>
                                <h6>Takas</h6>
                                <select name="trade">
                                    <option>Seçiniz</option>
                                    <option value="{{true}}">Evet</option>
                                    <option value="{{false}}">Hayır</option>
                                </select>
                            </div>
                            <div class="devam">
                                <button class="btn btn-primary" type="submit">
                                    Devam
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
