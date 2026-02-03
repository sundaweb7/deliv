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
	<h1 class="app-page-title">Badge</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Badge</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Background colors</h6>
				<p class="card-text">Bootstrap offers button variants for semantic purposes and customization.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<span class="badge text-bg-primary">Primary</span>
					<span class="badge text-bg-secondary">Secondary</span>
					<span class="badge text-bg-success">Success</span>
					<span class="badge text-bg-danger">Danger</span>
					<span class="badge text-bg-warning">Warning</span>
					<span class="badge text-bg-info">Info</span>
					<span class="badge text-bg-light">Light</span>
					<span class="badge text-bg-dark">Dark</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pill badges</h6>
				<p class="card-text">Use the <code>.rounded-pill</code> to make badges more rounded.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<span class="badge rounded-pill text-bg-primary">Primary</span>
					<span class="badge rounded-pill text-bg-secondary">Secondary</span>
					<span class="badge rounded-pill text-bg-success">Success</span>
					<span class="badge rounded-pill text-bg-danger">Danger</span>
					<span class="badge rounded-pill text-bg-warning">Warning</span>
					<span class="badge rounded-pill text-bg-info">Info</span>
					<span class="badge rounded-pill text-bg-light">Light</span>
					<span class="badge rounded-pill text-bg-dark">Dark</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Subtle badge</h6>
				<p class="card-text">Use <code>.bg-*-subtle</code> and <code>.text-*</code> classes for lightweight buttons with background colors.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<span class="badge bg-primary-subtle text-primary">Primary</span>
					<span class="badge bg-secondary-subtle text-secondary">Secondary</span>
					<span class="badge bg-success-subtle text-success">Success</span>
					<span class="badge bg-danger-subtle text-danger">Danger</span>
					<span class="badge bg-warning-subtle text-warning">Warning</span>
					<span class="badge bg-info-subtle text-info">Info</span>
					<span class="badge bg-light-subtle text-light">Light</span>
					<span class="badge bg-dark-subtle text-dark">Dark</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Sizes </h6>
				<p class="card-text">Fancy larger or smaller badge? Add <code>.badge-lg</code> or <code>.badge-sm</code> for additional sizes.</p>
			</div>
			<div class="card-body">
				<span class="badge badge-sm text-bg-primary me-1">Primary</span>
				<span class="badge text-bg-secondary me-1">Secondary</span>
				<span class="badge badge-lg text-bg-success me-1">Success</span>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Positioned</h6>
				<p class="card-text">Use utilities to modify a <code>.badge</code> and position it in the corner of a link or button.</p>
			</div>
			<div class="card-body">
				<button type="button" class="btn btn-primary position-relative me-5">
				Inbox
				<span class="position-absolute top-0 start-100 translate-middle badge badge-sm rounded-pill bg-danger">99+
					<span class="visually-hidden">unread messages</span>
				</span>
				</button>
				<button type="button" class="btn btn-primary position-relative">
				Profile
				<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
					<span class="visually-hidden">New alerts</span>
				</span>
				</button>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Badge with Avatar</h6>
				<p class="card-text">Displays user identity with avatar and role.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-primary bg-primary-subtle border border-primary-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">Primary
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-secondary bg-secondary-subtle border border-secondary-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">Secondary
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-success bg-success-subtle border border-success-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">Success
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-danger bg-danger-subtle border border-danger-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">Danger
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-warning bg-warning-subtle border border-warning-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">Warning
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-info bg-info-subtle border border-info-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">Info
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-dark bg-light-subtle border border-dark-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">Light
					</span>
					<span class="badge d-inline-flex align-items-center p-1 pe-2 text-dark bg-dark-subtle border border-dark-subtle rounded-pill">
						<img class="rounded-circle me-1" width="24" height="24" src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt=""> Dark
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection