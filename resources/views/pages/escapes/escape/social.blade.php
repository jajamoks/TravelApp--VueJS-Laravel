<div class="social-sharing">
	<h6>Share This Escape</h6>
	<ul class="text-center">
		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current())}}">
				<i class="fa fa-facebook-square"></i>
			</a>
		</li>
		<li>
			<a href="https://pinterest.com/pin/create/button/?url={{urlencode(url()->current())}}/&media={{urlencode($escape->escape_type->featured_image->fullSize)}}&description={{urlencode($escape->escape_type->name)}}">
				<i class="fa fa-pinterest-square"></i>
			</a>
		</li>
		<li>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url={{urlencode(url()->current())}}&title={{urlencode($escape->escape_type->name)}}&summary={{urlencode($escape->escape_type->location)}}%20{{urlencode($escape->display_date)}}">
				<i class="fa fa-linkedin-square"></i>
			</a>
		</li>
		<li>
			<a href="https://twitter.com/home?status={{urlencode(url()->current())}}">
				<i class="fa fa-twitter-square"></i>
			</a>
		</li>
	</ul>
</div>
