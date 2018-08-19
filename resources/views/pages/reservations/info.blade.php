<div class="reservations-cart">
	@if(isset($cart))
	<div class="space-bottom">
		@php
		$escape = $cart->escape;
		@endphp
		@include('pages.escapes.escape-info')
		<div class="reservations-info">
			<div class="space-bottom info-item">
				<h5>Room Type</h5>
				<hr />
				<span class="room-type">{{$cart->room}}</span>
			</div>
			<div class="space-bottom info-item">
				<h5>Guests</h5>
				<hr />
				{{$cart->guests}}
			</div>
			<div class="space-bottom info-item">
				<h5>Escape Total</h5>
				<hr />
				${{$cart->display_sub_total}}
			</div>
			<div class="space-bottom info-item">
				<h5>Deposit Due</h5>
				<hr />
				${{$cart->display_deposit}}
			</div>
		</div>

	</div>
	@endif
</div>
