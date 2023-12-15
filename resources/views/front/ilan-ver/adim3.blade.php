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
                        {{$cat->title}} @if(!isset($type->title) || empty($type->title)) @else / {{$type->title}} @endif
                        @if(!isset($model->title) || empty($model->title)) @else/ {{$model->title}} @endif
                        @if(!isset($year->title) || empty($year->title)) @else/ {{$year->title}} @endif
                    </div>
                </div>
                <div class="adim3-main">
                    <h5>
                        İlan Detayları
                    </h5>
                    <div class="admin3-content">
                        <form action="/ilan-ver/adim3/store" method="post" enctype="multipart/form-data">
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
                                @if($cat->form_element1 != null)
                                    <h6>{{$cat->form_element1}}</h6>
                                    <input type="text" name="form_element1">
                                @endif
                                @if($cat->form_element2 != null)
                                        <h6>{{$cat->form_element2}}</h6>
                                        <input type="text" name="form_element2">
                                @endif
                               @if($cat->form_element3 != null)
                                        <h6>{{$cat->form_element3}}</h6>
                                        <input type="text" name="form_element3">
                               @endif
                                @if($cat->form_element4 != null)
                                        <h6>{{$cat->form_element4}}</h6>
                                        <input type="text" name="form_element4">
                                @endif

                                <h6>Resim</h6>
                                <input type="file" name="image[]" multiple accept='image/*'>
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
