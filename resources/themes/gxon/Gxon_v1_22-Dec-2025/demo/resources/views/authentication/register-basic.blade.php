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
<div class="auth-wrapper min-vh-100 px-2" style="background-image: url({{ asset('assets/images/auth/auth.webp') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<div class="row g-0 min-vh-100">
		<div class="col-xl-5 col-lg-6 ms-auto px-sm-4 align-self-center py-4">
			<div class="card card-body p-4 p-sm-5 maxw-450px m-auto rounded-4">
				<div class="mb-4 text-center">
					<a href="{{ route('index') }}" aria-label="GXON logo">
						<img class="visible-light" src="{{ asset('assets/images/logo-full.svg') }}" alt="GXON logo">
						<img class="visible-dark" src="{{ asset('assets/images/logo-full-white.svg') }}" alt="GXON logo">
					</a>
				</div>
				<div class="text-center mb-4">
					<h5 class="mb-1">Welcome to GXON</h5>
					<p>Sign up to create your secure admin.</p>
				</div>
				<form action="{{ route('index') }}">
					@csrf
					<div class="mb-4">
						<label class="form-label" for="registerName">Name</label>
						<input type="text" class="form-control" id="registerName" placeholder="Full Name">
					</div>
					<div class="mb-4">
						<label class="form-label" for="registerEmail">Email Address</label>
						<input type="email" class="form-control" id="registerEmail" placeholder="info@example.com">
					</div>
					<div class="mb-4">
						<label class="form-label" for="registerPassword">Password</label>
						<input type="password" class="form-control" id="registerPassword" placeholder="********">
					</div>
					<div class="mb-4">
						<div class="form-check mb-0">
							<input class="form-check-input" type="checkbox" id="termsConditions" name="terms">
							<label class="form-check-label" for="termsConditions">
								I agree to <a href="javascript:void(0);">privacy policy & terms</a>
							</label>
						</div>
					</div>
					<div class="mb-3">
						<button type="submit" value="Submit" class="btn btn-primary waves-effect waves-light w-100">Sign up</button>
					</div>
					<p class="mb-5 text-center">Have any account? <a href="{{ route('login-basic') }}">Sign In here</a>
					</p>
					<div class="border-bottom position-relative my-3 text-center">
						<span class="px-3 position-absolute translate-middle top-50 start-50 bg-body">Or Continue With</span>
					</div>
					<div class="d-flex gap-2 justify-content-center mt-5">
						<a href="javascript:void(0);" class="btn btn-icon btn-subtle-facebook rounded-circle waves-effect waves-light">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="javascript:void(0);" class="btn btn-icon btn-subtle-twitter rounded-circle waves-effect waves-light">
							<i class="fa-brands fa-x-twitter"></i>
						</a>
						<a href="javascript:void(0);" class="btn btn-icon btn-subtle-github rounded-circle waves-effect waves-light">
							<i class="fa-brands fa-github"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection