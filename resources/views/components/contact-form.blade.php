<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>Contact us</h2>
					</div>
					<p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. </p>
					<h3 class="mt60">Main Office</h3>
					<p class="con-item">C/ Libertad, 34 <br> 05200 Arévalo </p>
					<p class="con-item">0034 37483 2445 322</p>
					<p class="con-item">hello@company.com</p>
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

