<form id="reservation-form" method="POST" action="{{route('reservations.store')}}">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-6 col-md-push-6">
			<div class="hidden-md hidden-lg">
				@include('pages.reservations.info')
			</div>
			@include('pages.reservations.customer-info')
		</div>
		<div class="col-md-6 col-md-pull-6">
			<div class="hidden-xs hidden-sm">
				@include('pages.reservations.info')
			</div>
			@include('pages.reservations.billing-info')
		</div>
	</div>
	<div class="row space-top">
	<div class="col-md-6">
		<p>A non-refundable deposit of ${{$cart->display_deposit}} is required to confirm your reservation. By submitting your credit card information you authorize Escape To Shape to charge your credit card for this amount and acknowledge that this deposit is non-refundable and non-transferable to a future Escape.</p>
	</div>
	<div class="col-md-6">
		<p>The balance of your payment is required to be paid in full by {{$cart->escape->display_payment_due}}. A reminder email will be sent to you prior to the due date. The balance due is non-refundable upon payment.</p>
	</div>
</div>
</form>
<div class="row space-top">
		<div class="col-md-12">
			<h5>Travel Insurance</h5>
		</div>
		<div class="col-md-12">
			@include('partials.insurance')
		</div>
</div>
