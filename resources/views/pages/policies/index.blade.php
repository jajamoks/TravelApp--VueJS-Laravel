@extends('layouts.public')
@section('content')
	<div class="container main-content">
		<div class="row">
			<div class="col-md-12">
				<h1>Our Policies</h1>
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-md-12">
				@include('pages.policies.reservations')
				@include('partials.insurance')
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-md-12">
				@include('pages.policies.force-majeure')
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-md-12">
				@include('pages.policies.privacy')
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-md-12">
				@include('pages.policies.terms')
			</div>
		</div>
			<div class="row margin-top">
			<div class="col-md-12">
				@include('pages.policies.cookies')
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-md-12">
				<h3>Contacting Us</h3>
				<p>If there are any questions regarding this privacy policy you may contact us using the information below.</p>
				<p>escapetoshape.com</p>
				<p>1148 Beverly Garden Drive </p>
				<p>Metairie, LA 70005 USA</p>
				<p>info@escapetoshape.com</p>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
@section('sidemenu')
@include('partials.sidemenu')
@endsection
