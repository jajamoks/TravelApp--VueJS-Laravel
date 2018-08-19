@extends('layouts.public')
@section('content')

    <style>
        .post-info-box{word-wrap: break-word;}
        .img-container img{height:auto;}
				.post-content-area .img-container{height: auto;}
				.img-cover{position: relative;}
				.dropdown img.img-cover{position: absolute;}
        a {
            word-wrap: break-word !important;
        }
        p {
            word-wrap: break-word;
        }
        @media screen and (max-width: 767px) {
            .post-content-area .img-container {
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
                                <div class="img-container">
                                    <img class="img-responsive img-cover" src="{{ $post->featured_image }}"
                                         alt="{{ $post->title }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="post-info-box">
                            <h3>{{ $post->title }}</h3>
                            <p class="post-meta">Posted by <a href="#">{{ $post->user->name }}</a> on <a
                                        href="#">{{ $post->display_date }}</a></p>
                            <p>{!! $post->content !!}</p>
                        </div>
                        @include('pages.blog.social')
                    </div>
                </div>
                @include('pages.blog.sidebar')
            </div>
        </section>
    </div> <!-- container  -->
@endsection
