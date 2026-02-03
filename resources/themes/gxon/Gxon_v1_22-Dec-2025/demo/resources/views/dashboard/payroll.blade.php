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
		<h1 class="app-page-title">Payroll</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Payroll</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addPayrollModal">
	<i class="fi fi-rr-plus me-1"></i> Add Payroll
	</button>
</div>
<div class="row">
	<div class="col-xxl-7 col-xl-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Payroll Summary</h6>
				<select class="selectpicker" data-style="btn-sm btn-outline-light btn-shadow waves-effect">
					<option>Yearly</option>
					<option>Monthly</option>
					<option>Weekly</option>
				</select>
			</div>
			<div class="card-body px-0 py-2">
				<div id="chartPayrollSummary"></div>
			</div>
		</div>
	</div>
	<div class="col-xxl-5 col-xl-6">
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
	<div class="col-lg-12">
		<div class="card overflow-hidden">
			<div class="card-header d-flex gap-3 flex-wrap align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Payroll List</h6>
				<div class="d-flex gap-3 flex-wrap">
					<div id="dt_PayrollList_Search"></div>
					<button type="button" class="btn btn-sm btn-outline-light btn-shadow waves-effect">Download Report</button>
					<select class="selectpicker" data-style="btn-sm btn-outline-light btn-shadow waves-effect">
						<option value="pending">2024</option>
						<option>2023</option>
						<option>2022</option>
						<option>2021</option>
					</select>
				</div>
			</div>
			<div class="card-body p-2">
				<table id="dt_PayrollList" class="table display table-row-rounded data-row-checkbox">
					<thead class="table-light">
						<tr>
							<th class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-row-checkbox type="checkbox">
								</div>
							</th>
							<th class="minw-200px">Name</th>
							<th class="minw-200px">Department</th>
							<th class="minw-150px">Total Days</th>
							<th class="minw-150px">Working Day</th>
							<th class="minw-150px">Total Salary</th>
							<th class="minw-150px">Over Time</th>
							<th>Status</th>
							<th class="text-end">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>Back-End Developer</td>
							<td>30 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">William Johnson</div>
								</div>
							</td>
							<td>Full-Stack Developer</td>
							<td>29 Dyas</td>
							<td>18 Days</td>
							<td>
								<span class="fw-semibold">$21,2500</span>
							</td>
							<td>$1800</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Benjamin Martinez</div>
								</div>
							</td>
							<td>Mobile App Developer</td>
							<td>28 Dyas</td>
							<td>4 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$2900</td>
							<td>
								<span class="badge badge-lg bg-danger-subtle text-danger">Reject</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Michael Davis</div>
								</div>
							</td>
							<td>UI/UX Designer</td>
							<td>27 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$86,000</span>
							</td>
							<td>$400</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Matthew Taylor</div>
								</div>
							</td>
							<td>DevOps Engineer</td>
							<td>26 Dyas</td>
							<td>30 Days</td>
							<td>
								<span class="fw-semibold">$12,000</span>
							</td>
							<td>$700</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">David Wilson</div>
								</div>
							</td>
							<td>DevOps Engineer</td>
							<td>25 Dyas</td>
							<td>22 Days</td>
							<td>
								<span class="fw-semibold">$30,000</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Anthony Thomas</div>
								</div>
							</td>
							<td>Back-End Developer</td>
							<td>24 Dyas</td>
							<td>22 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$3000</td>
							<td>
								<span class="badge badge-lg bg-danger-subtle text-danger">Reject</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Christopher Moore</div>
								</div>
							</td>
							<td>Full-Stack Developer</td>
							<td>23 Dyas</td>
							<td>2 Days</td>
							<td>
								<span class="fw-semibold">$75,200</span>
							</td>
							<td>$1400</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Emma Smith</div>
								</div>
							</td>
							<td>Mobile App Developer</td>
							<td>22 Dyas</td>
							<td>24 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$800</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>UI/UX Designer</td>
							<td>21 Dyas</td>
							<td>4 Days</td>
							<td>
								<span class="fw-semibold">$45,000</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>Back-End Developer</td>
							<td>30 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">William Johnson</div>
								</div>
							</td>
							<td>Full-Stack Developer</td>
							<td>29 Dyas</td>
							<td>18 Days</td>
							<td>
								<span class="fw-semibold">$21,2500</span>
							</td>
							<td>$1800</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Benjamin Martinez</div>
								</div>
							</td>
							<td>Mobile App Developer</td>
							<td>28 Dyas</td>
							<td>4 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$2900</td>
							<td>
								<span class="badge badge-lg bg-danger-subtle text-danger">Reject</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Michael Davis</div>
								</div>
							</td>
							<td>UI/UX Designer</td>
							<td>27 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$86,000</span>
							</td>
							<td>$400</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Matthew Taylor</div>
								</div>
							</td>
							<td>DevOps Engineer</td>
							<td>26 Dyas</td>
							<td>30 Days</td>
							<td>
								<span class="fw-semibold">$12,000</span>
							</td>
							<td>$700</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">David Wilson</div>
								</div>
							</td>
							<td>DevOps Engineer</td>
							<td>25 Dyas</td>
							<td>22 Days</td>
							<td>
								<span class="fw-semibold">$30,000</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Anthony Thomas</div>
								</div>
							</td>
							<td>Back-End Developer</td>
							<td>24 Dyas</td>
							<td>22 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$3000</td>
							<td>
								<span class="badge badge-lg bg-danger-subtle text-danger">Reject</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Christopher Moore</div>
								</div>
							</td>
							<td>Full-Stack Developer</td>
							<td>23 Dyas</td>
							<td>2 Days</td>
							<td>
								<span class="fw-semibold">$75,200</span>
							</td>
							<td>$1400</td>
							<td>
								<span class="badge badge-lg bg-primary-subtle text-primary">Completed</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Emma Smith</div>
								</div>
							</td>
							<td>Mobile App Developer</td>
							<td>22 Dyas</td>
							<td>24 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$800</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="pe-0">
								<div class="form-check">
									<input class="form-check-input" data-checkbox type="checkbox">
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>UI/UX Designer</td>
							<td>21 Dyas</td>
							<td>4 Days</td>
							<td>
								<span class="fw-semibold">$45,000</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">Pending</span>
							</td>
							<td>
								<div class="btn-group float-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fi fi-rr-menu-dots"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addPayrollModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Add Payroll</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="mb-3">
						<label for="employee" class="form-label">Employee Name</label>
						<input type="text" class="form-control" id="employee" placeholder="Enter employee name">
					</div>
					<div class="mb-3">
						<label for="flatpickr_basic" class="form-label">Select Pay Date</label>
						<input type="month" class="form-control" id="flatpickr_basic">
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="basicSalary" class="form-label">Basic Salary</label>
							<input type="number" class="form-control" id="basicSalary" placeholder="₹50000">
						</div>
						<div class="col-md-6 mb-3">
							<label for="hra" class="form-label">HRA</label>
							<input type="number" class="form-control" id="hra" placeholder="₹10000">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="bonus" class="form-label">Bonus</label>
							<input type="number" class="form-control" id="bonus" placeholder="₹5000">
						</div>
						<div class="col-md-6 mb-3">
							<label for="deductions" class="form-label">Deductions</label>
							<input type="number" class="form-control" id="deductions" placeholder="₹2000">
						</div>
					</div>
					<div class="mb-3">
						<label for="netPay" class="form-label">Net Pay</label>
						<input type="text" class="form-control" id="netPay" placeholder="Auto-calculated" readonly>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-primary">Generate Payroll</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
@endsection