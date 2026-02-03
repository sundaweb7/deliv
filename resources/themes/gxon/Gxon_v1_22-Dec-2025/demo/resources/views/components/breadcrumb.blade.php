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
	<h1 class="app-page-title">Breadcrumb</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Breadcrumb</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Basic</h6>
			</div>
			<div class="card-body">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Home</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="javascript:void(0);">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Library</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="javascript:void(0);">Home</a>
						</li>
						<li class="breadcrumb-item">
							<a href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Dividers </h6>
			</div>
			<div class="card-body">
				<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="javascript:void(0);">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Library</li>
					</ol>
				</nav>
				<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="javascript:void(0);">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Library</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Colored Breadcrumb</h6>
			</div>
			<div class="card-body">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-primary-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-primary" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-primary fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-secondary-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-secondary" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-secondary fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-info-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-info" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-info fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-success-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-success" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-success fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-danger-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-danger" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-danger fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-warning-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-warning" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-warning fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 bg-dark-subtle rounded-3">
						<li class="breadcrumb-item">
							<a class="link-dark" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-dark fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Colored Border Breadcrumb</h6>
			</div>
			<div class="card-body">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-primary rounded-3">
						<li class="breadcrumb-item">
							<a class="link-primary" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-primary fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-secondary rounded-3">
						<li class="breadcrumb-item">
							<a class="link-secondary" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-secondary fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-info rounded-3">
						<li class="breadcrumb-item">
							<a class="link-info" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-info fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-success rounded-3">
						<li class="breadcrumb-item">
							<a class="link-success" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-success fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-danger rounded-3">
						<li class="breadcrumb-item">
							<a class="link-danger" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-danger fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-warning rounded-3">
						<li class="breadcrumb-item">
							<a class="link-warning" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-warning fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb p-3 border border-dark rounded-3">
						<li class="breadcrumb-item">
							<a class="link-dark" href="javascript:void(0);">
								<i class="fi fi-rr-home"></i>
								<span class="visually-hidden">Home</span>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-dark fw-medium text-decoration-none" href="javascript:void(0);">Library</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection