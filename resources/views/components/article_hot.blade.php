<h5 style="text-align: center">Top Bài viết nổi bật</h5>
<div class="list_articatle_hot">
        @if (isset($articleHot))
            @foreach ($articleHot as $arHot)
                <div class="article">
                    <div class="article_avatar">
                        <a href="">
                            <img src="{{ pare_url_file($arHot->a_avatar)}}" alt="">
                        </a>
                    </div>
                    <div class="article_avatar">
                        <h3 style="font-size: 15px ;margin: 10px;"> <a href="{{ route('get.detail.article', [$arHot->a_slug,$arHot->id]) }}">{{$arHot->a_name}}</a></h3>
                        <p style="font-size: 13px"> {{$arHot->a_description}}</p>
                    </div>
                </div>
            @endforeach
        @endif
</div>