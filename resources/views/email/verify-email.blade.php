@extends('email.layout')

@section('body')
	<table>
	<tr>
		<td>
			<h3>
				Many thanks for subscribing to our newsletter.
			<h3>
			<p class="lead">
				Please click the button below to verify your email.
			</p>
			<p class="lead">
				<a class="btn" href="{{
					route("email-verification", ['token' => $token])}}">Verify Email</a>
			</p>
		</td>
	</tr>
</table>
@endsection
