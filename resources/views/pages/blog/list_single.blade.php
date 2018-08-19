<div class="blog block post-content-area">
		<div class="row">
				<div class="col-md-10 col-md-offset-1">
						<div class="img-container">
							<img class="img-responsive img-cover post-list-image" src="{{ $post->featured_image }}" alt="{{ $post->title }}" />
						</div>
				</div>
		</div>
		<div class="post-info-box">
				<h3>{{ $post->title }}</h3>
				<p class="post-meta">Posted by <a href="#">{{ $post->user->name }}</a> on {{ $post->display_date }}</p>
				<p>{{ $post->excerpt }}</p>
				<div class="blog-post-footer">
						<a href="/blog/{{ $post->slug }}" class="btn btn-primary-filled"><span>Read More</span><i class="fa fa-chevron-right"></i></a>
				</div>
		</div>
</div>
