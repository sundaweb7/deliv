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
<div class="maintenance-full-wrapper" style="background-image: url({{ asset('assets/images/background/bg-full.png') }});">
	<div class="row g-xl-7 g-5 align-items-center">
		<div class="col-md-5">
			<img src="{{ asset('assets/images/maintenance/vector2.png') }}" alt="" class="img-fluid">
		</div>
		<div class="col-md-7">
			<div class="maintenance-wrapper">
				<div class="maintenance-status">Under
					<br>Construction
				</div>
				<h2 class="maintenance-heading text-primary mb-3">This Page is Under Construction. We'll Be Live Soon.</h2>
				<p class="maintenance-text mb-4 maxw-md-500px">Our website is under construction, but we are ready to go! Special surprise for our subscribers only.</p>
				<form class="d-flex align-items-center maxw-md-450px position-relative" action="#">
					@csrf
					<i class="fi fi-rr-envelope position-absolute start-0 ms-4"></i>
					<input type="text" class="form-control form-control-lg rounded-5 ps-7" placeholder="Email Address">
					<button type="button" class="btn btn-primary rounded-pill position-absolute end-0 waves-effect waves-light me-1">
					Subscribe
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection