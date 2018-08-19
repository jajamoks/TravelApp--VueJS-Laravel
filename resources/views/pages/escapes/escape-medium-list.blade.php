<li class="item">
	<div class="escape-item">
    @yield('calendar-date')
		<a href="{{route('public.escape', ['slug' => $escape->slug])}}">
		<div class="escape-image-container">
			<img class="img-cover"
					src="{{$escape->escape_type->featured_image->mediumSize}}"
					alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
					title="{{$escape->escape_type->name}}" />
		</div>
		</a>
		<div class="escape-info">
			<div class="row text-center">
				<div class="col-md-12">
					<div class="escape-date">{{$escape->display_start_date}}</div>
				</div>
				<div class="col-md-12">
					<span class="escape-location">{{$escape->escape_type->location}}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center escape-cta">
		<a href="{{route('public.escape', ['slug' => $escape->slug])}}" class="btn btn-primary-filled">Discover</a>
	</div>
</li>
