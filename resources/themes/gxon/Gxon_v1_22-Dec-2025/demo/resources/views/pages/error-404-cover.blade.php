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
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="error-cover-wrapper">
	<div class="row g-0">
		<div class="col-lg-6 align-self-center">
			<div class="error-wrapper text-center">
				<div class="error-status">404</div>
				<h2 class="error-heading">Something Went Wrong</h2>
				<p class="error-text mb-4">Sorry we were unable to find that page</p>
				<a href="{{ route('index') }}" class="btn btn-primary waves-effect waves-light">
					<i class="fi fi-rr-arrow-small-left scale-4x me-1"></i> Back To Dashboard
				</a>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="error-cover" style="background-image: url({{ asset('assets/images/auth/auth-cover-bg.png') }});">
				<img src="{{ asset('assets/images/error/vector.png') }}" alt="" class="img-fluid cover-img">
			</div>
		</div>
	</div>
</div>
@endsection