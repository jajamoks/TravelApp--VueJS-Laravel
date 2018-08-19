@extends('layouts.public')

@section('content')
    <style>
        img {
            width:auto;
        }
        a {
            word-wrap: break-word !important;
        }
        p {
            word-wrap: break-word;
        }
				.post-content-area .img-container{height: auto;}
				.img-cover{position: relative;}
				.dropdown img.img-cover {position: absolute;}
        @media screen and (max-width: 767px) {
            .post-content-area .img-container {
                height: auto;
            }

            .img-container img {
                height: auto;
            }
            .blog.block img{
                height: auto !important;
                width: 100% !important;
                position: relative;
            }

        }
    </style>
    <div id="page-content" class="container-fluid main-content">
        <section id="blog">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="blog block post-content-area">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @if(isset($press->image))
                                <div class="img-container">
                                        @if($press->image_alt)
                                            <img class="img-responsive img-cover" src="{{$press->image->fullSize}}" alt="{{ $press->image_alt }}" />
                                        @else
                                            <img class="img-responsive img-cover" src="{{$press->image->fullSize}}" alt="{{ $press->title }}" />
                                        @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="post-info-box">
                            <h3>{{ $press->title }}</h3>
                            {{--<p class="post-meta">Posted by <a href="#">{{ $post->user->name }}</a> on <a href="#">{{ $post->display_date }}</a></p>--}}
                            <p> {!! $press->content !!} </p>
                            @if($press->link)
                            <p> Original Article : <a href="{!! $press->link !!}" target="_blank"> {!! $press->link !!} </a> </p>
                            @endif
                        </div>
                        @include('pages.press.social')
                    </div>
                </div>
                @include('pages.press.sidebar')
            </div>
        </section>
    </div> <!-- container  -->
@endsection
