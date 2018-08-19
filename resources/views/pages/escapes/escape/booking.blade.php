<script>
	var singleRooms = {{$escape->available_single_rooms}};
	var sharedRooms = {{$escape->available_shared_rooms}};
	var sharedRate = {{$escape->shared_rate}};
	var singleRate = {{$escape->single_rate}};
	var deposit = {{$escape->deposit_amount}};
</script>
<div class="booking-form">
	<div class="header">
		{{$escape->short_display_date}}
	</div>
	@if($escape->isReservable())
	<form class="form" method="post" action="{{route('escape-cart')}}" id="booking-widget">
		{{ csrf_field() }}
		<label for="guests">Number of Guests</label>
		<input type="hidden" name="escape_id" value="{{$escape->id}}" />
		<div class="e2s-select-wrap">
			<select class="form-control inline" name="guests" v-on:change="guestChange">
				<option value="" disabled selected hidden>Please Choose...</option>
			 	<option value="1">1</option>
				<option value="2" v-if="secondGuestAllowed">2</option>
			</select>
		</div>
		<label for="room">Room Type</label>
		<div class="e2s-select-wrap">
			<select class="form-control inline" name="room" v-on:change="roomChange">
				<option value="" disabled selected hidden>Please Choose...</option>
				@if($escape->available_single_rooms > 0)
					<option value="private" v-if="!showPrivateAsShared">Private (1 Bed)</option>
					<option value="private" v-if="showPrivateAsShared">Shared (1 Bed)</option>
				@endif
				@if($escape->available_shared_rooms > 0)
					<option value="shared" v-if="availableSharedRooms > 0">Shared (2 Beds)</option>
				@endif
			</select>
		</div>
		<div>
			<div class="alert alert-info pull-right" v-if="rate > 0" style="display:inline-block;">
				<div class="booking-total">
					$@{{rate / 100}} / per person
				</div>
			</div>
			<div class="cta" style="display:inline-block;">
				<input type="submit" class="btn btn-primary-filled" value="Book Now" />
			</div>
		</div>
	</form>
	@else
	@include('pages.escapes.escape.sold-out')
	@endif
</div>
