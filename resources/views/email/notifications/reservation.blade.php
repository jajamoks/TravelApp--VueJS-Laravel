@extends('email.layout')
@section('body')
@include('email.partials.reservation-info')
@include('email.partials.reservation-item')
@include('email.partials.statement')
@endsection
