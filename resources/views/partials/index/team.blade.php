<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and  meet the team</h2>
			</div>
			<div class="row">
				<!-- single member -->
				@foreach($teams as $team)
				<div class="col-sm-4">
					<div class="member">
						<img src="{{Storage::disk('editeursThumbs')->url($team->image)}}" alt="">
						<h2>{{$team->name}}</h2>
						<h3>{{$team->poste}}</h3>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
	<!-- Team Section end-->