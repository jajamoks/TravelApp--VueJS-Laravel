<div class="masonry-layout__panel">
	<div class="press-item">
	<h3>{{$item->title}}</h3>
	@if(isset($item->image))
	<a href="{{$item->link}}">
		<img src="{{$item->image->fullSize}}" class="img-responsive" />
	</a>
	@endif
	<p class="date">{{$item->display_date}}</p>
  @if(!empty($item->attachment))
    <a class="btn btn-primary btn-primary-filled" data-featherlight="image" href="{{$item->attachment->fullSize}}">Read More</a>
  @else
    <a class="btn btn-primary btn-primary-filled" href="{{$item->link}}">Read More</a>
  @endif
	</div>
</div>
