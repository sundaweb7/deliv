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
	<script src="{{ asset('assets/js/toast.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head">
	<h1 class="app-page-title">Toasts</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Toasts</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Toasts Basic</h6>
				<p class="card-text">Toasts are as flexible as you need and have very little required markup.</p>
			</div>
			<div class="card-body">
				<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header">
						<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
						<strong class="me-auto">Bootstrap</strong>
						<small>11 mins ago</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						Hello, world! This is a toast message.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Live example</h6>
				<p class="card-text">Click the button below to show a toast positioned in the lower right corner, hidden by default.</p>
			</div>
			<div class="card-body">
				<button type="button" class="btn btn-primary waves-effect waves-light" id="liveToastBtn">Show live toast</button>
				<div class="toast-container position-fixed bottom-0 end-0 p-3">
					<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
							<strong class="me-auto">Bootstrap</strong>
							<small>11 mins ago</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title">Translucent</h6>
				<p class="card-text">Toasts are slightly translucent to blend in with what’s below them.</p>
			</div>
			<div class="card-body bg-dark">
				<div class="toast-container position-static">
					<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
							<strong class="me-auto">Bootstrap</strong>
							<small class="text-body-secondary">11 mins ago</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
					</div>
					<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
							<strong class="me-auto">Bootstrap</strong>
							<small class="text-body-secondary">11 mins ago</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Stacking</h6>
				<p class="card-text">You can stack toasts by wrapping them in a toast container, which will vertically add some spacing.</p>
			</div>
			<div class="card-body">
				<div class="toast-container position-static">
					<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
							<strong class="me-auto">Bootstrap</strong>
							<small class="text-body-secondary">just now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							See? Just like this.
						</div>
					</div>
					<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<img src="{{ asset('assets/images/logo.svg') }}" class="rounded me-2" alt="logo" width="20">
							<strong class="me-auto">Bootstrap</strong>
							<small class="text-body-secondary">2 seconds ago</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Heads up, toasts will stack automatically
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Custom content</h6>
				<p class="card-text">Customize your toasts by removing sub-components.</p>
			</div>
			<div class="card-body">
				<div class="toast fade show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
						<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Color schemes</h6>
				<p class="card-text">Customize your toasts by removing sub-components.</p>
			</div>
			<div class="card-body">
				<div class="toast fade show align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection