<h4>Payment Recieved</h4>
<table class="statement">
	<tr>
		<td>
			Name: {{$reservation->user->full_name}}
		</td>
	</tr>
	<tr>
		<td>
			Email: {{$reservation->user->email}}
		</td>
	</tr>
	<tr>
		<td>
			Roomate Requested: {{$reservation->roomate_name or 'NA'}}
		</td>
	</tr>
		<tr>
		<td>
			Additional Guest: {{$reservation->additional_guest_name or 'NA'}}
		</td>
	</tr>
</table>
