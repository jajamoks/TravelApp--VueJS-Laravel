<form class="space-top" action="{{route('public.travel-interest', ['interest' => 'Private Travel'])}}" method="POST">
	{{csrf_field()}}
	<div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
		<label>Name</label>
		<input type="text" class="form-control" name="name" value="{{old('name')}}" />
		@if($errors->has('name'))
			<div class="alert alert-danger">
				{{$errors->first('name')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
		<label>Email</label>
		<input type="text" class="form-control" name="email" value="{{old('email')}}" />
		@if($errors->has('email'))
			<div class="alert alert-danger">
				{{$errors->first('email')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('confirm_email') ? 'has-error' : '' }}">
		<label>Confirm Email</label>
		<input type="text" class="form-control" name="confirm_email" value="{{old('confirm_email')}}" />
		@if($errors->has('confirm_email'))
			<div class="alert alert-danger">
				{{$errors->first('confirm_email')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('type_of_travel') ? 'has-error' : '' }}">
		<label>Type of Travel (ex. honeymoon, solo travel, corporate, family)</label>
		<input type="text" class="form-control" name="type_of_travel" value="{{old('type_of_travel')}}" />
		@if($errors->has('type_of_travel'))
			<div class="alert alert-danger">
				{{$errors->first('type_of_travel')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('destinations_of_interest') ? 'has-error' : '' }}">
		<label>Destinations of Interest?</label>
		<textarea  rows="5" class="form-control" name="destinations_of_interest">{{old('destinations_of_interest')}}</textarea>
		@if($errors->has('destinations_of_interest'))
			<div class="alert alert-danger">
				{{$errors->first('destinations_of_interest')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('dates') ? 'has-error' : '' }}">
		<label>Exact Dates or Flexible?</label>
		<input class="form-control" name="dates" value="{{old('dates')}}" />
		@if($errors->has('dates'))
			<div class="alert alert-danger">
				{{$errors->first('dates')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('length_of_stay') ? 'has-error' : '' }}">
		<label>Length of Stay</label>
		<input class="form-control" name="length_of_stay" value="{{old('length_of_stay')}}" />
		@if($errors->has('length_of_stay'))
			<div class="alert alert-danger">
				{{$errors->first('length_of_stay')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('main_objective') ? 'has-error' : '' }}">
		<label>Main Objective of Trip (ex. to visit a new place, wellness, time with my family, relaxation, business travel, learn a new skill, bucket list, etc)</label>
		<textarea  rows="5" class="form-control" name="main_objective">{{old('main_objective')}}</textarea>
		@if($errors->has('main_objective'))
			<div class="alert alert-danger">
				{{$errors->first('main_objective')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('budget') ? 'has-error' : '' }}">
		<label>Do you have a budget in mind?</label>
		<input class="form-control" name="budget" value="{{old('budget')}}" />
		@if($errors->has('budget'))
			<div class="alert alert-danger">
				{{$errors->first('budget')}}
			</div>
		@endif
	</div>
	<div class="form-group {{$errors->has('how_did_your_hear') ? 'has-error' : '' }}">
		<label>How did you hear about us?</label>
		<textarea  rows="5" class="form-control" name="how_did_your_hear">{{old('how_did_your_hear')}}</textarea>
		@if($errors->has('how_did_your_hear'))
			<div class="alert alert-danger">
				{{$errors->first('how_did_your_hear')}}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label>Other Information?</label>
		<textarea  rows="5" class="form-control" name="other_info">{{old('other_info')}}</textarea>
	</div>
	<input type="submit" value="Submit" class="btn btn-primary btn-primary-filled" />
</form>
