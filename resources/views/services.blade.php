@extends('layouts.front')

@section('content')
  

	
	<!-- Page header -->
	@component('components.page-header')
		@slot('nom')
			Services
		@endslot
		
		@slot('lien')
			Home
		@endslot

		@slot('url')
			#
		@endslot
	@endcomponent
	<!-- Page header end-->

	@include('partials.index.services')

	@include('partials.services.features')

	@include('partials.services.projects')
	
	@include('components.newsletter')

	@include('components.contact-form')
	
@endsection