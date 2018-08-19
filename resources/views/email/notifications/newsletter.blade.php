@extends('email.layout')

@section('body')
<table>
	<tr>
		<td>
			Email: {{ $email }}
		</td>
	</tr>
</table>
@endsection
