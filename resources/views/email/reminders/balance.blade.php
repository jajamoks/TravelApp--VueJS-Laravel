@extends('email.layout')

@section('body')
	<div class="container">
		<div class="content">
			<h3>Hello, {{$reservation->user->first_name}}!</h3>
			<p>A friendly reminder that the balance for the following escape is due soon. You can log into your account at any time to pay the balance. See you soon!</p>
		</div>
	</div>
	@include('email.partials.reservation-item')
	<div class="container">
		<div class="content">
			<table class="statement">
				<tr class="statement-balance">
					<td align="center">
						<h5>Balance {{$reservation->display_current_balance}}</h5>
					</td>
				</tr>
				<tr class="e2s-spacer"></tr>
					<tr>
						<td align="center" colspan="3">
							Balance Due : {{$reservation->escape->display_payment_due}}
						</td>
					</tr>
				<tr class="e2s-spacer"></tr>
				<tr>
					<td align="center" colspan="3">
							<a class="btn" href="{{route('account')}}">Pay Balance</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
@endsection
