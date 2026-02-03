@extends('layouts.guest')

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
	<script src="{{ asset('assets/js/coming-soon.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="coming-cover-wrapper">
	<div class="row g-0">
		<div class="col-lg-6">
			<div class="coming-wrapper">
				<div class="maintenance-wrapper mb-5">
					<div class="mb-4">
						<a href="{{ route('index') }}" aria-label="GXON logo">
							<img class="visible-light" src="{{ asset('assets/images/logo-full.svg') }}" alt="GXON logo">
							<img class="visible-dark" src="{{ asset('assets/images/logo-full-white.svg') }}" alt="GXON logo">
						</a>
					</div>
					<div class="maintenance-status mb-2">Coming Soon</div>
					<h2 class="maintenance-heading text-primary mb-3">We’re Launching Soon. Thank You for Your Patience.</h2>
					<p class="maintenance-text mb-4 maxw-md-550px">Our website is coming soon, but we are ready to go! Special surprise for our subscribers only.</p>
					<form class="d-flex align-items-center maxw-md-450px position-relative" action="#">
						@csrf
						<i class="fi fi-rr-envelope position-absolute start-0 ms-4"></i>
						<input type="text" class="form-control form-control-lg rounded-5 ps-7" placeholder="Email Address">
						<button type="button" class="btn btn-primary rounded-pill position-absolute end-0 waves-effect waves-light me-1">
						Subscribe
						</button>
					</form>
				</div>
				<div id="countdown" class="countdown">
					<div class="count-item">
						<span class="time" id="days">00</span>
						<span class="text">Days</span>
					</div>
					<div class="count-item">
						<span class="time" id="hours">00</span>
						<span class="text">Hours</span>
					</div>
					<div class="count-item">
						<span class="time" id="minutes">00</span>
						<span class="text">Minutes</span>
					</div>
					<div class="count-item">
						<span class="time" id="seconds">00</span>
						<span class="text">Seconds</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="coming-cover" style="background-image: url({{ asset('assets/images/background/coming-soon.png') }});"></div>
		</div>
	</div>
</div>
@endsection