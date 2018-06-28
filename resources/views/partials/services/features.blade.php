<!-- features section -->
	<div class="team-section spad" id="features-iphone">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{{$titreProjet->titre}}</h2>
			</div>
			<div class="row">
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach($projets1 as $projet)
					<div class="icon-box light left">
						<div class="service-text">
							<h2>{{$projet->titre}}</h2>
							<p>{{$projet->desc}}</p>
						</div>
						<div class="icon">
							<i class="{{$projet->icon}}"></i>
						</div>
					</div>
					@endforeach
					
				</div>
				<!-- Devices -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="text-center">
						<img src="{{asset('theme/img/device.png')}}" alt="">
					</div>
				</div>
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach($projets2 as $projet)
					<div class="icon-box light">
						<div class="icon">
							<i class="{{$projet->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$projet->titre}}</h2>
							<p>{{$projet->desc}}</p>
						</div>
					</div>
					@endforeach
				</div>
					
			</div>
			<div class="text-center mt100">
				<a href="#projet-last" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- features section end-->