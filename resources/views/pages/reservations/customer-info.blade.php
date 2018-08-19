
	<div class="row">
		<div class="col-md-6">
			<div class="form-group
			{{$errors->has('first_name') ? 'has-error' : '' }}">
				<label for="first_name">First Name</label>
				<input class="form-control" type="text" name="first_name" value="{{old('first_name')}}" required/>
				@if($errors->has('first_name'))
					<span class="help-block">{{$errors->first('first_name')}}</span>
				@endif
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group
			{{$errors->has('last_name') ? 'has-error' : '' }}">
				<label for="last_name">Last Name</label>
				<input class="form-control" type="text" name="last_name" value="{{old('last_name')}}" required/>
				@if($errors->has('last_name'))
					<span class="help-block">{{$errors->first('last_name')}}</span>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group
			{{$errors->has('address') ? 'has-error' : '' }}">
				<label for="address">Address</label>
				<input class="form-control" type="text" name="address" value="{{old('address')}}" required/>
				@if($errors->has('address'))
					<span id="" class="help-block">{{$errors->first('address')}}</span>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6 {{$errors->has('city') ? 'has-error' : '' }}">
			<label for="city">City</label>
			<input class="form-control" type="text" name="city" value="{{old('city')}}" required/>
			@if($errors->has('city'))
				<span id="" class="help-block">{{$errors->first('city')}}</span>
			@endif
		</div>
		<div class="form-group col-md-3 {{$errors->has('state') ? 'has-error' : '' }}">
			<label for="state">State</label>
			<input class="form-control" type="text" name="state" value="{{old('state')}}" required />
			@if($errors->has('state'))
				<span id="" class="help-block">{{$errors->first('state')}}</span>
			@endif
		</div>
		<div class="form-group col-md-3
		{{$errors->has('zip') ? 'has-error' : '' }}">
			<label for="state">Zip/Post Code</label>
			<input class="form-control" type="text" name="zip" value="{{old('zip')}}" required/>
			@if($errors->has('state'))
				<span id="" class="help-block">{{$errors->first('zip')}}</span>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6
		{{$errors->has('country') ? 'has-error' : '' }}">
			<label for="country">Country</label>
			<input class="form-control" type="text" name="country" value="{{old('country')}}" required/>
			@if($errors->has('country'))
				<span id="" class="help-block">{{$errors->first('country')}}</span>
			@endif
		</div>
		@if($cart->askForRoomateName())
			<div class="form-group col-md-6">
				<label for="email" class="space-bottom">Gender</label>
				<div>
						<label class="radio-inline">
							<input type="radio" name="gender" id="female" value="female">
							Female
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" id="female" value="male">
							Male
						</label>
						@if($errors->has('gender'))
							<div class="alert alert-danger space-top">
								{{$errors->first('gender')}}
							</div>
						@endif
			</div>
		</div>
	@endif
	</div>
	@if(!Auth::check())
	<div class="row">
		<div class="col-xs-12">
			<label>Create / Use Existing Account</label>
			<hr />
		</div>
		<div class="form-group col-md-6
		{{$errors->has('email') ? 'has-error' : '' }}">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" value="{{old('email')}}" required/>
			@if($errors->has('email'))
				<span id="" class="help-block">{{$errors->first('email')}}</span>
			@endif
		</div>
		<div class="form-group col-md-6
		{{$errors->has('password') ? 'has-error' : '' }}">
			<label for="email">Password</label>
			<input class="form-control" type="password" name="password" value="{{old('password')}}" required/>
			@if($errors->has('password'))
				<span id="" class="help-block">{{$errors->first('password')}}</span>
			@endif
		</div>
		@if(isset($auth_error))
			<div class="col-md-12">
				<div class="alert alert-danger">
					{{$auth_error}}
				</div>
			</div>
		@endif
	</div>
	@endif
	@if($cart->askForAdditionalGuestName())
		<div class="row">
			<div class="form-group col-md-8">
				<label for="email">Additional Guest Name</label>
				<input class="form-control" type="text" name="additional_guest_name" value="{{old('additional_guest_name')}}" required />
			</div>
		</div>
	@endif
	@if($cart->askForRoomateName())
		<div class="row">
			<div class="form-group col-md-8">
				<label for="email">Roomate Name</label>
				<input class="form-control" type="text" name="roomate_name" value="{{old('roomate_name')}}" />
				<div class="help-text">
					If you have a friend that you would like to share a room with but  they are registering separately, please enter their name here.
				</div>
			</div>
		</div>
	@endif
