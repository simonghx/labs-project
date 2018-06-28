<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				
				<img src="{{Storage::disk('content')->url($logoMain->image)}}" alt="">
				
				<p>{{$subIntro->titre}}</p>
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">
			@foreach($carousels as $carousel)
			<div class="item  hero-item" data-bg="{{Storage::disk('carousel')->url($carousel->image)}}"></div>
			@endforeach
		</div>
	</div>
<!-- Intro Section -->