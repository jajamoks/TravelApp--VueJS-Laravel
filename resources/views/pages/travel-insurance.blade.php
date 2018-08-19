@extends('layouts.public')

@section('content')
	<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/w_1600/gkkl4thuuxbamptkb0fp.jpg); background-position: center 45%;">
		<div class="text-center hero-overlay">
			<div>
				<h1 class="hero-title">
					Purchase Travel Insurance
				</h1>
			</div>
		</div>
	</div>
	<div id="page-content" class="container">
		<div class="row">
			<div class="col-md-12">
				@include('partials.insurance')
			</div>
		</div>
		<div class="row m-v-20">
			<div class="col-md-6">
				<a href="//www.globalrescue.com/escapetoshape">
					<img class="img-responsive" src="https://res.cloudinary.com/escapetoshape/image/upload/w_400,q_auto/global-rescue_cbjod3.jpg" alt="Global Rescue Logo" title="Global Rescue" />
				</a>
			</div>
		</div>
		<div class="row m-v-20">
			<div class="col-md-12">
				<p>From minor medical issues to life-threatening situations, Global Rescue’s critical services have been there when they were needed most. Travelers have trusted Global Rescue’s medical and security travel services since 2004. Global Rescue memberships start at $119 and feature the following benefits: </p>
				<ul>
					<li>Medical evacuation services to your home country hospital of choice</li>
					<li>Field Rescue services from the point of injury or illness</li>
					<li>24/7 access to board-certified physicians, clinicians and specialists from Elite Medical Group and the Johns Hopkins Emergency Medicine Division of Special Operations</li>
					<li>Security extraction services from natural disasters, civil unrest and hostile environments</li>
				</ul>
				<p>
				Additionally, Global Rescue and IMG have created one of the industry’s most complete travel insurance products, integrating Global Rescue’s advisory and evacuation services with the financial protection of a comprehensive travel insurance program. Signature Travel Insurance guarantees that a trip is covered no matter what happens. 
				Highlights:
				</p>
				<ul>
					<li>Trip cancellation insured up to $100,000</li>
					<li>Trip interruption insured up to 150% of trip cost insured</li>
					<li>Up to $2,500 for lost luggage/baggage delay</li>
					<li>$100,000 emergency medical/dental coverage</li>
					<li>Optional Cancel for Any Reason Benefit</li>
				</ul>
				<p>Escape to Shape recommends a Global Rescue Membership with Signature Travel Insurance for your next trip. Visit <a href="//www.globalrescue.com/escapetoshape">www.globalrescue.com/escapetoshape</a> or call 617-549-4200 for more information.</p>
			</div>
		</div>
		</div>
	</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
