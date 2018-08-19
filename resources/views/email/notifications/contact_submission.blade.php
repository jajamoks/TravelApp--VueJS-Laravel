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
		<td>
			Message: {{ $content }}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	<tr>
		<td>
			Zip: {{ $zip or 'Not Supplied' }}
		</td>
	</tr>
	<tr class="e2s-spacer"></tr>
	<tr>
		<td>
			Where they heard about us: {{ $source or 'Not Supplied' }}
		</td>
	</tr>
</table>
@endsection
