@extends('layouts.front')

@section('content')
  

	
	<!-- Page header -->
	@component('components.page-header')
		@slot('nom')
			Blog
		@endslot
		
		@slot('lien')
			Home
		@endslot

		@slot('url')
			#
		@endslot
	@endcomponent
	<!-- Page header end-->

	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
      <div class="row">

        @include('partials.blog.articles')

				@include('components.sidebar')
				
			</div>
		</div>
	</div>
	<!-- page section end-->
	
	@include('components.newsletter')
	
@endsection