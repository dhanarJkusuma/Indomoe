@extends('Weabo.template.weabo_template')

@section('content')
	<div class="moe-error">
		<h2>404 NOT FOUND</h2>
		<img src="{{ URL::asset('assets/img/not_found.gif') }}" alt="">
	</div>
@stop