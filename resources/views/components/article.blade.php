@if (isset($articles))
    @foreach ($articles as $article)
        <div class="article" style=" padding: 10px 0 ; margin: 10px 0 ; border-bottom:1px solid #f2f2f2; display: flex; ">
            <div class="article_avatar">
                <a href="">
                    <img src="{{ pare_url_file($article->a_avatar)}}" style="width: 200px; height: 120px;" alt="">
                </a>
            </div>
            <div class="article_avatar" style="width: 80%;margin-left: 20px;">
                <h3 style="font-size: 15px"> <a href="{{ route('get.detail.article', [$article->a_slug,$article->id]) }}">{{$article->a_name}}</a></h3>
                <p style="font-size: 13px"> {{$article->a_description}}</p>
                <p>Nguyễn Hữu Minh Khai <span>{{ $article->created_at}}</span></p>
            </div>
        </div>
    @endforeach
    {!! $articles->links() !!}
@endif