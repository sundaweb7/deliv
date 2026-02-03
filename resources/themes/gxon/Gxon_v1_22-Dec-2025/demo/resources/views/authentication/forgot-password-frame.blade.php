@extends('layouts.auth')

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
<div class="auth-frame-wrapper">
	<div class="row g-0 h-100">
		<div class="col-lg-6">
			<div class="auth-frame" style="background-image: url({{ asset('assets/images/auth/auth-frame.webp') }});">
				<div class="clearfix">
					<div class="auth-content">
						<h1 class="display-6 text-white fw-bold">Welcome Back!</h1>
						<p class="text-white">Our HR Management & Administration ensure your organization runs smoothly, focusing on people, compliance, and efficiency to drive growth and employee satisfaction.</p>
					</div>
					<div class="auth-imgs position-relative">
						<img src="{{ asset('assets/images/auth/img1.png') }}" alt="" class="img-fluid">
						<img src="{{ asset('assets/images/auth/img2.png') }}" alt="" class="img-fluid position1 position-absolute">
						<img src="{{ asset('assets/images/auth/img3.png') }}" alt="" class="img-fluid position2 position-absolute">
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 align-self-center">
			<div class="p-4 p-sm-5 maxw-450px m-auto">
				<div class="mb-4 text-center">
					<a href="{{ route('index') }}" aria-label="GXON logo">
						<img class="visible-light" src="{{ asset('assets/images/logo-full.svg') }}" alt="GXON logo">
						<img class="visible-dark" src="{{ asset('assets/images/logo-full-white.svg') }}" alt="GXON logo">
					</a>
				</div>
				<div class="text-center mb-5">
					<h5 class="mb-1">Welcome to GXON</h5>
					<p>Enter your email to reset your password.</p>
				</div>
				<form action="{{ route('new-password-frame') }}">
					@csrf
					<div class="mb-4">
						<label class="form-label" for="resetEmail">Email address</label>
						<input type="email" class="form-control" id="resetEmail" placeholder="info@example.com">
					</div>
					<div class="clearfix">
						<button type="submit" value="Submit" class="btn btn-primary waves-effect waves-light w-100 mb-3">Forgot Password</button>
						<a href="{{ route('login-frame') }}" class="btn btn-light waves-effect waves-light w-100"> Cancel </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection