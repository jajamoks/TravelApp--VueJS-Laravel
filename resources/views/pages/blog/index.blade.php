@extends('layouts.public')

@section('content')
<div id="page-content" class="main-content">
	<section id="blog">
		<div class="row">
			<div class="col-sm-8 col-md-9 e2s-post-list">
				@forelse ($posts as $post)
					@include('pages.blog.list_single')
				@empty
					@include('pages.blog.no_results')
				@endforelse

			</div>
			@include('pages.blog.sidebar')
		</div>
	</section>
	@if(count($posts) > 0)
	<div class="pagination text-center">
		<a href="{{ $posts->first()->paginate()->previousPageUrl() }}" class="btn btn-primary-filled">
			<i class="fa fa-long-arrow-left"></i><span>Prev</span>
		</a>
		<a href="{{ $posts->first()->paginate()->nextPageUrl() }}" class="btn btn-primary-filled">
			<span>Next</span><i class="fa fa-long-arrow-right"></i>
		</a>
	</div>
	@endif
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
