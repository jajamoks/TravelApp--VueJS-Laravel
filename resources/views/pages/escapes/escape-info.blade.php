<div class="escape-header-list">
	<div class="escape-list-container">
		<div class="escape-thumbnail info-thumbnail">
				<img class="img-cover"
					src="{{$escape->escape_type->featured_image->mediumSize}}"
					alt="{{$escape->escape_type->name}} {{$escape->escape_type->location}} {{$escape->short_display_date}}"
					title="{{$escape->escape_type->name}}" />
			<div class="escape-info">
				<p>{{$escape->escape_type->name}}</p>
				<p>{{$escape->short_display_date}}</p>
				<p>{{$escape->escape_type->location}}</p>
			</div>
		</div>
	</div>
</div>
