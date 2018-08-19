@extends('layouts.public')

@section('content')
    <style>
        .press-item {overflow: hidden;}

    </style>
    <div class="main-content text-center">
        <h1>Press</h1>
        <div class="masonry-layout">
                @forelse ($press as $post)
                    @include('pages.press.list_single')
                @empty
                    @include('pages.press.no_results')
                @endforelse
        </div>
    </div>
@endsection
@section('sidemenu')
    @include('partials.sidemenu')
@endsection