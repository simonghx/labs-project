<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					<!-- single card -->
				@foreach($services as $service)
				<div class="col-md-4 col-sm-6">
					<div class="lab-card">
						<div class="icon">
							<i class="{{$service->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$service->name}}</h2>
							<p>{{$service->content}}</p>
						</div>
					</div>
				</div>
				@endforeach
					
				</div>
			</div>
		</div>
    <!-- card section end-->
    
    <!-- About contant -->
		<div class="about-contant">
			<div class="container">
				<div class="section-title">
					<h2>{{$titreAbout->titre}}</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>{{$texteAbout1->texte}}</p>
					</div>
					<div class="col-md-6">
						<p>{{$texteAbout2->texte}}</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="{{route('blog')}}" class="site-btn">Browse</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{Storage::disk('content')->url($imageYoutube->image)}}" alt="">
							<a href="{{$lienYoutube->titre}}" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->