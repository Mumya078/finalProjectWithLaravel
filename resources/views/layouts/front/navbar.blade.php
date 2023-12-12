@php
    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist()
@endphp
<div class="navbar-main">
    <ul>
        @foreach( $mainCategories as $rs)
            <li>
                <ul>
                    <div class="navbar-headers">
                        @if($rs->parent_id == 0)
                            <div style="background-color: {{$rs->color}}"><i style="color: white" class="fa-solid {{$rs->image}}"></i></div>
                            <h4><a href="/category/{{$rs->title}}"> {{$rs->title}}</a>(1000)</h4>
                        @endif
                    </div>
                    @if(count($rs->children))
                        @include('front.categorytree',['children'=>$rs->children])
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
</div>
