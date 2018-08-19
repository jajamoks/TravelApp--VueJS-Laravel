<div class="e2s-newsletter">
	<div class="title-container">
		<h3 class="italic">Sign up for our newsletter</h3>
	</div>
	<div class="sign-up-container">
		<form action="{{route('newsletter-signup')}}" method="post">
			{{csrf_field()}}
			<div class="input-wrap">
				<input type="email" class="" name="subscriber_email" placeholder="Enter your email..."/>
				<input class="" type="submit" id="searchSubmit" name="submit" value="Sign Up">
			</div>
	</form>
	</div>
</div>
