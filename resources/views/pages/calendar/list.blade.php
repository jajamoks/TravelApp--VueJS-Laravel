<div class="escape-list">
	<ul class="e2s-wide-list-section e2s-featured-escapes calendar-list">
		@foreach($escapes as $escape)
			@section('calendar-date')
				<div class="text-center">
					<h3>{{$escape->start_date->format('F Y')}}</h3>
				</div>
			@overwrite
			@include('pages.escapes.escape-medium-list')
		@endforeach
	</ul>
</div>
