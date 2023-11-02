<link href="{{asset('/assets/custom.scss')}}" rel="stylesheet">
<link href="{{asset('/assets/front/ilan-ver.scss')}}" rel="stylesheet">

@extends("layouts.front.frontbase")

@section("content")
    <div style="background: #FAFAFA">
        <div class="container">
            <div class="row">
                <div class="adim3-main">
                    <h5>
                        İlan Detayları
                    </h5>
                    <div class="admin3-content">
                        <form>
                            <div class="form-title">
                                <div>
                                    <h6>İlan Başlığı</h6>
                                    <input type="text">
                                </div>
                                <div>
                                    <h6>Açıklama</h6>
                                    <textarea type="input"></textarea>
                                </div>
                                <div>
                                    <h6>Fiyat</h6>
                                    <input type="number"> TL
                                </div>
                            </div>
                            <div class="form-main">
                                <h6>KM</h6>
                                <input type="text">
                                <h6>Renk</h6>
                                <select>
                                    <option>Seçiniz</option>
                                    <option>Kırmızı</option>
                                    <option>Mavi</option>
                                    <option>Gri</option>
                                    <option>Bej</option>
                                    <option>Turkuaz</option>
                                    <option>Sarı</option>
                                </select>
                                <h6>Takas</h6>
                                <select>
                                    <option>Seçiniz</option>
                                    <option>Evet</option>
                                    <option>Hayır</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
