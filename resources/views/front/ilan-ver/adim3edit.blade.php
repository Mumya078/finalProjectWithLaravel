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
                        {{$data->category}} @if(!isset($data->type) || empty($data->type)) @else/ {{$data->type}} @endif
                        @if(!isset($data->year) || empty($data->year)) @else / {{$data->year}} @endif
                        @if(!isset($data->model) || empty($data->model)) @else/ {{$data->model}} @endif
                    </div>
                </div>
                <div class="adim3-main">
                    <h5>
                        İlan Detayları
                    </h5>
                    <div class="admin3-content">
                        <form action="/ilan-ver/adim3/edit/{{$data->id}}/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-title">
                                <div>
                                    <h6>İlan Başlığı</h6>
                                    <input value="{{$data->title}}" type="text" name="title">
                                </div>
                                <div>
                                    <h6>Açıklama</h6>
                                    <input type="text" value="{{$data->desc}}" name="desc">
                                </div>
                                <div>
                                    <h6>Fiyat</h6>
                                    <input value="{{$data->price}}" type="number" name="price"> TL
                                </div>
                            </div>
                            @php
                            $cat = \App\Models\Category::find($data->category_id)
                            @endphp
                            <div class="form-main">
                                @if($cat->form_element1 != null)
                                    <h6>{{$cat->form_element1}}</h6>
                                    <input value="{{$data->form_element1}}" type="text" name="form_element1">
                                @endif
                                @if($cat->form_element2 != null)
                                        <h6>{{$cat->form_element2}}</h6>
                                        <input value="{{$data->form_element2}}" type="text" name="form_element2">
                                @endif
                               @if($cat->form_element3 != null)
                                        <h6>{{$cat->form_element3}}</h6>
                                        <input value="{{$data->form_element3}}" type="text" name="form_element3">
                               @endif
                                @if($cat->form_element4 != null)
                                        <h6>{{$cat->form_element4}}</h6>
                                        <input value="{{$data->form_element4}}" type="text" name="form_element4">
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
