<!-- services card section-->
	<div class="services-card-section spad" id="projet-last">
		<div class="container">
			<div class="row">
				<!-- Single Card -->
				@foreach($lastProjets as $projet)
				<div class="col-md-4 col-sm-6">
					<div class="sv-card" >
						<div class="card-img">
							<img src="{{Storage::disk('projetsThumbs')->url($projet->image)}}" alt="">
						</div>
						<div class="card-text" style="height: 287px;">
							<h2>{{$projet->titre}}</h2>
							<p>{{$projet->content}}</p>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
	<!-- services card section end-->