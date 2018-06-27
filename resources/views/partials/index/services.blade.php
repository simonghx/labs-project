<!-- Services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>Get in <span>the Lab</span> and see the services</h2>
			</div>
			<div class="row">
				<!-- single service -->
				@foreach($servShuffled as $serv)
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$serv->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$serv->name}}</h2>
							<p>{{$serv->content}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
			<div class="text-center">
				<a href="{{route('services')}}" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end --><!-- Services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>Get in <span>the Lab</span> and see the services</h2>
			</div>
			<div class="row">
				<!-- single service -->
				@foreach($servShuffled as $serv)
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$serv->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$serv->name}}</h2>
							<p>{{$serv->content}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
			<div class="text-center">
				<a href="{{route('services')}}" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->