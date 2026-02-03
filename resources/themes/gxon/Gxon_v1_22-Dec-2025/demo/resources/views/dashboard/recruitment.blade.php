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
		<h1 class="app-page-title">Recruitment</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Recruitment</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createJobModal">
	<i class="fi fi-rr-plus me-1"></i> Create Job
	</button>
</div>
<div class="row">
	<div class="col-xxl-5">
		<div class="row">
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-secondary p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-secondary">
							<i class="fi fi-sr-shopping-bag fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Total Job Openings</div>
							<h3 class="mb-0 fw-bold">1,335</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-secondary position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-warning p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-warning">
							<i class="fi fi-sr-document fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Total Application</div>
							<h3 class="mb-0 fw-bold">35,002</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-warning position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-info p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-info">
							<i class="fi fi-sr-users fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Shortlisted </div>
							<h3 class="mb-0 fw-bold">20,273</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-info position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-primary p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-primary">
							<i class="fi fi-sr-headphones fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Interviewed </div>
							<h3 class="mb-0 fw-bold">12,240</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-primary position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-danger p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-danger">
							<i class="fi fi-sr-delete-user fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Rejected</div>
							<h3 class="mb-0 fw-bold">13,250</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-danger position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
			<div class="col-xxl-6 col-lg-4 col-sm-6">
				<div class="card card-action action-border-success p-1 position-relative">
					<div class="card-body d-flex gap-3 align-items-center p-4">
						<div class="clearfix pe-2 text-success">
							<i class="fi fi-ss-badget-check-alt fs-1"></i>
						</div>
						<div class="clearfix">
							<div class="mb-1">Hired</div>
							<h3 class="mb-0 fw-bold">2,724</h3>
						</div>
					</div>
					<a href="javascript:void(0);" class="action-visible link-success position-absolute bottom-0 end-0 mb-2 me-2">
						View All <i class="fi fi-rr-arrow-right ms-1"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-7">
		<div class="card bg-gray bg-opacity-10 border-0 shadow-none">
			<div class="card-header d-flex gap-3 flex-wrap align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Interview Schedule</h6>
				<div class="clearfix d-flex align-items-center">
					<a href="javascript:void(0);" class="btn-link me-4">View All</a>
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
			</div>
			<div class="card-body px-3 pb-2">
				<div class="row gx-2">
					<div class="col-md-6">
						<ul class="list-group list-group-smooth list-group-unlined mb-0">
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">William Johnson</h6>
									<small class="text-body">Web Designer</small>
								</div>
								<span class="badge badge-lg bg-danger-subtle text-danger">12.30 PM</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">Alexander Brown</h6>
									<small class="text-body">Front-End Developer</small>
								</div>
								<span class="badge badge-lg bg-primary-subtle text-primary">24 July 2024</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">Michael Davis</h6>
									<small class="text-body">UI/UX Designer</small>
								</div>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">11.00 AM</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">David Wilson</h6>
									<small class="text-body">Back-End Developer</small>
								</div>
								<span class="badge badge-lg bg-success-subtle text-success">12.30 PM</span>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group list-group-smooth list-group-unlined mb-0">
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">David Wilson</h6>
									<small class="text-body">Back-End Developer</small>
								</div>
								<span class="badge badge-lg bg-success-subtle text-success">12.30 - 02.30</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">William Johnson</h6>
									<small class="text-body">Web Designer</small>
								</div>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">10.30 AM</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">Alexander Brown</h6>
									<small class="text-body">Front-End Developer</small>
								</div>
								<span class="badge badge-lg bg-primary-subtle text-primary">24 July 2024</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-2">
								<div class="avatar rounded-circle me-1">
									<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
								</div>
								<div class="ms-2 me-auto">
									<h6 class="mb-0">Michael Davis</h6>
									<small class="text-body">UI/UX Designer</small>
								</div>
								<span class="badge badge-lg bg-secondary-subtle text-secondary">25 Dec 2024</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 my-3">
		<h5 class="fw-bold mb-0">Current Vacancy <span class="text-primary ms-1 text-2xs">74 Job Added</span>
		</h5>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-elevate bg-primary-subtle border-0 shadow-none">
			<div class="card-body">
				<div class="d-flex gap-3 align-items-center mb-4">
					<div class="avatar bg-body rounded-3 p-2">
						<img src="{{ asset('assets/images/media/figma.png') }}" alt="">
					</div>
					<div class="clearfix">
						<h6 class="mb-1 text-sm">Figma Designer</h6>
						<ul class="list-inline list-inline-disc d-flex mb-0">
							<li>Full Time</li>
							<li>Remote</li>
						</ul>
					</div>
				</div>
				<div class="bg-body p-3 rounded-3 mb-3 d-flex">
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">76</h2>
						<span class="text-primary">Applied</span>
					</div>
					<div class="vr"></div>
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">14</h2>
						<span class="text-primary">New</span>
					</div>
				</div>
				<div class="d-flex justify-content-between gap-2 pt-1 mb-3">
					<div class="text-start">
						<span class="text-1xs">Salary</span>
						<span class="text-sm text-dark d-block fw-semibold">$100K - $200K</span>
					</div>
					<div class="text-end">
						<span class="text-1xs">Location</span>
						<span class="text-sm text-dark d-block fw-semibold">USA</span>
					</div>
				</div>
				<a href="{{ route('blog') }}" class="btn btn-primary waves-effect waves-light w-100">
					See Job Post
				</a>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-elevate bg-secondary-subtle border-0 shadow-none">
			<div class="card-body">
				<div class="d-flex gap-3 align-items-center mb-4">
					<div class="avatar bg-body rounded-3 p-2">
						<img src="{{ asset('assets/images/media/python.png') }}" alt="">
					</div>
					<div class="clearfix">
						<h6 class="mb-1 text-sm">Python Developer </h6>
						<ul class="list-inline list-inline-disc d-flex mb-0">
							<li>Full Time</li>
							<li>Remote</li>
						</ul>
					</div>
				</div>
				<div class="bg-body p-3 rounded-3 mb-3 d-flex">
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">12</h2>
						<span class="text-primary">Applied</span>
					</div>
					<div class="vr"></div>
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">07</h2>
						<span class="text-primary">New</span>
					</div>
				</div>
				<div class="d-flex justify-content-between gap-2 pt-1 mb-3">
					<div class="text-start">
						<span class="text-1xs">Salary</span>
						<span class="text-sm text-dark d-block fw-semibold">$100K - $200K</span>
					</div>
					<div class="text-end">
						<span class="text-1xs">Location</span>
						<span class="text-sm text-dark d-block fw-semibold">USA</span>
					</div>
				</div>
				<a href="{{ route('blog') }}" class="btn btn-primary waves-effect waves-light w-100">
					See Job Post
				</a>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-elevate bg-info-subtle border-0 shadow-none">
			<div class="card-body">
				<div class="d-flex gap-3 align-items-center mb-4">
					<div class="avatar bg-body rounded-3 p-2">
						<img src="{{ asset('assets/images/media/code.png') }}" alt="">
					</div>
					<div class="clearfix">
						<h6 class="mb-1 text-sm">Web Developer</h6>
						<ul class="list-inline list-inline-disc d-flex mb-0">
							<li>Full Time</li>
							<li>Remote</li>
						</ul>
					</div>
				</div>
				<div class="bg-body p-3 rounded-3 mb-3 d-flex">
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">99</h2>
						<span class="text-primary">Applied</span>
					</div>
					<div class="vr"></div>
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">23</h2>
						<span class="text-primary">New</span>
					</div>
				</div>
				<div class="d-flex justify-content-between gap-2 pt-1 mb-3">
					<div class="text-start">
						<span class="text-1xs">Salary</span>
						<span class="text-sm text-dark d-block fw-semibold">$100K - $200K</span>
					</div>
					<div class="text-end">
						<span class="text-1xs">Location</span>
						<span class="text-sm text-dark d-block fw-semibold">USA</span>
					</div>
				</div>
				<a href="{{ route('blog') }}" class="btn btn-primary waves-effect waves-light w-100">
					See Job Post
				</a>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card card-action action-elevate bg-success-subtle border-0 shadow-none">
			<div class="card-body">
				<div class="d-flex gap-3 align-items-center mb-4">
					<div class="avatar bg-body rounded-3 p-2">
						<img src="{{ asset('assets/images/media/react.png') }}" alt="">
					</div>
					<div class="clearfix">
						<h6 class="mb-1 text-sm">React Developer</h6>
						<ul class="list-inline list-inline-disc d-flex mb-0">
							<li>Full Time</li>
							<li>Remote</li>
						</ul>
					</div>
				</div>
				<div class="bg-body p-3 rounded-3 mb-3 d-flex">
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">46</h2>
						<span class="text-primary">Applied</span>
					</div>
					<div class="vr"></div>
					<div class="text-center w-50">
						<h2 class="fs-1 fw-bold mb-1">61</h2>
						<span class="text-primary">New</span>
					</div>
				</div>
				<div class="d-flex justify-content-between gap-2 pt-1 mb-3">
					<div class="text-start">
						<span class="text-1xs">Salary</span>
						<span class="text-sm text-dark d-block fw-semibold">$100K - $200K</span>
					</div>
					<div class="text-end">
						<span class="text-1xs">Location</span>
						<span class="text-sm text-dark d-block fw-semibold">USA</span>
					</div>
				</div>
				<a href="{{ route('blog') }}" class="btn btn-primary waves-effect waves-light w-100">
					See Job Post
				</a>
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
							<th class="minw-50px pe-0">
								<div class="form-check">
									<input class="form-check-input" data-row-checkbox type="checkbox">
								</div>
							</th>
							<th class="minw-200px">Name</th>
							<th class="minw-200px">Department</th>
							<th class="minw-150px">Phone No.</th>
							<th class="minw-200px">Mail ID</th>
							<th class="minw-150px">Status</th>
							<th class="minw-200px">Interview schedule</th>
							<th class="minw-100px text-end">Action</th>
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-success">Completed</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-success">Completed</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-danger">Rejected</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule 2nd Round</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-danger dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger" data-selected="true">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-danger">Rejected</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-success">Completed</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-success">Completed</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-danger">Rejected</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule 2nd Round</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-success">Completed</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-danger">Rejected</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
							<td>+01 789 456 3201</td>
							<td>example@mail.com </td>
							<td>
								<div class="dropdown select-status">
									<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Select Status
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Hired</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">Shortlisted</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">Interviewed</a>
										</li>
										<li>
											<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-danger">Reject</a>
										</li>
									</ul>
								</div>
							</td>
							<td>
								<span class="badge badge-lg bg-info">Schedule 2nd Round</span>
							</td>
							<td>
								<div class="d-flex gap-2 justify-content-end">
									<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button">
									<i class="fi fi-rr-eye"></i>
									</button>
									<div class="btn-group">
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
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="createJobModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header py-3">
				<h5 class="modal-title">Create Job</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
					<div class="mb-3">
						<label for="jobTitle" class="form-label">Job Title</label>
						<input type="text" class="form-control" id="jobTitle" placeholder="Enter job title">
					</div>
					<div class="mb-3">
						<label for="jobDepartment" class="form-label">Department</label>
						<select class="form-select" id="jobDepartment">
							<option selected disabled>Select department</option>
							<option>Human Resources</option>
							<option>Marketing</option>
							<option>Development</option>
							<option>Sales</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="jobType" class="form-label">Job Type</label>
						<select class="form-select" id="jobType">
							<option selected disabled>Select type</option>
							<option>Full-time</option>
							<option>Part-time</option>
							<option>Internship</option>
							<option>Contract</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="location" class="form-label">Location</label>
						<input type="text" class="form-control" id="location" placeholder="Enter location">
					</div>
					<div class="mb-3">
						<label for="salaryRange" class="form-label">Salary Range</label>
						<input type="text" class="form-control" id="salaryRange" placeholder="$40,000 - $60,000">
					</div>
					<div class="mb-3">
						<label for="flatpickr_basic" class="form-label">Application Deadline</label>
						<input type="date" class="form-control" id="flatpickr_basic">
					</div>
					<div class="mb-3">
						<label for="jobDescription" class="form-label">Job Description</label>
						<textarea class="form-control" id="jobDescription" rows="4" placeholder="Enter job responsibilities and requirements"></textarea>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-primary waves-effect waves-light">Post Job</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
@endsection