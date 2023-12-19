@foreach($children as $rs)
    <li>
        <h6><a href="/category/{{$rs->title}}">{{$rs->title}}</a></h6>
    </li>
@endforeach
