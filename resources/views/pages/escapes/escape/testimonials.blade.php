<section id="testimonials">
	<h3>Testimonials</h3>
	@foreach ($escape->escape_type->testimonials as $testimonial)
		<div class="testimonial">
			<div class="text">
				{!! $testimonial->content !!}
			</div>
			<div class="author">
				<span class="name">
					-{{ $testimonial->name }}
				</span>
				<span class="date">
					{{ $testimonial->date->format('F Y') }}
				</span>
			</div>
		</div>
	@endforeach
</section>
