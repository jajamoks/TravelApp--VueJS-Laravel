{{--<div class="blog block post-content-area">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="img-container">--}}
                {{--@if(isset($post->image))--}}
                    {{--<img class="img-responsive img-cover post-list-image" src="{{$post->image->fullSize}}" alt="{{ $post->title }}" />--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="post-info-box">--}}
        {{--<h3>{{ $post->title }}</h3>--}}
        {{--<p class="date">{{ $post->display_date }}</p>--}}
        {{--<p>{{ $post->excerpt }}</p>--}}
        {{--<div class="blog-post-footer">--}}
            {{--<a href="/press/{{ $post->slug }}" class="btn btn-primary-filled"><span>Read More</span><i class="fa fa-chevron-right"></i></a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="masonry-layout__panel">
    <div class="press-item">
        <h3> <a style="font-weight: 400" href="/press/{{ $post->slug }}">{{$post->title}}</a> </h3>
        {{--<h3>{{$post->title}}</h3>--}}
        @if(isset($post->image))
            <a href="/press/{{ $post->slug }}">
                <img src="{{$post->image->fullSize}}" class="img-responsive" />
            </a>
        @endif
        <p class="date">{{$post->display_date}}</p>
        {{--@if(!empty($post->attachment))--}}
            {{--<a class="btn btn-primary btn-primary-filled" data-featherlight="image" href="{{$post->attachment->fullSize}}">Read More</a>--}}
        {{--@else--}}
            {{--<a class="btn btn-primary btn-primary-filled" href="/press/{{ $post->slug }}">Read More</a>--}}
        {{--@endif--}}
        <a class="btn btn-primary btn-primary-filled" href="/press/{{ $post->slug }}">Read More</a>
    </div>
</div>
