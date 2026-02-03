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
	<h1 class="app-page-title">Spinners</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Spinners</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Border spinner</h6>
				<p class="card-text">Use the border spinners for a lightweight loading indicator.</p>
			</div>
			<div class="card-body">
				<div class="spinner-border" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Colors</h6>
				<p class="card-text">The border spinner uses <code>currentColor</code> for its <code>border-color</code>.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3">
					<div class="spinner-border text-primary" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-secondary" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-success" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-danger" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-warning" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-info" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-light" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-border text-dark" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Growing spinner</h6>
				<p class="card-text">If you don’t fancy a border spinner, switch to the grow spinner. While it doesn’t technically spin, it does repeatedly grow!</p>
			</div>
			<div class="card-body">
				<div class="spinner-grow" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Growing spinner Colors</h6>
				<p class="card-text">Once again, this spinner is built with <code>currentColor</code>.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3">
					<div class="spinner-grow text-primary" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-secondary" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-success" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-danger" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-warning" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-info" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-light" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow text-dark" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Size </h6>
				<p class="card-text">Add <code>.spinner-border-sm</code> and <code>.spinner-grow-sm</code> to make a smaller spinner that can quickly be used within other components.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-5 mt-3">
					<div class="spinner-border spinner-border-sm" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow spinner-grow-sm" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
				<div class="d-flex flex-wrap gap-3 mb-3">
					<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Buttons</h6>
				<p class="card-text">Use spinners within buttons to indicate an action is currently processing or taking place. You may also swap the text out of the spinner element and utilize button text as needed.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-4">
					<button class="btn btn-primary" type="button" disabled>
					<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
					<span class="visually-hidden" role="status">Loading...</span>
					</button>
					<button class="btn btn-primary" type="button" disabled>
					<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
					<span role="status">Loading...</span>
					</button>
				</div>
				<div class="d-flex flex-wrap gap-3">
					<button class="btn btn-primary" type="button" disabled>
					<span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
					<span class="visually-hidden" role="status">Loading...</span>
					</button>
					<button class="btn btn-primary" type="button" disabled>
					<span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
					<span role="status">Loading...</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection