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
                            <a href="#" style="margin-left: 15px; color: #489AF1; margin-top: -10px; font-size: 14px;height: 20px">
                                {{$selectedcat1->title}} / {{$selectedcat2->title}} / {{$selectedcat3->title}} / {{$selectedcat4->title}}
                            </a>
                            <div class="adim1-content-inner">
                                <div class="adim2-table" id="maincategory">
                                    <ul>
                                        @foreach($allcat as $rs)
                                            @if($rs->parent_id == $selectedcat1->id)
                                                <li>
                                                    <a href="/ilan-ver/adim2/{{$selectedcat1->id}}/{{$rs->id}}" onclick="">
                                                        {{$rs->title}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="adim2-table" id="year">
                                    <ul>
                                        @foreach($allcat as $rs)
                                            @if($rs->parent_id == $selectedcat2->id)
                                                <li>
                                                    <a href="/ilan-ver/adim2/{{$selectedcat1->id}}/{{$selectedcat2->id}}/{{$rs->id}}" onclick="">
                                                        {{$rs->title}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="adim2-table" id="year">
                                    <ul>
                                        @foreach($allcat as $rs)
                                            @if($rs->parent_id == $selectedcat3->id)
                                                <li>
                                                    <a href="/ilan-ver/adim2/{{$selectedcat1->id}}/{{$selectedcat2->id}}/{{$selectedcat3->id}}/{{$rs->id}}" onclick="">
                                                        {{$rs->title}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="devam">
                                <a href="/ilan-ver/adim3" class="btn btn-primary" type="submit">
                                    Devam
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
