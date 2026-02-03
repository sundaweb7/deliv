@extends('layouts.app')

@push('styles')
	<!-- begin::GXON Required Stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/libs/flaticon/css/all/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/lucide/lucide.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/simplebar/simplebar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/node-waves/waves.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">
	<!-- end::GXON Required Stylesheet -->

	<!-- begin::GXON CSS Stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head d-flex align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">FAQ</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">FAQ</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 mb-5">
		<div class="card p-sm-4 border-0 bg-light" style="background-image: url({{ asset('assets/images/background/faq.png') }}); background-position: center; background-size: cover;">
			<div class="card-body p-md-5">
				<h4 class="text-center text-white mb-2">Have a question? We’re ready to help?</h4>
				<p class="text-center text-white mb-4">Or choose a section to find what you need in seconds.</p>
				<form class="d-flex align-items-center w-lg-500px mx-auto position-relative" action="#">
					@csrf
					<button type="button" class="btn btn-sm border-0 position-absolute start-0 ms-3 p-0">
					<i class="fi fi-rr-search"></i>
					</button>
					<input type="text" class="form-control ps-5" placeholder="Search articles...">
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="row">
			<div class="col-md-12 mb-4">
				<h6 class="mb-3">General Questions</h6>
				<div class="accordion" id="accordionCustomPrimary">
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseOne" aria-expanded="false" aria-controls="CustomPrimary-collapseOne">What is your return policy?</button>
						</h2>
						<div id="CustomPrimary-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary">
							<div class="accordion-body">
								We offer a 30-day return policy on all items. Please contact our support for processing your return easily.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseTwo" aria-expanded="false" aria-controls="CustomPrimary-collapseTwo">How long does shipping take?</button>
						</h2>
						<div id="CustomPrimary-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary">
							<div class="accordion-body">
								Shipping typically takes 5-7 business days, depending on your location and the shipping option chosen.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseThree" aria-expanded="false" aria-controls="CustomPrimary-collapseThree">Do you offer customer support?</button>
						</h2>
						<div id="CustomPrimary-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary">
							<div class="accordion-body">
								Yes, we offer 24/7 customer support via email and live chat to assist you with any queries you may have.
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mb-4">
				<h6 class="mb-3">Manage Account</h6>
				<div class="accordion" id="accordionCustomPrimary2">
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseOne2" aria-expanded="false" aria-controls="CustomPrimary-collapseOne2">How do I update my account information?</button>
						</h2>
						<div id="CustomPrimary-collapseOne2" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary2">
							<div class="accordion-body">
								Go to your account settings, click ‘Edit Profile’, and update your name, email, or contact details. Don’t forget to save your changes.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseTwo2" aria-expanded="false" aria-controls="CustomPrimary-collapseTwo2">How can I change my password?</button>
						</h2>
						<div id="CustomPrimary-collapseTwo2" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary2">
							<div class="accordion-body">
								Navigate to Account Settings > Security > Change Password. Enter your current password, then your new password, and confirm.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseThree2" aria-expanded="false" aria-controls="CustomPrimary-collapseThree2">How do I delete my account?</button>
						</h2>
						<div id="CustomPrimary-collapseThree2" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary2">
							<div class="accordion-body">
								We’re sorry to see you go! Please contact our support team or go to Account Settings > Delete Account and follow the on-screen instructions.
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 mb-4">
				<h6 class="mb-3">Privacy & Security</h6>
				<div class="accordion" id="accordionCustomPrimary3">
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseOne3" aria-expanded="false" aria-controls="CustomPrimary-collapseOne3">How is my personal data protected?</button>
						</h2>
						<div id="CustomPrimary-collapseOne3" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary3">
							<div class="accordion-body">
								We use industry-standard encryption and secure servers to protect your data. We do not share your information without your consent.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseTwo3" aria-expanded="false" aria-controls="CustomPrimary-collapseTwo3">Can I control who sees my information?</button>
						</h2>
						<div id="CustomPrimary-collapseTwo3" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary3">
							<div class="accordion-body">
								Yes, you can manage your privacy settings under Account Settings > Privacy to control what information is visible to others.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseThree3" aria-expanded="false" aria-controls="CustomPrimary-collapseThree3">How can I delete my data?</button>
						</h2>
						<div id="CustomPrimary-collapseThree3" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary3">
							<div class="accordion-body">
								You can request data deletion by contacting our support team or using the Delete Account option in your account settings.
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card bg-warning bg-opacity-10 shadow-none border-0">
					<div class="card-body px-4 pb-0 pt-2">
						<div class="row g-0">
							<div class="col-md-8 py-3 px-2">
								<h6 class="card-title fw-bold mb-5">You still have a question?</h6>
								<div class="row">
									<div class="col-sm-5 border-end border-dark border-opacity-10">
										<div class="avatar avatar-sm bg-success shadow-sharp-success rounded-circle text-white mb-3 ms-2">
											<i class="fi fi-rr-phone-call"></i>
										</div>
										<h5 class="mb-1">
										<a class="text-dark" href="tel:+(01)1234567890">+(01) 123 456 7890</a>
										</h5>
										<p class="mb-0">Always here, ready to help</p>
									</div>
									<div class="col-sm-7 pt-4 pt-sm-0">
										<div class="avatar avatar-sm bg-info shadow-sharp-info rounded-circle text-white mb-3 ms-2">
											<i class="fi fi-rr-envelope"></i>
										</div>
										<h5 class="mb-1">
										<a class="text-dark" href="mailto:support@gmail.com">support@gmail.com</a>
										</h5>
										<p class="mb-0">Looking for a quick answer? Let’s connect</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-end d-none d-md-block">
								<img src="{{ asset('assets/images/media/svg/media2.svg') }}" class="img-fluid" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title mb-0">Have More Questions?</h6>
						<p class="mb-0">Send us your question, and we will get back to you shortly.</p>
					</div>
					<div class="card-body">
						<form>
							@csrf
							<div class="row">
								<div class="col-sm-6 mb-3">
									<label for="userName" class="form-label">Name</label>
									<input type="text" class="form-control" id="userName" placeholder="Enter your name" required>
								</div>
								<div class="col-sm-6 mb-3">
									<label for="userEmail" class="form-label">Email</label>
									<input type="email" class="form-control" id="userEmail" placeholder="Enter your email" required>
								</div>
								<div class="col-sm-12 mb-3">
									<label for="userSubject" class="form-label">Subject</label>
									<input type="text" class="form-control" id="userSubject" placeholder="Enter your subject" required>
								</div>
								<div class="col-sm-12 mb-3">
									<label for="userQuestion" class="form-label">Your Question</label>
									<textarea class="form-control" id="userQuestion" rows="4" placeholder="Type your question here..." required></textarea>
								</div>
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary waves-effect waves-light w-100">Submit Question</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card card-action action-elevate bg-primary-subtle border-0 shadow-none text-center">
					<div class="card-body p-5">
						<div class="avatar-group justify-content-center mb-3">
							<div class="avatar avatar-sm rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-sm rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-sm rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-sm rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
							</div>
						</div>
						<h4>Need more help?</h4>
						<p class="mb-4">Can’t find your answer here? Chat with our support team anytime.</p>
						<a href="{{ route('chat') }}" class="btn btn-primary waves-effect waves-light w-100">
							Chat with us
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection