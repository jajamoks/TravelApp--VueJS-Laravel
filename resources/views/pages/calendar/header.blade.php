<div class="e2s-calendar-header space-bottom">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-2 text-center space-bottom">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="search-by location-filter">
							<span class="e2s-select-wrap">
								<select class="form-control">
									<option disabled selected hidden>CHOOSE DESTINATION</option>
									<option value="all">All Destinations</option>
									@foreach($options_destination as $option)
										<option value="{{$option['value']}}">{{$option['label']}}</option>
									@endforeach
								</select>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 space-bottom">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<span class="e2s-select-wrap text-center">
							<select class="form-control">
								<option disabled selected hidden>CHOOSE DATE</option>
								<option value="all">All Dates</option>
								@foreach($options_date as $option)
									<option value="{{$option['value']}}">{{$option['label']}}</option>
								@endforeach
							</select>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
