<div class="escape-hero">
	<div id="escape-slider" class="escape-header">
		<div class="slide">
				<img class="img-cover"
						src="{{$escape->escape_type->featured_image->fullSize}}"
						alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
						title="{{$escape->escape_type->name}}" />
		</div>
		@foreach ($escape->escape_type->gallery as $image)
		<div class="slide">
					<img class="img-cover"
						src="{{$image->fullSize}}"
						alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
						title="{{$escape->escape_type->name}}" />
		</div>
		@endforeach
	</div>
	<div class="escape-hero-info">
		<h1>{{$escape->escape_type->name}}</h1>
		<h4>{{$escape->escape_type->location}}</h4>
	</div>
</div>
