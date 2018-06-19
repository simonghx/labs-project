@extends('layouts.front')

@section('content')
  

	
	<!-- Page header -->
	@component('components.page-header')
		@slot('nom')
			Contact
		@endslot
		
		@slot('lien')
			Home
		@endslot

		@slot('url')
			#
		@endslot
	@endcomponent
	<!-- Page header end-->


	@include('components.contact-form')
	
@endsection