<table class="statement">
	<tr>
		<td>
			<h4>Statement</h4>
		</td>
	</tr>
	<tr class="statement-header">
		<td>Date</td>
		<td>Payment</td>
		<td>Auth #</td>
	</tr>
	@foreach ($reservation->payments as $payment)
	<tr>
		<td>{{$payment->display_date}}</td>
		<td>{{$payment->display_amount}}</td>
		<td>{{$payment->auth_code}}</td>
	</tr>
	@endforeach
	<tr class="e2s-spacer"></tr>
	<tr class="statement-balance">
		<td>
			<h5>Balance {{$reservation->display_current_balance}}</h5>
		</td>
	</tr>
	@if($reservation->current_balance > 0)
	<tr class="e2s-spacer"></tr>
	<tr>
		<td align="center" colspan="3">
			Balance Due : {{$reservation->escape->display_payment_due}}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	@if(!isset($is_notification))
	<tr>
		<td align="center" colspan="3">
			<a class="btn" href="{{route('account')}}">Pay Balance</a>
		</td>
	</tr>
	@endif
	@endif
</table>
