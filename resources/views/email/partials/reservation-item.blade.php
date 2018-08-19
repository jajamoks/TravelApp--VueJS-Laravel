<table class="">
	<tr>
		<td class="small" width="20%" style="vertical-align: top; padding-right:10px;"><img src="{{$reservation->escape->escape_type->featured_image->thumbnail}}" /></td>
		<td>
			<h4>{{$reservation->escape->escape_type->name}}</h4>
			<p class="">{{$reservation->escape->escape_type->location}}</p>
			<p class="">{{$reservation->escape->display_date}}</p>
			<p class="">Room Type: {{$reservation->display_room_type}}</p>
			<p class="">Guests: {{$reservation->guests}}</p>
		</td>
	</tr>
</table>
