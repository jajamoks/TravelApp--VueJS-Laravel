<section id="includes" class="row">
	<div class="col-md-12">
	<h3>Includes</h3>
	<ul>
		@foreach ($escape->escape_type->features as $feature)
			<li>{{$feature->content}}</li>
		@endforeach
	</ul>
	<hr />
</div>
</section>
