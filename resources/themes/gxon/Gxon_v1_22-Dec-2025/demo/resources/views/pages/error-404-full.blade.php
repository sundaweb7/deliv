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
<div class="error-full-wrapper" style="background-image: url({{ asset('assets/images/background/bg-full.png') }});">
	<div class="row g-xl-7 g-5">
		<div class="col-md-6">
			<div class="pe-5">
				<img src="{{ asset('assets/images/error/vector2.png') }}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="col-md-6 align-self-center">
			<h2 class="error-heading mb-3">Something
			<br> Went Wrong
			</h2>
			<p class="error-text mb-5">Sorry we were unable to find that page</p>
			<a href="{{ route('index') }}" class="btn btn-primary waves-effect waves-light">
				<i class="fi fi-rr-arrow-small-left scale-4x me-1"></i> Back To Dashboard
			</a>
		</div>
	</div>
</div>
@endsection