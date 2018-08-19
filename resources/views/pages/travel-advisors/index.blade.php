@extends('layouts.public')

@section('content')
<div class="travel-advisors">
<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/v1494268618/IMG_3568.jpg); background-position: 50% 55%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				Luxury Travel Advisors
			</h1>
			<div class="travel-advisor-benefits">
				<div>
					Worry-Free, Expert Planning
				</div>
				<div>
				Unforgettable Luxury Experiences
				</div>
				<div>
					Boutique-Chic Unique Experiences
				</div>
				<div>
					Exclusive Perks, Insider Access &amp; Upgrades
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row space-bottom">
		<div class="col-md-8 col-md-offset-2">
			<p class="text-center">By becoming Luxury Travel Advisors with industry leader Elite Travel International, Powered by Cadence Travel, we can now share our curated itineraries, off the beaten path gems and insider access, plus our connection with preferred partner luxury &amp; boutique hotels, airlines, guides, tours &amp; cruise lines. And we have National Account status with Virtuoso, which means even better rates, upgrades &amp; perks for our clients!</p>

			<p class="text-center">From boutique chic to ultra luxe; solo travel to multi-generational; a business trip to leisure travel; a quick night away to an extended holiday, let us plan your next getaway.</p>
		</div>
	</div>
</div>
<div class="e2s-home-section">
	<ul class="e2s-wide-list-section space-top">
		<li class="item">
			<div class="es2-wide-list-section-header">
				<h3>
					<span>Private Travel &amp;</span>
					<span>Bespoke Escapes</span>
				</h3>
			</div>
			<div class="action-container">
				<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_600/private_aiyrqe.jpg" class="img-responsive" />
				<div class="action">
					<a href="{{route('public.private-travel')}}" class="btn btn-primary primary-white">
						Get A Quote
					</a>
				</div>
			</div>
			</a>
		</li>
		<li class="item">
			<div class="es2-wide-list-section-header">
				<h3>
					<span>Travel Team &amp; </span>
					<span>Their Specialties</span>
				</h3>
			</div>
			<div class="action-container">
				<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_600/oxcartscambodia1.jpg" class="img-responsive" />
				<div class="action">
					<a href="{{route('public.team')}}" class="btn btn-primary primary-white">
						Meet The Team
					</a>
				</div>
			</div>
		</li>
		<li class="item">
			<div class="es2-wide-list-section-header">
				<h3>
					<span>Ideas &amp;</span>
					<span>Inspiration</span>
				</h3>
			</div>
			<div class="action-container">
				<img src="https://res.cloudinary.com/escapetoshape/image/upload/w_600/yoga-beach-3-1.jpg" class="img-responsive" />
				<div class="action">
					<a href="{{route('public.inspiration')}}" class="btn btn-primary primary-white">
						Discover
					</a>
				</div>
			</div>
		</li>
	</ul>
</div>
<div class="container-fluid">
	@include('partials.cadence-logos')
</div>
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
