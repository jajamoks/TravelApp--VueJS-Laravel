@extends('layouts.public')
@section('content')
<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/w_1600/gkkl4thuuxbamptkb0fp.jpg); background-position: center 45%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				New To Our Travaling Caravan ?
			</h1>
			<h3 class="hero-title">
				Let’s get this journey started right…
			</h3>
		</div>
	</div>
</div>
@if(!isset($success))
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>Join our mailing list and be the first to hear about our new destinations &amp; receive special insider deals.</p>
			<hr />
			<form class="form" action="{{route('newsletter-signup')}}" method="post">
				{{ csrf_field() }}
				@if (count($errors) > 0)
				<div class="alert alert-e2s">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="form-group">
					<label for="">Email Address</label>
					<input type="text" class="form-control" name="subscriber_email">
				</div>
				<input class="btn btn-primary-filled" type="submit" value="Sign Up"/>
			</form>
		</div>
	</div>
</div>
@else
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
		 <h2>Thank you!</h2>
		 <p>Check your email for a link to complete the sign up process.</p>
		</div>
	</div>
</div>

@endif

@endsection
