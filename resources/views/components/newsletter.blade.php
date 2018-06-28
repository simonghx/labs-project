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

						@if($errors->has('letter_email'))
						<div class="text-danger">{{$errors->first('letter_email')}}</div>
						@endif
						<input class="{{$errors->has('letter_email')?'border-danger':''}}" name="letter_email" type="text" placeholder="Your e-mail here" value="{{old('letter_email')}}">
						<button type="submit" class="site-btn btn-2">Newsletter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->