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
		<h1 class="app-page-title">Pricing</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Pricing</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header border-0 pt-5 px-xxl-5 pb-2">
				<h3 class="text-center mb-2">Our Pricing Plans</h3>
				<p class="text-center mb-5">Choose the plan that fits your needs</p>
				<div class="form-check form-switch p-0 my-0 d-flex justify-content-center">
					<label class="form-check-label d-flex fw-semibold align-items-center" for="switchCheckChecked">
						<span>Monthly</span>
						<input class="form-check-input mx-2" type="checkbox" role="switch" id="switchCheckChecked" checked="">
						<span>Annually</span>
					</label>
				</div>
			</div>
			<div class="card-body">
				<div class="row mx-xxl-5 mb-xxl-5">
					<div class="col-lg-4">
						<div class="card overflow-hidden card-action action-border-primary">
							<div class="card-header bg-light border-0 p-4" style="background-image: url({{ asset('assets/images/background/price.png') }}); background-size: cover; background-position: center bottom;">
								<h4>Free Trial</h4>
								<p class="mb-4">Try the course for a limited
									<br>time at no cost.
								</p>
								<div class="display-6 fw-bold text-dark lh-1 price-monthly">$0 <span class="h6">Monthly</span>
							</div>
							<div class="display-6 fw-bold text-dark lh-1 price-yearly d-none">$0 <span class="h6">Year</span>
						</div>
					</div>
					<div class="card-body p-4">
						<ul class="list-inline text-sm">
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Full Access</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-regular fa-circle-check text-primary"></i> Quizzes
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-regular fa-circle-check text-primary"></i> Community 24/7 Support
							</li>
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Downloadable</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Video Quality 720dpi</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Source Files</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-regular fa-circle-check text-primary"></i> Free Appointments
							</li>
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Lifetime Access</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-regular fa-circle-check text-primary"></i> Certificate of Completion
							</li>
							<li class="d-flex gap-2 align-items-center py-1 opacity-50">
								<i class="fa-regular fa-circle-xmark text-danger"></i>
								<span class="del">Mentor Support</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-regular fa-circle-check text-primary"></i> Enhanced Security
							</li>
						</ul>
					</div>
					<div class="card-footer p-4 pt-0 border-0">
						<a href="javascript:void(0);" class="btn btn-subtle-success btn-lg waves-effect waves-light w-100">Your Current Plan</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card overflow-hidden card-action action-border-primary action-active">
					<div class="card-header bg-light border-0 p-4" style="background-image: url({{ asset('assets/images/background/price.png') }}); background-size: cover; background-position: center bottom;">
						<h4>Basic Package</h4>
						<p class="mb-4">Access to core course materials
							<br>and quizzes.
						</p>
						<div class="display-6 fw-bold text-dark lh-1 price-monthly">$12 <span class="h6">Monthly</span>
					</div>
					<div class="display-6 fw-bold text-dark lh-1 price-yearly d-none">$199 <span class="h6">Year</span>
				</div>
				<span class="badge bg-primary position-absolute top-0 end-0 mt-3 me-3">Popular</span>
			</div>
			<div class="card-body p-4">
				<ul class="list-inline text-sm">
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Full Access
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Quizzes
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Community 24/7 Support
					</li>
					<li class="d-flex gap-2 align-items-center py-1 opacity-50">
						<i class="fa-regular fa-circle-xmark text-danger"></i>
						<span class="del">Downloadable</span>
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Video Quality 720dpi
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Source Files
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Free Appointments
					</li>
					<li class="d-flex gap-2 align-items-center py-1 opacity-50">
						<i class="fa-regular fa-circle-xmark text-danger"></i>
						<span class="del">Lifetime Access</span>
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Certificate of Completion
					</li>
					<li class="d-flex gap-2 align-items-center py-1 opacity-50">
						<i class="fa-regular fa-circle-xmark text-danger"></i>
						<span class="del">Mentor Support</span>
					</li>
					<li class="d-flex gap-2 align-items-center py-1">
						<i class="fa-regular fa-circle-check text-primary"></i> Enhanced Security
					</li>
				</ul>
			</div>
			<div class="card-footer p-4 pt-0 border-0">
				<a href="javascript:void(0);" class="btn btn-primary btn-lg waves-effect waves-light w-100">Upgrade</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card overflow-hidden card-action action-border-primary">
			<div class="card-header bg-light border-0 p-4" style="background-image: url({{ asset('assets/images/background/price.png') }}); background-size: cover; background-position: center bottom;">
				<h4>Pro Plan</h4>
				<p class="mb-4">Includes assignments, mentor support, and downloadable resources.</p>
				<div class="display-6 fw-bold text-dark lh-1 price-monthly">$39 <span class="h6">Monthly</span>
			</div>
			<div class="display-6 fw-bold text-dark lh-1 price-yearly d-none">$499 <span class="h6">Year</span>
		</div>
	</div>
	<div class="card-body p-4">
		<ul class="list-inline text-sm">
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Full Access
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Quizzes
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Community 24/7 Support
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Downloadable
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Video Quality 720dpi
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Source Files
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Free Appointments
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Lifetime Access
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Certificate of Completion
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Mentor Support
			</li>
			<li class="d-flex gap-2 align-items-center py-1">
				<i class="fa-regular fa-circle-check text-primary"></i> Enhanced Security
			</li>
		</ul>
	</div>
	<div class="card-footer p-4 pt-0 border-0">
		<a href="javascript:void(0);" class="btn btn-subtle-primary btn-lg waves-effect waves-light w-100">Upgrade</a>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection