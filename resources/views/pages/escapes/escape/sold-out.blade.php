<div class="sold-out-escape">
	<div class="alert alert-danger">
		<h1>Sold Out</h1>
	</div>
	<div class="text-center">
		<a href="{{route('public.contact', ['interest' => 'Waiting List: '. $escape->escape_type->name])}}" class="btn btn-primary btn-primary-filled  btn-lg">
			Join Waiting List
		</a>
	</div>
</div>
