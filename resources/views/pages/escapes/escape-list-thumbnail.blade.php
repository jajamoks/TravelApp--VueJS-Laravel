<style>
    .escape-info-wrap p{line-height: 15px;}
    .escape-info-wrap{min-height: 62px;}
</style>

<div class="escape-thumbnail">
		<img class="img-cover"
					src="{{$escape->escape_type->featured_image->mediumSize}}"
					alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
					title="{{$escape->escape_type->name}}" />
	<div class="escape-info">
		<div class="escape-info-wrap">
		<p>{{$escape->escape_type->name}}</p>
		<p>{{$escape->short_display_date}}</p>
		<p>{{$escape->escape_type->location}}</p>
		</div>
		<a href="/escapes/{{$escape->slug}}" class="btn btn-sm btn-primary btn-primary-filled">Discover</a>
	</div>
</div>
