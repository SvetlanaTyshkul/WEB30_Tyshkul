@extends('layout')

@section('title', 'CONTACTS')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Наши контакты:<br><br>
        </h1>
        <ul>
            @foreach($contacts as $contact)
            <li>{{$contact->title}}: {{$contact->value}}</li>
            @endforeach
        </ul>
        <br>
        <br>
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"height":300,"width":700,"zoom":17,"queryString":"улица Екатерининская, 90, Одесса, Одесская область, Украина","place_id":"EmrRg9C70LjRhtCwINCV0LrQsNGC0LXRgNC40L3QuNC90YHQutCw0Y8sIDkwLCDQntC00LXRgdGB0LAsINCe0LTQtdGB0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsINCj0LrRgNCw0LjQvdCwIlASTgo0CjIJ9fGaJYIxxkARw8mZsCE3VS8aHgsQ7sHuoQEaFAoSCX0ctRQwMsZAEZkMXuwwQADBDBBaKhQKEgn579KWmzHGQBFuJdZbfGrBeA","satellite":false,"centerCoord":[46.470275266716946,30.7366768],"cid":"0xbdcea1892faa8de0","lang":"ru","cityUrl":"/ukraine/odessa","cityAnchorText":"Карта [CITY1], Черноморское побережье Украины, Украина","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"523320"};
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=523320';
                    s.async = true;
                    s.onload = function (e) {
                        window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                })();</script><a href="https://1map.com/ru/map-embed">1 Map</a></div>
    </div>

@endsection
