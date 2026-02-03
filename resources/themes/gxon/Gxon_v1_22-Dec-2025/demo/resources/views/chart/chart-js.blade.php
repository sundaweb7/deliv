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
	<script src="{{ asset('assets/libs/chartjs/chart.js') }}"></script>
	<script src="{{ asset('assets/js/chartjs.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head">
	<h1 class="app-page-title">Chart js</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Chart js</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-xxl-5 col-lg-7">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Company Pay</h6>
				<select class="selectpicker" data-style="btn-sm btn-outline-light btn-shadow waves-effect">
					<option value="pending">2024</option>
					<option>2023</option>
					<option>2022</option>
					<option>2021</option>
				</select>
			</div>
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-sm-6">
						<div class="maxw-250px ratio ratio-1x1">
							<canvas id="companyPayChart"></canvas>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="d-grid gap-2">
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-danger text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">15%</strong> Salary
							</div>
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-success text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">08%</strong> Bonus
							</div>
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-info text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">20%</strong> Commission
							</div>
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-secondary text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">11%</strong> Overtime
							</div>
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-primary text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">28%</strong> Reimbursement
							</div>
							<div class="d-flex gap-1 align-items-center mx-1">
								<i class="fa fa-circle text-warning text-2xs me-1"></i>
								<strong class="text-dark fw-semibold">18%</strong> Benefits
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row gy-3 align-items-center">
					<div class="col-sm-6">
						<p class="mb-0">2024 Download Report Company Trends and Insights</p>
					</div>
					<div class="col-sm-6 text-sm-end">
						<button type="button" class="btn btn-primary waves-effect waves-light">
						<i class="fi fi-rr-download me-1"></i> Download Report
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-5 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Employee Type </h6>
				<div class="btn-group">
					<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fi fi-rr-menu-dots"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Onsite</a>
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Remote</a>
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Hybrid</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-body py-0 px-3 d-flex align-items-center justify-content-center">
				<div class="maxw-250px ratio ratio-1x1">
					<canvas id="employeeTypeChart"></canvas>
				</div>
			</div>
			<div class="card-footer pt-0 border-0">
				<div class="d-flex flex-wrap gap-2 justify-content-center">
					<div class="d-flex gap-1 align-items-center mx-1">
						<i class="fa fa-circle text-primary text-2xs"></i>
						<strong class="text-dark fw-semibold">800</strong> Onsite
					</div>
					<div class="d-flex gap-1 align-items-center mx-1">
						<i class="fa fa-circle text-secondary text-2xs"></i>
						<strong class="text-dark fw-semibold">105</strong> Remote
					</div>
					<div class="d-flex gap-1 align-items-center mx-1">
						<i class="fa fa-circle text-info text-2xs"></i>
						<strong class="text-dark fw-semibold">301</strong> Hybrid
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-4 col-md-6">
		<div class="card">
			<div class="card-header border-0 pb-0">
				<h6 class="card-title">Performance Analysis</h6>
			</div>
			<div class="card-body">
				<canvas id="performanceAnalysisChart" height="320"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header border-0 pb-0">
				<h6 class="card-title">Bar Chart</h6>
			</div>
			<div class="card-body">
				<canvas id="barChart" height="320"></canvas>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header border-0 pb-0">
				<h6 class="card-title">Line Chart</h6>
			</div>
			<div class="card-body">
				<canvas id="lineChart" height="320"></canvas>
			</div>
		</div>
	</div>
</div>
@endsection