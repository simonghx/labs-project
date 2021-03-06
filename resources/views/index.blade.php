@extends('layouts.front')

@section('content')

  @include('partials.index.intro')
  
  @include('partials.index.about')
  
  @include('partials.index.testimonial')
  
  @include('partials.index.services')
  
	@include('partials.index.team')


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>{{$titreReady->titre}}</h2>
					<p>{{$subReady->titre}}</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="{{route('services')}}" class="site-btn btn-2">Browse</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->

  @include('components.contact-form')

@endsection

