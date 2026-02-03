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
	<h1 class="app-page-title">Avatar</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Avatar</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with shadow</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-3">
					<div class="avatar bg-primary shadow-sharp-primary rounded-circle text-white">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar bg-secondary shadow-sharp-secondary rounded-circle text-white">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar bg-danger shadow-sharp-danger rounded-circle text-white">
						<i class="fi fi-rr-trash"></i>
					</div>
					<div class="avatar bg-warning shadow-sharp-warning rounded-circle text-white">
						<i class="fi fi-rr-star"></i>
					</div>
					<div class="avatar bg-info shadow-sharp-info rounded-circle text-white">
						<i class="fi fi-rr-comment"></i>
					</div>
					<div class="avatar bg-success shadow-sharp-success rounded-circle text-white">
						<i class="fi fi-rr-check"></i>
					</div>
					<div class="avatar bg-dark shadow-sharp-dark rounded-circle text-white">
						<i class="fi fi-rr-lock"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap gap-3">
					<div class="avatar shadow-sharp-primary rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-secondary rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-danger rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-warning rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-info rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-success rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
					<div class="avatar shadow-sharp-dark rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with subtle color</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-3">
					<div class="avatar bg-primary-subtle rounded-circle text-primary">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar bg-secondary-subtle rounded-circle text-secondary">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar bg-danger-subtle rounded-circle text-danger">
						<i class="fi fi-rr-trash"></i>
					</div>
					<div class="avatar bg-warning-subtle rounded-circle text-warning">
						<i class="fi fi-rr-star"></i>
					</div>
					<div class="avatar bg-info-subtle rounded-circle text-info">
						<i class="fi fi-rr-comment"></i>
					</div>
					<div class="avatar bg-success-subtle rounded-circle text-success">
						<i class="fi fi-rr-check"></i>
					</div>
					<div class="avatar bg-dark-subtle rounded-circle text-dark">
						<i class="fi fi-rr-lock"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap gap-3">
					<div class="avatar bg-primary-subtle text-primary">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar bg-secondary-subtle text-secondary">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar bg-danger-subtle text-danger">
						<i class="fi fi-rr-trash"></i>
					</div>
					<div class="avatar bg-warning-subtle text-warning">
						<i class="fi fi-rr-star"></i>
					</div>
					<div class="avatar bg-info-subtle text-info">
						<i class="fi fi-rr-comment"></i>
					</div>
					<div class="avatar bg-success-subtle text-success">
						<i class="fi fi-rr-check"></i>
					</div>
					<div class="avatar bg-dark-subtle text-dark">
						<i class="fi fi-rr-lock"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with text</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-3">
					<div class="avatar bg-primary rounded-circle text-white">H</div>
					<div class="avatar bg-secondary rounded-circle text-white">B</div>
					<div class="avatar bg-danger rounded-circle text-white">T</div>
					<div class="avatar bg-warning rounded-circle text-white">S</div>
					<div class="avatar bg-info rounded-circle text-white">C</div>
					<div class="avatar bg-success rounded-circle text-white">K</div>
					<div class="avatar bg-dark rounded-circle text-white">L</div>
				</div>
				<div class="d-flex flex-wrap gap-3">
					<div class="avatar bg-primary-subtle text-primary">H</div>
					<div class="avatar bg-secondary-subtle text-secondary">B</div>
					<div class="avatar bg-danger-subtle text-danger">T</div>
					<div class="avatar bg-warning-subtle text-warning">S</div>
					<div class="avatar bg-info-subtle text-info">C</div>
					<div class="avatar bg-success-subtle text-success">K</div>
					<div class="avatar bg-dark-subtle text-dark">L</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with status</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-3 mb-3">
					<div class="avatar bg-primary rounded-circle text-white avatar-status-primary">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar bg-secondary rounded-circle text-white avatar-status-secondary">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar bg-danger rounded-circle text-white avatar-status-danger">
						<i class="fi fi-rr-trash"></i>
					</div>
					<div class="avatar bg-warning rounded-circle text-white avatar-status-warning">
						<i class="fi fi-rr-star"></i>
					</div>
					<div class="avatar bg-info rounded-circle text-white avatar-status-info">
						<i class="fi fi-rr-comment"></i>
					</div>
					<div class="avatar bg-success rounded-circle text-white avatar-status-success">
						<i class="fi fi-rr-check"></i>
					</div>
					<div class="avatar bg-dark rounded-circle text-white avatar-status-dark">
						<i class="fi fi-rr-lock"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap gap-3">
					<div class="avatar rounded-circle avatar-status-primary">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-secondary">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-danger">
						<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-warning">
						<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-info">
						<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-success">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-circle avatar-status-dark">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with group</h6>
			</div>
			<div class="card-body">
				<div class="d-grid gap-3">
					<div class="avatar-group">
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
						</div>
					</div>
					<div class="avatar-group">
						<div class="avatar bg-primary rounded-circle text-white border border-2 border-white">
							<i class="fi fi-rr-home"></i>
						</div>
						<div class="avatar bg-secondary rounded-circle text-white border border-2 border-white">
							<i class="fi fi-rr-bell"></i>
						</div>
						<div class="avatar bg-danger rounded-circle text-white border border-2 border-white">
							<i class="fi fi-rr-trash"></i>
						</div>
						<div class="avatar bg-warning rounded-circle text-white border border-2 border-white">
							<i class="fi fi-rr-star"></i>
						</div>
						<div class="avatar bg-info rounded-circle text-white border border-2 border-white">
							<i class="fi fi-rr-comment"></i>
						</div>
					</div>
					<div class="avatar-group">
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
						</div>
						<div class="avatar rounded-circle border border-2 border-white">
							<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
						</div>
						<a href="javascript:void(0);" class="avatar rounded-circle bg-primary-subtle text-primary border border-2 border-white">
							<i class="fi fi-rr-plus"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with corner</h6>
			</div>
			<div class="card-body">
				<div class="d-flex gap-3 mb-3">
					<div class="avatar bg-primary rounded-circle text-white">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar bg-secondary text-white">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar bg-danger rounded-0 text-white">
						<i class="fi fi-rr-trash"></i>
					</div>
				</div>
				<div class="d-flex gap-3">
					<div class="avatar rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
					<div class="avatar">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
					<div class="avatar rounded-0">
						<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Avatar with sizes</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap align-items-center gap-3 mb-3">
					<div class="avatar avatar-xxl bg-primary rounded-circle text-white">
						<i class="fi fi-rr-home"></i>
					</div>
					<div class="avatar avatar-xl bg-secondary rounded-circle text-white">
						<i class="fi fi-rr-bell"></i>
					</div>
					<div class="avatar avatar-lg bg-danger rounded-circle text-white">
						<i class="fi fi-rr-trash"></i>
					</div>
					<div class="avatar bg-warning rounded-circle text-white">
						<i class="fi fi-rr-star"></i>
					</div>
					<div class="avatar avatar-sm bg-info rounded-circle text-white">
						<i class="fi fi-rr-comment"></i>
					</div>
					<div class="avatar avatar-xs bg-success rounded-circle text-white">
						<i class="fi fi-rr-check"></i>
					</div>
					<div class="avatar avatar-xxs bg-success rounded-circle text-white">
						<i class="fi fi-rr-lock"></i>
					</div>
				</div>
				<div class="d-flex flex-wrap align-items-center gap-3">
					<div class="avatar avatar-xxl rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar-large2.jpg') }}" alt="">
					</div>
					<div class="avatar avatar-xl rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar-large3.jpg') }}" alt="">
					</div>
					<div class="avatar avatar-lg rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
					</div>
					<div class="avatar bg-danger rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
					</div>
					<div class="avatar avatar-sm rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
					</div>
					<div class="avatar avatar-xs rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
					</div>
					<div class="avatar avatar-xxs rounded-circle">
						<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection