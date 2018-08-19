<style>
	.summary-content img{height:auto;}
</style>
<section class="summary-section">
	@if(isset($escape->escape_type->wellness_summary))
	<div class="row space-bottom">
		<div class="col-md-12">
			<div class="summary-label">
				<div class="summary-icon">
					<i class="fa fa-heart"></i>
				</div>
				<span>Wellness</span>
			</div>
			<div class="summary-content">
				{!! $escape->escape_type->wellness_summary !!}
			</div>
		</div>
	</div>
	@endif
	@if(isset($escape->escape_type->nutrition_summary))
	<div class="row space-bottom">
		<div class="col-md-12">
			<div class="summary-label">
					<div class="summary-icon">
						<i class="fa fa-cutlery"></i>
					</div>
					<span>Nourishment</span>
				</div>
				<div class="summary-content">
					{!! $escape->escape_type->nutrition_summary !!}
				</div>
		</div>
	</div>
	@endif
	@if(isset($escape->escape_type->home_summary))
	<div class="row space-bottom">
		<div class="col-md-12">
			<div class="summary-label">
				<div class="summary-icon">
				<i class="fa fa-home"></i>
			</div>
			<span>Home</span>
			</div>
			<div class="summary-content">
				{!! $escape->escape_type->home_summary !!}
			</div>
		</div>
	</div>
	@endif
		@if(isset($escape->escape_type->give_back_summary))
	<div class="row space-bottom">
		<div class="col-md-12">
			<div class="summary-label">
				<div class="summary-icon">
				<i class="fa fa-handshake-o"></i>
			</div>
			<span>Give Back</span>
			</div>
			<div class="summary-content">
				{!! $escape->escape_type->give_back_summary !!}
			</div>
		</div>
	</div>
	@endif
	@if(isset($escape->escape_type->unique_summary))
	<div class="row space-bottom">
		<div class="col-md-12">
			<div class="summary-label">
				<div class="summary-icon">
					<i class="fa fa-star"></i>
				</div>
				<span>Unique</span>
				</div>
				<div class="summary-content">
					{!! $escape->escape_type->unique_summary !!}
				</div>
		</div>
	</div>
	@endif
	@if($escape->brochure)
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="{{$escape->brochure->fullSize}}" class="btn btn-primary btn-xx-large" download>
				Download Brochure
			</a>
		</div>
	</div>
	@endif
	<hr />
</section>
