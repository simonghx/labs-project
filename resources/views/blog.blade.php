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

				<div class="col-md-4 col-sm-5 sidebar">
          
          @include('partials.blog.filtres')
          
					@include('partials.blog.quote')
					{{-- <!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Add</h2>
						<div class="add">
							<a href=""><img src="img/add.jpg" alt=""></a>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->
	
	@include('components.newsletter')
	
@endsection