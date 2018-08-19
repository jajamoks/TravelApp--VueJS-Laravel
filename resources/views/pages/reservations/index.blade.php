@extends('layouts.public')
@section('content')
	<div class="container main-content">
		<h1 class="text-center">Reservations</h1>
	</div>
	@if(isset($cart))
		@include('pages.reservations.form')
	@else
		@include('pages.reservations.cart-empty')
	@endif
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
