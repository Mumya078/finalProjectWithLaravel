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
                                {{$selectedcat1->title}}
                            </a>
                        @php($found = false)
                            <div class="adim1-content-inner">
                                @foreach($allcat as $rs)
                                    @if($rs->parent_id == $selectedcat1->id)
                                        @php($found = true)
                                    @endif
                                @endforeach
                                <div class="adim2-table" id="maincategory" @if(!$found) style="display: none" @endif>
                                    <ul>
                                        @foreach($allcat as $rs)
                                            @if($rs->parent_id == $selectedcat1->id)
                                                <li>
                                                    <a href="/ilan-ver/adim2/{{$selectedcat1->id}}/{{$rs->id}}">
                                                        {{$rs->title}}
                                                    </a>
                                                </li>
                                                @php($found = true)
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @if(!$found)
                            <div class="devam">
                                <a href="/ilan-ver/adim3" class="btn btn-primary" type="submit">
                                    Devam
                                </a>
                            </div>
                        @endif
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
