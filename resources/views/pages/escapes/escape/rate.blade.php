<section id="rate" class="row">
	<div class="col-md-12">
	<h3>Rate</h3>
	<div class="rate">
		<span class="rate-label">
			Private Room:
		</span>
		<span class="rate-value">${{$escape->display_single_rate}}</span>
	</div>
	<div class="rate">
		<span class="rate-label">
			Shared Room:
		</span>
		<span class="rate-value">${{$escape->display_shared_rate}}</span>
	</div>
	<div class="">
		<p class="deposit-value"></p>
	</div>
	<p>${{$escape->display_deposit}} non-refundable deposit per person. Please refer to the <a href="{{route('public.policies')}}">policies</a> page of our website for our complete cancellation policy.</p>
	@if($escape->escape_type->insurance_required)
		<div class="space-bottom">
			<strong>Travel insurance is required for this escape</strong>
		</div>
		@include('partials.insurance')
	@endif
	<hr />
	</div>
</section>
