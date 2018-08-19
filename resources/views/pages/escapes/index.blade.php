@extends('layouts.public')

@section('content')
<div class="escape-list tall-escape">
@foreach ($escapes as $escape)
	@include('pages.escapes.escape-full-list')
@endforeach
</div>
@endsection
@section('sidemenu')
	@include('partials.sidemenu')
@endsection
