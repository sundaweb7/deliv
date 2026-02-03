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
	<link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/chartjs/chart.js') }}"></script>
	<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('assets/js/flatpickr.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head d-flex flex-wrap gap-3 align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Profile</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Profile</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-wrap gap-4 align-items-center">
					<div class="d-flex align-items-center">
						<div class="position-relative">
							<div class="avatar avatar-xxl rounded-circle">
								<img src="{{ asset('assets/images/avatar/avatar-large3.jpg') }}" alt="">
							</div>
							<a href="javascript:void(0);" class="avatar avatar-xxs bg-primary rounded-circle text-white position-absolute top-0 end-0">
								<i class="fi fi-rr-camera"></i>
							</a>
						</div>
						<div class="ms-3">
							<h4 class="fw-bold mb-0">Emma Smith</h4>
							<small class="mb-2">Front-End Developer</small>
							<div class="d-flex flex-wrap gap-1 mt-2">
								<span class="badge badge-sm px-2 rounded-pill text-bg-primary">Administrator</span>
								<span class="badge badge-sm px-2 rounded-pill text-bg-secondary">Designer</span>
								<span class="badge badge-sm px-2 rounded-pill text-bg-success">Active</span>
							</div>
						</div>
					</div>
					<div class="d-flex gap-2 ms-md-auto">
						<a href="{{ route('chat') }}" class="btn btn-primary waves-effect waves-light">Message</a>
						<button type="button" class="btn btn-outline-secondary waves-effect waves-light">Follow</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-sm-12">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h4 class="card-title mb-0">Basic Information</h4>
						<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect" type="button">
						<i class="fi fi-rr-pencil"></i>
						</button>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<span class="mb-1">Full Name</span>
							<p class="text-dark fw-semibold mb-0">Emma Smith</p>
						</div>
						<div class="mb-3">
							<span class="mb-1">Email</span>
							<p class="text-dark fw-semibold mb-0">emma.smith@gmail.com</p>
						</div>
						<div class="mb-3">
							<span class="mb-1">Phone</span>
							<p class="text-dark fw-semibold mb-0">+1 (123) 456-7890</p>
						</div>
						<div class="mb-3">
							<span class="mb-1">Date of Birth</span>
							<p class="text-dark fw-semibold mb-0">15 July 1990</p>
						</div>
						<div class="mb-2">
							<span class="mb-1">Joined Date</span>
							<p class="text-dark fw-semibold mb-0">March 12, 2020</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Social Media Links</h4>
					</div>
					<div class="card-body">
						<div class="d-flex flex-wrap gap-2">
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-facebook waves-effect waves-light">
								<i class="fa-brands fa-facebook-f"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-twitter waves-effect waves-light">
								<i class="fa-brands fa-x-twitter"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-instagram waves-effect waves-light">
								<i class="fa-brands fa-instagram"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-youtube waves-effect waves-light">
								<i class="fa-brands fa-youtube"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-linkedin waves-effect waves-light">
								<i class="fa-brands fa-linkedin"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-pinterest waves-effect waves-light">
								<i class="fa-brands fa-pinterest"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-telegram waves-effect waves-light">
								<i class="fa-brands fa-telegram"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-tiktok waves-effect waves-light">
								<i class="fa-brands fa-tiktok"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon btn-sm btn-subtle-reddit waves-effect waves-light">
								<i class="fa-brands fa-reddit"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Expertise</h4>
					</div>
					<div class="card-body">
						<div class="row align-items-center g-2 mb-3">
							<div class="col-sm-3">Javascript</div>
							<div class="col-sm-9">
								<div class="progress progress-sm" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar" style="width: 75%"></div>
								</div>
							</div>
						</div>
						<div class="row align-items-center g-2 mb-3">
							<div class="col-sm-3">PHP</div>
							<div class="col-sm-9">
								<div class="progress progress-sm" role="progressbar" aria-label="Basic example" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar" style="width: 87%"></div>
								</div>
							</div>
						</div>
						<div class="row align-items-center g-2 mb-3">
							<div class="col-sm-3">Photoshop</div>
							<div class="col-sm-9">
								<div class="progress progress-sm" role="progressbar" aria-label="Basic example" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar" style="width: 67%"></div>
								</div>
							</div>
						</div>
						<div class="row align-items-center g-2 mb-3">
							<div class="col-sm-3">illustrator</div>
							<div class="col-sm-9">
								<div class="progress progress-sm" role="progressbar" aria-label="Basic example" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar" style="width: 84%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-sm-12">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Account Settings</h4>
					</div>
					<div class="card-body">
						<form>
							@csrf
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Full Name</label>
									<input type="text" class="form-control" value="Emma Smith">
								</div>
								<div class="col-md-6">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" value="emma.smith@gmail.com">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Phone</label>
									<input type="tel" class="form-control" value="+1 (123) 456-7890">
								</div>
								<div class="col-md-6">
									<label class="form-label">Role</label>
									<input type="text" class="form-control" value="Administrator" readonly>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Location</label>
									<input type="text" class="form-control" value="San Francisco">
								</div>
								<div class="col-md-6">
									<label class="form-label">New Password</label>
									<input type="password" class="form-control" placeholder="••••••••">
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Bio</label>
								<textarea class="form-control" rows="5">I manage user roles, oversee platform settings, and ensure everything runs smoothly and securely. With a focus on performance, privacy, and efficiency, I help streamline daily operations so your team can focus on what matters most.</textarea>
							</div>
							<div class="text-end">
								<button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card border border-danger bg-danger-subtle border-2">
					<div class="card-header border-0 pb-0">
						<h5 class="text-danger fw-bold mb-0">Danger Zone</h5>
						<small>Critical actions that affect your account.</small>
					</div>
					<div class="card-body">
						<div class="d-flex gap-3 justify-content-between align-items-start mb-4 flex-wrap">
							<div class="pe-3">
								<h6 class="text-danger mb-1">Delete Account</h6>
								<p class="mb-0 small">This action is <strong>permanent</strong> and cannot be undone. Please make sure you really want to delete your account.</p>
							</div>
							<button class="btn btn-danger waves-effect waves-light">Delete Account</button>
						</div>
						<hr class="border-danger my-3">
						<div class="d-flex gap-3 justify-content-between align-items-start flex-wrap">
							<div class="pe-3">
								<h6 class="text-primary mb-1">Export Your Data</h6>
								<p class="mb-0 small">Backup your data in case you decide to delete your account later.</p>
							</div>
							<button class="btn btn-outline-primary waves-effect waves-light">Export Data</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection