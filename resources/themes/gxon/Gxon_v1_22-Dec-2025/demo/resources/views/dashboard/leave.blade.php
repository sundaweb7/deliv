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
		<h1 class="app-page-title">Leaves</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Leaves</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addLeaveModal">
	<i class="fi fi-rr-plus me-1"></i> Add Leave
	</button>
</div>
<div class="row">
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-border-primary">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="clearfix ps-2">
					<div class="d-flex text-dark align-items-end gap-1 lh-1 mb-1">
						<span class="fs-2 fw-bold">1192</span>
						<span class="mb-1">/1206</span>
					</div>
					<span class="text-primary">Today Presents</span>
				</div>
				<div class="clearfix">
					<div id="leavesPresentsScore"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-border-danger">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="clearfix ps-2">
					<div class="d-flex text-dark align-items-end gap-1 lh-1 mb-1">
						<span class="fs-2 fw-bold">128</span>
						<span class="mb-1">1206</span>
					</div>
					<span class="text-danger">Planned Leaves</span>
				</div>
				<div class="clearfix">
					<div id="leavesPlannedScore"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-border-info">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="clearfix ps-2">
					<div class="d-flex text-dark align-items-end gap-1 lh-1 mb-1">
						<span class="fs-2 fw-bold">12</span>
						<span class="mb-1">/1206</span>
					</div>
					<span class="text-info">Unplanned Leaves</span>
				</div>
				<div class="clearfix">
					<div id="leavesUnplannedScore"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-border-secondary">
			<div class="card-body d-flex justify-content-between align-items-center">
				<div class="clearfix ps-2">
					<div class="d-flex text-dark align-items-end gap-1 lh-1 mb-1">
						<span class="fs-2 fw-bold">50</span>
						<span class="mb-1">/70</span>
					</div>
					<span class="text-secondary">Pending Requests</span>
				</div>
				<div class="clearfix">
					<div id="leavesPendingScore"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card overflow-hidden">
			<div class="card-header d-flex gap-3 flex-wrap align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Employee’s Leave</h6>
				<div class="d-flex gap-3 flex-wrap">
					<div id="dt_PageEmployeeLeave_Search"></div>
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
				<table id="dt_PageEmployeeLeave" class="table display table-row-rounded">
					<thead class="table-light">
						<tr>
							<th class="minw-200px">Name</th>
							<th class="minw-150px">Leave Type</th>
							<th class="minw-200px">Department</th>
							<th class="minw-150px">Days</th>
							<th class="minw-150px">Start</th>
							<th class="minw-150px">End</th>
							<th class="minw-100px">Status</th>
							<th class="minw-100px text-end">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Back-End Developer</td>
							<td>2 Days</td>
							<td>12 July 2024</td>
							<td>15 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">William Johnson</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>Full-Stack Developer</td>
							<td>1st Half Day</td>
							<td>03 July 2024</td>
							<td>04 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Benjamin Martinez</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Mobile App Developer</td>
							<td>4 Days</td>
							<td>27 July 2024</td>
							<td>31 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									New
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Michael Davis</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>UI/UX Designer</td>
							<td>2nd Half Day</td>
							<td>05 June 2024</td>
							<td>04 June 2025</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-outline-light btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Pending
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Matthew Taylor</div>
								</div>
							</td>
							<td>
								<span class="text-warning">Paternity Leave</span>
							</td>
							<td>DevOps Engineer</td>
							<td>1 Days</td>
							<td>04 Aug 2024</td>
							<td>05 Aug 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">David Wilson</div>
								</div>
							</td>
							<td>
								<span class="text-warning">Paternity Leave</span>
							</td>
							<td>DevOps Engineer</td>
							<td>22 Days</td>
							<td>04 Aug 2024</td>
							<td>04 Aug 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Anthony Thomas</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Back-End Developer</td>
							<td>2 Days</td>
							<td>12 July 2024</td>
							<td>15 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									New
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Christopher Moore</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>Full-Stack Developer</td>
							<td>1st Half Day</td>
							<td>03 July 2024</td>
							<td>04 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Emma Smith</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Mobile App Developer</td>
							<td>4 Days</td>
							<td>27 July 2024</td>
							<td>31 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>UI/UX Designer</td>
							<td>2nd Half Day</td>
							<td>05 June 2024</td>
							<td>05 June 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-outline-light btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Pending
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Back-End Developer</td>
							<td>2 Days</td>
							<td>12 July 2024</td>
							<td>15 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">William Johnson</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>Full-Stack Developer</td>
							<td>1st Half Day</td>
							<td>03 July 2024</td>
							<td>04 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Benjamin Martinez</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Mobile App Developer</td>
							<td>4 Days</td>
							<td>27 July 2024</td>
							<td>31 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									New
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Michael Davis</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>UI/UX Designer</td>
							<td>2nd Half Day</td>
							<td>05 June 2024</td>
							<td>04 June 2025</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-outline-light btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Pending
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Matthew Taylor</div>
								</div>
							</td>
							<td>
								<span class="text-warning">Paternity Leave</span>
							</td>
							<td>DevOps Engineer</td>
							<td>1 Days</td>
							<td>04 Aug 2024</td>
							<td>05 Aug 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">David Wilson</div>
								</div>
							</td>
							<td>
								<span class="text-warning">Paternity Leave</span>
							</td>
							<td>DevOps Engineer</td>
							<td>22 Days</td>
							<td>04 Aug 2024</td>
							<td>04 Aug 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Anthony Thomas</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Back-End Developer</td>
							<td>2 Days</td>
							<td>12 July 2024</td>
							<td>15 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									New
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Christopher Moore</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>Full-Stack Developer</td>
							<td>1st Half Day</td>
							<td>03 July 2024</td>
							<td>04 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Approved
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">Emma Smith</div>
								</div>
							</td>
							<td>
								<span class="text-success">Casual Leave</span>
							</td>
							<td>Mobile App Developer</td>
							<td>4 Days</td>
							<td>27 July 2024</td>
							<td>31 July 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Rejected
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xxs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">James Anderson</div>
								</div>
							</td>
							<td>
								<span class="text-body">Maternity Leave</span>
							</td>
							<td>UI/UX Designer</td>
							<td>2nd Half Day</td>
							<td>05 June 2024</td>
							<td>05 June 2024</td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-outline-light btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Pending
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-outline-light" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Approved</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Rejected</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">New</a>
										</li>
									</ul>
								</div>
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
<div class="modal fade" id="addLeaveModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Add Leave Request</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="mb-3">
						<label for="employeeName" class="form-label">Employee Name</label>
						<input type="text" class="form-control" id="employeeName" placeholder="Enter employee name">
					</div>
					<div class="mb-3">
						<label for="leaveType" class="form-label">Leave Type</label>
						<select class="form-select" id="leaveType">
							<option selected disabled>Select leave type</option>
							<option>Casual Leave</option>
							<option>Sick Leave</option>
							<option>Earned Leave</option>
							<option>Maternity Leave</option>
							<option>Other</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="flatpickr_range" class="form-label">Select Date</label>
						<input type="datetime-local" id="flatpickr_range" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="leaveReason" class="form-label">Reason</label>
						<textarea class="form-control" id="leaveReason" rows="3" placeholder="Enter leave reason"></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Status</label>
						<select class="form-select">
							<option>Pending</option>
							<option>Approved</option>
							<option>Rejected</option>
						</select>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-success">Submit Leave</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
@endsection