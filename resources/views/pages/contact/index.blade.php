@extends('layouts.public')

@section('content')
<div class="page-hero" style="background-image:url(https://res.cloudinary.com/escapetoshape/image/upload/v1505973078/bigstock-Traveler-businesswoman-at-airp-183257428_zbhav5.jpg); background-position: 50% 55%;">
	<div class="text-center hero-overlay">
		<div>
			<h1 class="hero-title">
				Contact
			</h1>
		</div>
	</div>
</div>
<div id="page-content" class="container">
    <div class="row contact-area">
        <div class="col-md-7 contact-form-area space-bottom">
            <div id="contact-form">
                <form id="contactForm" method="post" action="{{route('contact-submit',
										['interest' => isset($interest) ? $interest : 'General Contact Form']
									)}}">
									{{csrf_field()}}
									@if (count($errors) > 0)
									<div class="alert alert-e2s">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="FULL NAME" name="name" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" required value="{{old('email')}}">
                    </div>
										<div class="form-group">
                        <input type="email" class="form-control" id="confirm_email" placeholder="CONFIRM EMAIL" name="confirm_email" required value="{{old('confirm_email')}}">
                    </div>
										<div class="form-group">
                        <input type="text" class="form-control" id="zip" placeholder="ZIP CODE" name="zip" required value="{{old('zip')}}">
                    </div>
                    <div class="form-group">
                        <textarea id="message" class="form-control" rows="5" placeholder="MESSAGE" required name="message" >{{old('message')}}</textarea>
                    </div>
										<div class="form-group">
                        <textarea id="source" class="form-control" rows="5" placeholder="HOW DID YOU HEAR ABOUT US?" name="source" >{{old('source')}}</textarea>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-md btn-primary-filled">SUBMIT</button>
                </form>
            </div>
        </div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 text-center space-bottom">
								<h5 class="">General Inquires &amp; Reservations</h5>
								<p>Email: info@escapetoshape.com</p>
								<p>Phone: 888-882-0448</p>
						</div>
					</div>
					<div class="col-md-12 text-center space-bottom">
							<h5>Press &amp; Marketing</h5>
							<p>Email: erica@escapetoshape.com</p>
							<p>Erica Gragg</p>
					</div>

					<div class="col-md-12 text-center space-bottom">
							<h5>Billing &amp; Accounting</h5>
							<p>Email: brandon@escapetoshape.com</p>
							<p>Brandon Gragg</p>
					</div>
			</div>
	</div>
</div>

@endsection
