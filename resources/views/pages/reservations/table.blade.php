<div class="row reservations-cart">
	@if(isset($cart))
	<div class="col-md-6 space-bottom">
		@php
		$escape = $cart->escape;
		@endphp
		@include('pages.escapes.escape-info')
		<div class="space-top space-bottom reservations-info">
			<h6>Room Type</h6>
			<hr />
			<span class="room-type">{{$cart->room}}</span>
		</div>
		<div class="space-bottom reservations-info">
			<h6>Guests</h6>
			<hr />
			{{$cart->guests}}
		</div>
		<div class="space-bottom reservations-info">
			<h6>Escape Total</h6>
			<hr />
			${{$cart->display_sub_total}}
		</div>
		<div class="space-bottom reservations-info">
			<h6>Deposit Due</h6>
			<hr />
			${{$cart->display_deposit}}
		</div>
	</div>
	@endif
</div>
