<section id="includes" class="row">
	<div class="col-md-12">
	<h3>Teachers</h3>
		@foreach ($escape->escape_type->teachers as $teacher)
			@include('pages.escapes.escape.teacher')
		@endforeach
	<hr />
</div>
</section>
