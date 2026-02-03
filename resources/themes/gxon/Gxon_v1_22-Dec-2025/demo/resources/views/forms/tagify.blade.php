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
	<link rel="stylesheet" href="{{ asset('assets/libs/tagify/tagify.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/tagify/tagify.js') }}"></script>
	<script src="{{ asset('assets/js/tagify.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head">
	<h1 class="app-page-title">Tagify</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Tagify</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Tagify</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 mb-5">
						<label class="form-label">Basic tagify</label>
						<input class="form-control tagify-input" value='sales@example.com, info@example.com, support@example.com'>
					</div>
					<div class="col-lg-12 mb-5">
						<label class="form-label">Users List</label>
						<input class='form-control tagify-users-list' value='Sophia Hall, Olivia Clark'>
					</div>
					<div class="col-lg-12 mb-4">
						<label class="form-label">Advance Options</label>
						<input class="form-control tagify-advance-options" value='[{"value":"Michael Davis"}, {"value":"James Anderson"}]' pattern='^[A-Za-z_✲ ]{1,15}$'>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection