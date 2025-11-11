@extends('layouts.app') 

@section('content_page')

<!-- SECTION 1 - My Hero-->
<section
	class="my-hero d-flex align-items-center text-center text-lg-start">
	<div class="container">
		<div class="row justify-content-center align-items-center">

			<div class="col-lg-10 mx-auto text-center">
				<span class="badge bg-light text-danger mb-4 info-37 text-md">37 Years <span>of Expertice</span>
				</span>
				<h1 class="fw-bold text-primary lh-base">
					Compassion &amp; Excellence,<br> Guiding Your Health Journey
				</h1>
			</div>

			<!-- Services Box -->
			<div class="col-lg-12 mx-auto mt-4">
				<div class="card bg-primary text-white rounded-4 shadow">
					<div class="row g-0">

						<div class="col-lg-6">
							<div class="col-lg-12 explore">
								<h2 class="fw-semibold">Explore Our Medical Services</h2>
								<p class="text-light small mt-4">Comprehensive healthcare solutions with cutting-edge technology and expert medical professionals dedicated to your well-being.</p>
								<a href="#" class="text-white fw-semibold mt-4 d-inline-block">
									See All Treatments → </a>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="col-lg-12 service-links">
								<ul class="list-unstyled mb-2">
									<li><a href="#" class="service-link">Bariatric Surgery Turkey <span>→</span></a></li>
									<li><a href="#" class="service-link">Hair Transplant <span>→</span></a></li>
									<li><a href="#" class="service-link">Urology <span>→</span></a></li>
									<li><a href="#" class="service-link">Plastic Surgery <span>→</span></a></li>
									<li><a href="#" class="service-link">Dental Treatment <span>→</span></a></li>
									<li><a href="#" class="service-link">Laser Eye <span>→</span></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- SECTION 2 - Info Cards -->
<section class="pb-5 bg-white">
	<div class="container">
		<div class="row g-4">

			<div class="col-lg-6">
				<div class="card h-100 border-0 shadow-sm d-flex flex-column flex-md-row align-items-center rounded-4">
					<div class="card-body flex-fill">
						<h5 class="fw-semibold mb-3">International Patient Experience</h5>
						<p class="text-muted small">Making every patient’s journey safer, more comfortable, and centered on satisfaction.</p>
						<a href="#" class="fw-semibold text-decoration">More Info</a>
					</div>

					<img src="{{asset('images/image-1.png')}}"
						class="img-fluid rounded-4 card-img-right"
						alt="International patients"
						style="max-width: 50%; object-fit: cover;">
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card h-100 border-0 shadow-sm d-flex flex-column flex-md-row align-items-center rounded-4">
					<div class="card-body flex-fill">
						<h5 class="fw-semibold mb-3">Expert Second Opinion</h5>
						<p class="text-muted small">Gain clarity and confidence with an expert second opinion tailored to your needs.</p>
						<a href="#" class="fw-semibold text-decoration">More Info</a>
					</div>
					<img src="{{asset('images/image-2.png')}}"
						class="img-fluid rounded-4 card-img-right" 
						alt="Expert opinion"
						style="max-width: 50%; object-fit: cover;">
				</div>
			</div>

		</div>
	</div>
</section>

<!-- SECTION 3 - Consultation -->
<section class="consultation text-white">
	<div class="container">
		<div class="row align-items-center">

			<div class="col-lg-6 info">
				<h2 class="fw-bold mb-4">Transforming Lives Through Medical Excellence</h2>
				<p class="text-light small mb-0">Erdem Hospital offers high-quality
					treatments tailored to your needs, combining advanced medical
					technology with expert healthcare professionals to ensure
					personalized care and excellent results.</p>
			</div>

			<div class="col-lg-5 offset-lg-1">
				<div class="card p-4 rounded-4 schedule">
					<h3 class="fw-bold text-primary">Schedule Free Consultation</h3>

					<form id="demo-form2" class="mt-3" action="{{ $form_action }}"
						method="POST">

						<div class="hidden">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						</div>

						<div class="hidden">
							<input type="hidden" name="_method" value="{{ $form_method }}">
						</div>

						<div class="mb-3" id="group_name">
							<label class="form-label small" for="name">Your name</label> <input
								type="text" id="name" name="name" class="form-control">
						</div>

						<div class="mb-3" id="group_email">
							<label class="form-label small" for="email">Email address</label>
							<input type="email" id="email" name="email" class="form-control">
						</div>

						<div class="mb-3" id="group_phone">
							<label class="form-label small" for="phone">Phone number</label>
							<input type="tel" id="phone" name="phone" class="form-control">
						</div>

						<div class="form-check small mb-3">
							<input class="form-check-input" type="checkbox" id="terms"> 
							<label class="form-check-label small" for="terms"> I agree to the 
								<a href="#" class="text-decoration-none">Terms & Conditions</a> and
								<a href="#" class="text-decoration-none">Privacy Policy</a>.
							</label>
						</div>

						<div class="form-check small mb-3">
							<input class="form-check-input" type="checkbox" checked="checked" id="consent"> 
							<label class="form-check-label small" for="terms">I consent to the of my personel information for consulation purposes only. </label>
						</div>

						<div id="alert"></div>

						<button type="submit" id="submit" name="submit"
							class="btn btn-sm btn-danger">GET FREE CONSULTATION</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection 

@section('footer_page')

<!-- Ajax Form -->
<script src="{{asset('assets/js/consulation.js')}}"></script>

@endsection
