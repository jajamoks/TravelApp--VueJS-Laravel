@extends('layouts.public')

@section('content')
<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/v1492554666/fpmvpaljsgkq3wm9x26b.jpg); background-position: 50% 35%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				Reviews
			</h1>
		</div>
	</div>
</div>
<div class="container">
	@foreach ($testimonials as $testimonial)
		<div class="row space-bottom">
			<div class="col-md-10 col-md-offset-1">
				<div class="quote-medium text-center">
					<p class="quote-content">{!! $testimonial->content !!}</p>
					<p class="quote-source">-- {{$testimonial->name}} {{ $testimonial->date->format('F Y') }}</p>
					<hr/>
				</div>
			</div>
	</div>
	@endforeach
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
