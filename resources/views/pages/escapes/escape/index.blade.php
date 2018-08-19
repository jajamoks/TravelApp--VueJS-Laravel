@extends('layouts.public')

@section('content')

@include('pages.escapes.escape.slideshow')
<div class="container-fluid escape-page">
	<div class="col-md-4 col-md-push-8 escape-sticky-sidebar">
		@include('pages.escapes.escape.booking')
		@include('pages.escapes.escape.social')
		@include('pages.escapes.escape.gallery')
	</div>
	<div class="col-md-8 col-md-pull-4">
		@include('pages.escapes.escape.featured_testimonial')
		@include('pages.escapes.escape.summary')
		@include('pages.escapes.escape.info')
		@include('pages.escapes.escape.includes')
		@include('pages.escapes.escape.rate')
		@include('pages.escapes.escape.accomodations')
		@include('pages.escapes.escape.itinerary')
		@include('pages.escapes.escape.teachers')
	</div>

</div>

@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
