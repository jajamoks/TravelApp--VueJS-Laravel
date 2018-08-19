<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{route('public.home')}}"><img src="/images/logo.jpg" alt="logo"></a>
		</div>
		<div class="navbar-collapse collapse">
			<div class="sign-in">
				@if(Auth::check())
				<div class="left">
					<a href="/login">
						<span>Account</span>
					</a>
				</div>
				<div class="right">
					<a href="/logout">
						<span>Logout</span>
					</a>
				</div>
				@else
				<div class="left">
					<a href="/reservations">
						<span>Reservations</span>
					</a>
				</div>
				<div class="right">
					<a href="/login">
						<i class="fa fa-suitcase"></i>
						<span>Sign In</span>
					</a>
				</div>
				@endif
			</div>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="{{route('public.escapes')}}">
						<span>Escapes</span>
					</a>
				</li>
				</li>
				<li>
					<a href="{{route('public.travel-advisors')}}">
						<span>Travel Advisors</span>
					</a>
				</li>
				<li>
					<a href="{{route('public.calendar')}}">
						<span>Calendar</span>
					</a>
				</li>
				<li>
					<a href="{{route('public.shop')}}">
						<span>Shop</span>
					</a>
				</li>
				<li>
					<a href="{{route('public.contact')}}">
						<span>Contact</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
