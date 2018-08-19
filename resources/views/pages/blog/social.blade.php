<div class="social-sharing post-sharing">
	<h6>Share This Post</h6>
	<ul class="text-center">
		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(secure_url('/blog/' . $post->slug ))}}">
				<i class="fa fa-facebook-square"></i>
			</a>
		</li>
		<li>
			<a href="https://pinterest.com/pin/create/button/?url={{urlencode(secure_url('/blog/' . $post->slug ))}}&media={{urlencode($post->featured_image)}}&description={{urlencode($post->title)}}">
				<i class="fa fa-pinterest-square"></i>
			</a>
		</li>
		<li>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url={{urlencode(secure_url('/blog/' . $post->slug ))}}&title={{urlencode($post->title)}}&summary={{urlencode($post->summary)}}">
				<i class="fa fa-linkedin-square"></i>
			</a>
		</li>
		<li>
			<a href="https://twitter.com/home?status={{urlencode(secure_url('/blog/' . $post->slug ))}}">
				<i class="fa fa-twitter-square"></i>
			</a>
		</li>
	</ul>
</div>
