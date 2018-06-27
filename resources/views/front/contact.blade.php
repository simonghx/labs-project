@extends('layouts.front')

@section('content')
  

	
	<!-- Page header -->
	@component('components.page-header')
		@slot('nom')
			Contact
		@endslot
		
	
	@endcomponent
	<!-- Page header end-->

  <!-- Google map -->
	<div class="map" id="map-area"></div>

	@include('components.contact-form')
	
@endsection