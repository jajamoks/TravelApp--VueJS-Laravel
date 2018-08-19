<div id="e2s-newsletter-popup" class="animated fadeInUp">
	<div class="e2s-newsletter-popup-header">
		<i class="fa fa-remove pull-right"></i>
		<h3>Sign Up For Our Newsletter</h3>
		<p>Join our mailing list and be the first to hear about our new destinations &amp; receive special insider deals.</p>
		<div class="sign-up-container">
		<form action="{{route('public.newsletter')}}" method="post">
			{{csrf_field()}}
			<div class="input-wrap">
				<input type="email" name="subscriber_email" placeholder="Enter your email...">
				<input class="" type="submit" id="searchSubmit" name="submit" value="Sign Up">
			</div>
	</form>
	</div>
	</div>
</div>
