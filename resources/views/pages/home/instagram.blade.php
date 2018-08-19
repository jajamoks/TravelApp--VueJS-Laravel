<div class="container-fluid e2s-instagram-section margin-top space-bottom">
<div class="row">
	<div class="col-md-12 text-center">
		<h4 class="alt-heading">Follow Us</h4>
		<h5 class="alt-heading">@escapetoshape on Instagram</h5>
	</div>
</div>
<div id="instagram-feed">
@if(isset($instagram) && !empty($instagram))
@foreach ($instagram->items as $post)
<div class="insta-post">
	<a href="{{$post->link}}">
		<img src="{{$post->images->standard_resolution->url}}" />
		<div class="caption">
			@if($post->caption)
			{{$post->caption->text}}
			@endif
		</div>
	</a>
	<div class="insta-header">
		@if(isset($post->location))
			<i class="fa fa-map-marker"></i> <span class="location">{{$post->location->name}}</span>
		@endif
	</div>
</div>
@endforeach
@endif

</div>
</div>
