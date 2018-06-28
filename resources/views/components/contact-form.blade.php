<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>{{$contactTitre->titre}}</h2>
					</div>
					<p>{{$contactTexte->texte}}</p>
					<h3 class="mt60">{{$contactSub->titre}}</h3>
					<p class="con-item">{{$contactAdresse->titre}}<br> {{$contactPostal->titre}} </p>
					<p class="con-item">{{$contactPhone->titre}}</p>
					<p class="con-item">{{$contactMail->titre}}</p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form class="form-class" id="con_form" method="POST" action="{{route('backHome')}}">
						@csrf

						<div class="row">
							<div class="col-sm-12 text-center mb-3">
									<h5 class="successMessage d-none">
											<i class="fa fa-check d-block left text-success"></i>Your message has been sent successfully.
									</h5>
									<h5 class="errorMessage text-danger d-none">
											<i class="fa fa-exclamation-circle left"></i>There was a problem validating the form please check!
									</h5>
							</div>
							<div class="col-sm-6">
								<input id="form-name" class="{{$errors->has('name')?'border-danger':''}}" type="text" name="name" placeholder="Your name" value="{{old('name')}}">
							</div>
							<div class="col-sm-6">
								<input id="form-email" class="{{$errors->has('email')?'border-danger':''}}"  type="text" name="email" placeholder="Your email" value="{{old('email')}}">
							</div>
							<div class="col-sm-12">
								<input id="form-subject" type="text" name="subject" placeholder="Subject" class="{{$errors->has('subject')?'border-danger':''}}"  value="{{old('subject')}}">
								<textarea name="message" placeholder="Message">{{old('message')}}</textarea>
								<button id="btn-contact-submit" type="submit" class="site-btn">send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->

