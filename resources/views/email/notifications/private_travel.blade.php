@extends('email.layout')

@section('body')
<table>
	<tr>
		<td>
			Interest: {{ $interest or 'Not Specified' }}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	<tr>
		<td>
			Name: {{ $name }}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	<tr>
		<td>
			Email: {{ $email }}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	<tr>
		<td style="white-space: pre-line;">
			Details:
			<br />
			{{ $content }}
		</td>
	</tr>
</table>
@endsection
