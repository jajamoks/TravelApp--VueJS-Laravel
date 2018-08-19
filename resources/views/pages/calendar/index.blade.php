@extends('layouts.public')
@section('content')
@include('pages.calendar.map')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 space-top">
			<h1 class="text-center">Calendar</h1>
			@include('pages.calendar.list')
		</div>
	</div>
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
