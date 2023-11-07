<div class="navbar-main">
    <ul>
        @foreach( $categorydata as $rs)
            <li>
                <ul>
                    <div class="navbar-headers">
                        <div><img src="/assets/img/car-icon.png"></div>
                        <h4><a href="/category">{{$rs->title}}</a>(1000)</h4>
                    </div>
                    <li>
                        <h6><a href="javascript:void(0)">SUV</a>(500)</h6>
                    </li>
                    <li>
                        <h6><a  href="javascript:void(0)">Spor</a>(500)</h6>
                    </li>
                    <li>
                        <h6><a  href="javascript:void(0)">Motorsiklet</a>(500)</h6>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
