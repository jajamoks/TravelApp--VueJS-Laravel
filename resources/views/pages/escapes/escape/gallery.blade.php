<div class="text-center">
	Click to view images
</div>
<aside class="escape-photo-gallery">
@foreach ($escape->escape_type->gallery as $image)
		<a href="#" data-featherlight="{{$image->fullSize}}" class="gallery-item" style="background-image:url({{$image->fullSize}});">
		</a>
@endforeach
</aside>
