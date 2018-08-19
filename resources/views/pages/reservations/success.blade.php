@extends('layouts.public')
@section('content')
<div class="page-hero" style="background-image:url({{
	$cart->escape->escape_type->featured_image->fullSize
}}); background-position: 50% 55%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				{{$cart->escape->escape_type->name}}
			</h1>
			<h3 class="hero-title">
				{{$cart->escape->escape_type->location}}
			</h3>
			<p class="hero-title">
				{{$cart->escape->display_date}}
			</p>
		</div>
	</div>
</div>
<div id="page-content" class="container">
    <div class="row contact-area">
        <div class="col-md-8 col-md-offset-2 contact-form-area text-center">
						<h3>Thank You!</h3>
						<p class="space-bottom">You will be recieving an email shortly with a receipt for your deposit and more information. The balance of the trip is due on {{$cart->escape->display_payment_due}}. We will send you a reminder email as the date gets closer. To pay the balance of your trip, log into your account at any time.</p>
						<a href="{{route('account')}}" class="space-top btn btn-primary btn-primary-filled">Visit Account</a>
				</div>
		</div>
</div>
@endsection
