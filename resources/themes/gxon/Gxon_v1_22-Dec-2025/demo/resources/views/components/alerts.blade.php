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
<div class="app-page-head">
	<h1 class="app-page-title">Alerts</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Alerts</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Alerts</h6>
				<p class="card-text">Alerts are available for any length of text.</p>
			</div>
			<div class="card-body">
				<div class="alert alert-primary" role="alert">A simple primary alert—check it out!</div>
				<div class="alert alert-secondary" role="alert">A simple secondary alert—check it out!</div>
				<div class="alert alert-success" role="alert">A simple success alert—check it out!</div>
				<div class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>
				<div class="alert alert-warning" role="alert">A simple warning alert—check it out!</div>
				<div class="alert alert-info" role="alert">A simple info alert—check it out!</div>
				<div class="alert alert-light" role="alert">A simple light alert—check it out!</div>
				<div class="alert alert-dark" role="alert">A simple dark alert—check it out!</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Link color</h6>
				<p class="card-text">Use the <code>.alert-link</code> utility class to provide matching colored links within an alert.</p>
			</div>
			<div class="card-body">
				<div class="alert alert-primary" role="alert">
					A simple primary alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-secondary" role="alert">
					A simple secondary alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-success" role="alert">
					A simple success alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-danger" role="alert">
					A simple danger alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-warning" role="alert">
					A simple warning alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-info" role="alert">
					A simple info alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-light" role="alert">
					A simple light alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
				<div class="alert alert-dark" role="alert">
					A simple dark alert with <a href="javascript:void(0);" class="alert-link">an example link</a>. Give it a click if you like.
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Icons</h6>
				<p class="card-text">Enhance alerts with icons for better visibility and context.</p>
			</div>
			<div class="card-body">
				<div class="alert alert-primary" role="alert">
					<i class="fi fi-sr-star me-1"></i> A simple primary alert—check it out!
				</div>
				<div class="alert alert-secondary" role="alert">
					<i class="fi fi-ss-check-circle me-1"></i> A simple secondary alert—check it out!
				</div>
				<div class="alert alert-success" role="alert">
					<i class="fi fi-sr-trophy-star me-1"></i> A simple success alert—check it out!
				</div>
				<div class="alert alert-danger" role="alert">
					<i class="fi fi-ss-octagon-exclamation me-1"></i> A simple danger alert—check it out!
				</div>
				<div class="alert alert-warning" role="alert">
					<i class="fi fi-ss-triangle-warning me-1"></i> A simple warning alert—check it out!
				</div>
				<div class="alert alert-info" role="alert">
					<i class="fi fi-sr-info me-1"></i> A simple info alert—check it out!
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Additional content</h6>
				<p class="card-text">Alerts can contain HTML elements like headings, paragraphs, and dividers.</p>
			</div>
			<div class="card-body">
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Well done!</h4>
					<p>Aww yeah, you successfully read this alert message. This text is going to run longer so you can see how spacing within an alert works.</p>
					<hr>
					<p class="mb-0">Whenever you need, be sure to use margin utilities to keep things tidy.</p>
				</div>
				<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading">Something Wrong!</h4>
					<p>Aww yeah, you successfully read this alert message. This text is going to run longer so you can see how spacing within an alert works.</p>
					<hr>
					<p class="mb-0">Whenever you need, be sure to use margin utilities to keep things tidy.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Dismissing</h6>
				<p class="card-text">To dismiss an alert, use <code>.alert-dismissible</code> with a close button.</p>
			</div>
			<div class="card-body">
				<div class="alert alert-primary alert-dismissible fade show" role="alert">
					A simple primary alert—check it out
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-secondary alert-dismissible fade show" role="alert">
					A simple secondary alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					A simple success alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					A simple danger alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					A simple warning alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					A simple info alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-light alert-dismissible fade show" role="alert">
					A simple light alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-dark alert-dismissible fade show" role="alert">
					A simple dark alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Background color</h6>
				<p class="card-text">To dismiss an alert, use <code>.alert-dismissible</code> with a close button.</p>
			</div>
			<div class="card-body">
				<div class="alert text-bg-primary alert-dismissible fade show" role="alert">
					A simple primary alert—check it out
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-secondary alert-dismissible fade show" role="alert">
					A simple secondary alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-success alert-dismissible fade show" role="alert">
					A simple success alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-danger alert-dismissible fade show" role="alert">
					A simple danger alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-warning alert-dismissible fade show" role="alert">
					A simple warning alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-info alert-dismissible fade show" role="alert">
					A simple info alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-light alert-dismissible fade show" role="alert">
					A simple light alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert text-bg-dark alert-dismissible fade show" role="alert">
					A simple dark alert—check it out!
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Border</h6>
				<p class="card-text">To dismiss an alert, use <code>.alert-dismissible</code> with a close button.</p>
			</div>
			<div class="card-body">
				<div class="alert border-primary text-primary-emphasis alert-dismissible fade show" role="alert">
					A simple primary alert—check it out
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-secondary text-secondary-emphasis alert-dismissible fade show" role="alert">
					A simple secondary alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-success text-success-emphasis alert-dismissible fade show" role="alert">
					A simple success alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-danger text-danger-emphasis alert-dismissible fade show" role="alert">
					A simple danger alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-warning text-warning-emphasis alert-dismissible fade show" role="alert">
					A simple warning alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-info text-info-emphasis alert-dismissible fade show" role="alert">
					A simple info alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-light text-light-emphasis alert-dismissible fade show" role="alert">
					A simple light alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-dark text-dark-emphasis alert-dismissible fade show" role="alert">
					A simple dark alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Border dashed</h6>
				<p class="card-text">Use <code>.border-*</code>, <code>.text-*-emphasis</code>, and <code>.border-dashed</code> for a dashed border in an alert.</p>
			</div>
			<div class="card-body">
				<div class="alert border-primary text-primary-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple primary alert—check it out
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-secondary text-secondary-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple secondary alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-success text-success-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple success alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-danger text-danger-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple danger alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-warning text-warning-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple warning alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-info text-info-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple info alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-light text-light-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple light alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert border-dark text-dark-emphasis border-dashed alert-dismissible fade show" role="alert">
					A simple dark alert—check it out!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection