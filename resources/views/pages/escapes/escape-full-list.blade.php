<div class="escape-grid-item">
	<div class="escape-inner-wrap">
	<img class="img-cover"
		src="{{$escape->escape_type->featured_image->mediumSize}}"
		alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
		title="{{$escape->escape_type->name}}"
		/>
  </div>
	<div class="info text-center">
			<div class="date animated fadeInLeft">{{$escape->short_display_date}}</div>
			<div class="name animated fadeInRight">{{$escape->escape_type->name}}</div>
			<div class="location animated fadeInLeft">
				{{$escape->escape_type->region}}, {{$escape->escape_type->country}}
			</div>
			<div class="cta animated zoomIn">
				<a href="{{route('public.escape', ['slug' => $escape->slug])}}" class="btn btn-primary btn-primary-filled">
					Discover
				</a>
			</div>
			<div class="tags-container animated fadeInBottom">
				<ul class="tag-list">
					@foreach($escape->escape_type->tagArray as $tag)
						<li class="tag">{{$tag}}</li>
					@endforeach
				</ul>
		 	</div>
	</div>
</div>
