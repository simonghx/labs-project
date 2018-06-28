<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
					<form class="nl-form" action="{{route('backMain')}}" method="POST">
						@csrf
						
						<input name="email" type="text" placeholder="Your e-mail here" value="{{old('email')}}">
						<button type="submit" class="site-btn btn-2">Newsletter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->