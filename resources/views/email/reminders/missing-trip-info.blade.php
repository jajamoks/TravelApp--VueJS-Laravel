@extends('email.layout')

@section('body')
	<div class="container">
		<div class="content">
			<h3>Hello, {{$reservation->user->first_name}}!</h3>
			<p>A friendly reminder that we are missing some information from you about your upcoming trip. Please log into your account at your earliest convienence and enter the following information:</p>
			<ol>
				@if(empty($reservation->waiver))
					<h4>Signed Waiver</h4>
				@endif
				@if(empty($reservation->flight))
					<h4>Flight Information</h4>
				@endif
					@if(!$reservation->user->profile->complete)
					<h4>Profile</h4>
					<p>Profile includes dietary restrictions, fitness level/restrictions, and emergency contact information</p>
				@endif
			</ol>
			<table>
				<tr>
				<td align="center" colspan="3">
						<a class="btn" href="{{route('account')}}">Go to Account</a>
				</td>
				</tr>
			</table>

		</div>
	</div>
@endsection
