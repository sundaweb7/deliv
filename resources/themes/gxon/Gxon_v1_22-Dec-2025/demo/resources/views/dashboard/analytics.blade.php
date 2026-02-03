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
	<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
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
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
	
<div class="app-page-head d-flex align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Analytics</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Analytics</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
	<i class="fi fi-rr-plus me-1"></i> Add Employee
	</button>
</div>
<div class="row">
	<div class="col-xl-6">
		<div class="card bg-warning bg-opacity-25 shadow-none border-0">
			<div class="card-body px-4 pb-0 pt-2">
				<div class="row g-0">
					<div class="col-sm-7 py-3 px-2">
						<h6 class="card-title fw-bold mb-2">Employee Satisfied</h6>
						<h2 class="text-secondary fs-1 fw-bolder mb-3">95.27%</h2>
						<p class="text-dark fw-semibold mb-0">There are currently <strong class="text-primary">1,204 employees</strong> who are satisfied with working in your office, an increase from last month.</p>
					</div>
					<div class="col-sm-5 text-center text-sm-end align-self-end">
						<img src="{{ asset('assets/images/media/svg/media2.svg') }}" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card bg-info bg-opacity-25 shadow-none border-0">
			<div class="card-body px-4 py-2">
				<div class="row g-0 align-items-center">
					<div class="col-md-5 py-3 px-2">
						<h6 class="card-title fw-bold mb-2">Task Status </h6>
						<p class="text-dark mb-4">
							<strong class="text-info">90%</strong> of the work was completed last week, a significant portion of the total task.
						</p>
						<a href="{{ route('task-management') }}" class="btn btn-info waves-effect waves-light">
							<i class="fi fi-rr-plus me-1"></i> Add Task
						</a>
					</div>
					<div class="col-md-7 text-center mb-3">
						<div id="taskStatusChart"></div>
						<span class="text-info fw-semibold mt-n5 d-block">421/500 Total task done</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Average Team KPI</h6>
				<button type="button" class="btn btn-sm btn-outline-light btn-shadow waves-effect">Download Report</button>
			</div>
			<div class="card-body p-2">
				<div class="d-flex align-items-end gap-1 px-2 mb-2">
					<h2 class="mb-0">65,276K</h2>
					<span class="text-success d-flex align-items-center">
						<i class="fi fi-rr-arrow-small-up"></i> +9%
					</span>
					<span>than last year</span>
				</div>
				<div id="averageTeamKPI"></div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6 col-lg-4 order-lg-1 order-xxl-0">
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
	<div class="col-xxl-3 col-md-6 col-lg-4 order-lg-1 order-xxl-0">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Team</h6>
				<div class="clearfix">
					<a href="javascript:void(0);" class="btn-link">View All</a>
				</div>
			</div>
			<div class="card-body px-3 pb-3">
				<ul class="list-group list-group-hover list-group-smooth list-group-space-sm">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="me-auto">
							<h6 class="mb-0">Marketing</h6>
							<small class="fw-medium text-body d-block">Member <span class="text-primary">03</span>
							</small>
						</div>
						<div class="avatar-group">
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
							</div>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="me-auto">
							<h6 class="mb-0">Development</h6>
							<small class="fw-medium text-body d-block">Member <span class="text-secondary">40</span>
							</small>
						</div>
						<div class="avatar-group">
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
							</div>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="me-auto">
							<h6 class="mb-0">Designing Team</h6>
							<small class="fw-medium text-body d-block">Member <span class="text-suc">03</span>
							</small>
						</div>
						<div class="avatar-group">
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
							</div>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="me-auto">
							<h6 class="mb-0">Management</h6>
							<small class="fw-medium text-body d-block">Member <span class="text-primary">02</span>
							</small>
						</div>
						<div class="avatar-group">
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
							</div>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="me-auto">
							<h6 class="mb-0">Finance</h6>
							<small class="fw-medium text-body d-block">Member <span class="text-primary">12</span>
							</small>
						</div>
						<div class="avatar-group">
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
							</div>
							<div class="avatar avatar-xs rounded-circle border border-2 border-white">
								<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xxl-5 col-lg-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0">
				<h6 class="card-title mb-0">Employee Performance</h6>
				<div class="dropdown">
					<button class="btn dropdown-toggle btn-white btn-shadow waves-effect btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Last Month
					</button>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Category</a>
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Published</a>
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0);">Date Modifed</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="card-body px-2 pb-2 pt-0">
				<table class="table table-sm table-borderless table-row-rounded mb-0">
					<thead class="table-light">
						<tr>
							<th>Name</th>
							<th>Score</th>
							<th class="text-end">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<div class="avatar rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Olivia Clark</h6>
										<small class="text-body">UI/UX Designer</small>
									</div>
								</div>
							</td>
							<td>
								<div id="employeeScore1"></div>
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
								<div class="d-flex align-items-center">
									<div class="avatar rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Michael Davis</h6>
										<small class="text-body">Full-Stack Developer</small>
									</div>
								</div>
							</td>
							<td>
								<div id="employeeScore2"></div>
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
								<div class="d-flex align-items-center">
									<div class="avatar rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Michael Davis</h6>
										<small class="text-body">Web Designer</small>
									</div>
								</div>
							</td>
							<td>
								<div id="employeeScore3"></div>
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
								<div class="d-flex align-items-center">
									<div class="avatar rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">David Wilson</h6>
										<small class="text-body">Back-End Developer</small>
									</div>
								</div>
							</td>
							<td>
								<div id="employeeScore4"></div>
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
	<div class="col-xxl-4 col-md-6 col-lg-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Recent Job Application</h6>
				<a href="javascript:void(0);" class="btn-link">View All</a>
			</div>
			<div class="card-body pb-3">
				<ul class="list-group list-group-hover list-group-smooth list-group-unlined list-group-outer">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="avatar rounded-circle me-1">
							<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
						</div>
						<div class="ms-2 me-auto">
							<h6 class="mb-0">Sophia Hall</h6>
							<small>Front-End Developer</small>
						</div>
						<div class="dropdown select-status">
							<button class="btn btn-sm btn-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Select Status
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
							</ul>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="avatar rounded-circle me-1">
							<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
						</div>
						<div class="ms-2 me-auto">
							<h6 class="mb-0">Emma Smith</h6>
							<small>Back-End Developer</small>
						</div>
						<div class="dropdown select-status">
							<button class="btn btn-sm btn-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Select Status
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
							</ul>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="avatar rounded-circle me-1">
							<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
						</div>
						<div class="ms-2 me-auto">
							<h6 class="mb-0">Olivia Clark</h6>
							<small>UI/UX Designer</small>
						</div>
						<div class="dropdown select-status">
							<button class="btn btn-sm btn-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Select Status
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
							</ul>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="avatar rounded-circle me-1">
							<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
						</div>
						<div class="ms-2 me-auto">
							<h6 class="mb-0">Ava Lewis</h6>
							<small>Web Designer</small>
						</div>
						<div class="dropdown select-status">
							<button class="btn btn-sm btn-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Select Status
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
							</ul>
						</div>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="avatar rounded-circle me-1">
							<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
						</div>
						<div class="ms-2 me-auto">
							<h6 class="mb-0">Isabella Walker</h6>
							<small>Full-Stack Developer</small>
						</div>
						<div class="dropdown select-status">
							<button class="btn btn-sm btn-secondary btn-sm dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							Select Status
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
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6 col-lg-4">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Upcoming Meetings</h6>
				<div class="d-flex gap-2">
					<button type="button" class="btn btn-sm btn-icon btn-action-primary waves-effect">
					<i class="fi fi-rr-plus text-2xs"></i>
					</button>
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
			</div>
			<div class="card-body gradient-layer" style="height: 325px;" data-simplebar>
				<div class="p-3 bg-light bg-opacity-50 mb-2 rounded">
					<div class="d-flex align-items-center justify-content-between">
						<h6 class="mb-0">Team Stand Up</h6>
						<div class="clearfix d-flex align-items-center">
							<div class="btn-group">
								<button class="btn btn-action-dark btn-sm btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						</div>
					</div>
					<div class="text-2xs d-flex gap-1 align-items-center">
						<img src="{{ asset('assets/images/icons/google-meet.svg') }}" alt="">
						<span>On Google Meet</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-3">
						<span class="badge bg-white text-dark fw-semibold">Marketing</span>
						<span class="text-primary text-2xs fw-semibold d-flex align-items-center">
							<i class="fi fi-rr-clock-three me-1"></i> 06:00 - 07:00
						</span>
					</div>
				</div>
				<div class="p-3 bg-light bg-opacity-50 mb-2 rounded">
					<div class="d-flex align-items-center justify-content-between">
						<h6 class="mb-0">All Hands Meeting</h6>
						<div class="clearfix d-flex align-items-center">
							<div class="btn-group">
								<button class="btn btn-action-dark btn-sm btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						</div>
					</div>
					<div class="text-2xs d-flex gap-1 align-items-center">
						<img src="{{ asset('assets/images/icons/google-meet.svg') }}" alt="">
						<span>On Google Meet</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-3">
						<span class="badge bg-white text-dark fw-semibold">Manager</span>
						<span class="text-primary text-2xs fw-semibold d-flex align-items-center">
							<i class="fi fi-rr-clock-three me-1"></i> 06:00 - 07:00
						</span>
					</div>
				</div>
				<div class="p-3 bg-light bg-opacity-50 mb-2 rounded">
					<div class="d-flex align-items-center justify-content-between">
						<h6 class="mb-0">Sprint Planning</h6>
						<div class="clearfix d-flex align-items-center">
							<div class="btn-group">
								<button class="btn btn-action-dark btn-sm btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						</div>
					</div>
					<div class="text-2xs d-flex gap-1 align-items-center">
						<img src="{{ asset('assets/images/icons/google-meet.svg') }}" alt="">
						<span>On Google Meet</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-3">
						<span class="badge bg-white text-dark fw-semibold">HR</span>
						<span class="text-primary text-2xs fw-semibold d-flex align-items-center">
							<i class="fi fi-rr-clock-three me-1"></i> 06:00 - 07:00
						</span>
					</div>
				</div>
				<div class="p-3 bg-light bg-opacity-50 mb-2 rounded">
					<div class="d-flex align-items-center justify-content-between">
						<h6 class="mb-0">Team Stand Up</h6>
						<div class="clearfix d-flex align-items-center">
							<div class="btn-group">
								<button class="btn btn-action-dark btn-sm btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						</div>
					</div>
					<div class="text-2xs d-flex gap-1 align-items-center">
						<img src="{{ asset('assets/images/icons/google-meet.svg') }}" alt="">
						<span>On Google Meet</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-3">
						<span class="badge bg-white text-dark fw-semibold">Marketing</span>
						<span class="text-primary text-2xs fw-semibold d-flex align-items-center">
							<i class="fi fi-rr-clock-three me-1"></i> 06:00 - 07:00
						</span>
					</div>
				</div>
				<div class="p-3 bg-light bg-opacity-50 mb-2 rounded">
					<div class="d-flex align-items-center justify-content-between">
						<h6 class="mb-0">All Hands Meeting</h6>
						<div class="clearfix d-flex align-items-center">
							<div class="btn-group">
								<button class="btn btn-action-dark btn-sm btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						</div>
					</div>
					<div class="text-2xs d-flex gap-1 align-items-center">
						<img src="{{ asset('assets/images/icons/google-meet.svg') }}" alt="">
						<span>On Google Meet</span>
					</div>
					<div class="d-flex justify-content-between align-items-center mt-3">
						<span class="badge bg-white text-dark fw-semibold">Manager</span>
						<span class="text-primary text-2xs fw-semibold d-flex align-items-center">
							<i class="fi fi-rr-clock-three me-1"></i> 06:00 - 07:00
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Add Employee</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="mb-3">
						<label for="fullName" class="form-label">Full Name</label>
						<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="email" class="form-label">Email Address</label>
							<input type="email" class="form-control" id="email" placeholder="example@email.com">
						</div>
						<div class="col-md-6 mb-3">
							<label for="phone" class="form-label">Phone Number</label>
							<input type="tel" class="form-control" id="phone" placeholder="+91 9876543210">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="department" class="form-label">Department</label>
							<select class="form-select" id="department">
								<option selected disabled>Select Department</option>
								<option>HR</option>
								<option>Development</option>
								<option>Sales</option>
								<option>Marketing</option>
							</select>
						</div>
						<div class="col-md-6 mb-3">
							<label for="designation" class="form-label">Designation</label>
							<input type="text" class="form-control" id="designation" placeholder="e.g. Software Engineer">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="joiningDate" class="form-label">Joining Date</label>
							<input type="date" class="form-control flatpickr-date" id="joiningDate">
						</div>
						<div class="col-md-6 mb-3">
							<label for="status" class="form-label">Employment Status</label>
							<select class="form-select" id="status">
								<option>Active</option>
								<option>Inactive</option>
								<option>Probation</option>
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label for="address" class="form-label">Address</label>
						<textarea class="form-control" id="address" rows="2" placeholder="Enter address"></textarea>
					</div>
					<div class="mb-3">
						<label for="photo" class="form-label">Profile Photo</label>
						<input class="form-control" type="file" id="photo">
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-success">Add Employee</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
@endsection