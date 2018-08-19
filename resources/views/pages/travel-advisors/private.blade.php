@extends('layouts.public')
@section('content')
<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/w_1024/cart5.jpg); background-position: 50% 55%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				Private Travel &amp; Bespoke Escapes
			</h1>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="text-center space-bottom">
					<p>Whether a quick London business trip or an off-the-beaten path girls getaway; a solo luxury spa weekend or an action-packed adventure-trip with you children; a Disney getaway for the entire family, a honeymoon you will never forget or a corporate incentive trip for your entire company, let us advise &amp; book your travel and you will not only gain access to our special rates, upgrades &amp; amenities, but to 10+ years worth of travel production, discoveries &amp; knowledge in over 70 countries, and counting!</p>
					<p>
					What's more? We are part of a team of the most educated, savvy &amp; empowered advisors in the travel industry- so you are sure to have the very best experience, attention &amp; support all along the way!</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('pages.travel-advisors.travel-form')
		</div>
		<!-- <div class="col-md-4 sidebar">
			<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_400/cart5.jpg" class="img-responsive" />
			<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_400/imagegen.ashx_.jpg" class="img-responsive" />
			<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_400/IMG_3032.jpg"

		</div> -->
	</div>
	@include('partials.cadence-logos')
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
