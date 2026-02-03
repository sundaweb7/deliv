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
	<h1 class="app-page-title">Table</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Table</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Table Basic</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-border-bottom-0 mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Table Dark</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-dark table-border-bottom-0 mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="border rounded-2 mb-4">
			<div class="border-bottom p-3">
				<h6 class="card-title">Table without Card</h6>
			</div>
			<div class="table-responsive">
				<table class="table table-border-bottom-0 mb-0">
					<thead>
						<tr>
							<th class="minw-200px">Name</th>
							<th class="minw-200px">Department</th>
							<th class="minw-100px">Total Days</th>
							<th class="minw-150px">Working Day</th>
							<th class="minw-150px">Total Salary</th>
							<th class="minw-100px">Over Time</th>
							<th class="minw-100px">Status</th>
							<th class="text-end">Action</th>
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
							<td>Back-End Developer</td>
							<td>30 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$1500</td>
							<td>
								<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<td>Full-Stack Developer</td>
							<td>29 Dyas</td>
							<td>18 Days</td>
							<td>
								<span class="fw-semibold">$21,2500</span>
							</td>
							<td>$1800</td>
							<td>
								<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<td>Mobile App Developer</td>
							<td>28 Dyas</td>
							<td>4 Days</td>
							<td>
								<span class="fw-semibold">$22,250</span>
							</td>
							<td>$2900</td>
							<td>
								<span class="badge bg-danger-subtle text-danger">Reject</span>
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
							<td>UI/UX Designer</td>
							<td>27 Dyas</td>
							<td>27 Days</td>
							<td>
								<span class="fw-semibold">$86,000</span>
							</td>
							<td>$400</td>
							<td>
								<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
							<td>DevOps Engineer</td>
							<td>26 Dyas</td>
							<td>30 Days</td>
							<td>
								<span class="fw-semibold">$12,000</span>
							</td>
							<td>$700</td>
							<td>
								<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Hoverable rows</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover table-border-bottom-0 mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Table striped</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-striped table-border-bottom-0 mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Bordered tables</h6>
			</div>
			<div class="card-body p-2">
				<div class="table-responsive">
					<table class="table table-bordered mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Tables without borders</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Small tables</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-sm mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Tables Nesting </h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td colspan="8">
									<table class="table table-light table-border-bottom-0 mb-0">
										<thead>
											<tr>
												<th>Name</th>
												<th>Department</th>
												<th>Total Days</th>
												<th>Working Day</th>
												<th>Total Salary</th>
												<th>Over Time</th>
												<th>Status</th>
												<th class="text-end">Action</th>
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
												<td>Back-End Developer</td>
												<td>30 Dyas</td>
												<td>27 Days</td>
												<td>
													<span class="fw-semibold">$22,250</span>
												</td>
												<td>$1500</td>
												<td>
													<span class="badge bg-primary-subtle text-primary">Completed</span>
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
												<td>Full-Stack Developer</td>
												<td>29 Dyas</td>
												<td>18 Days</td>
												<td>
													<span class="fw-semibold">$21,2500</span>
												</td>
												<td>$1800</td>
												<td>
													<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Tables variants</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-borderless mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-primary">
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
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<tr class="table-secondary">
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
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<tr class="table-success">
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
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
							<tr class="table-danger">
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
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
							<tr class="table-warning">
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
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
							<tr class="table-info">
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
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<tr class="table-light">
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
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
							<tr class="table-dark">
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
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
	<div class="col-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h6 class="card-title mb-0">Table Responsive</h6>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-border-bottom-0 mb-0">
						<thead>
							<tr>
								<th class="minw-200px">Name</th>
								<th class="minw-200px">Department</th>
								<th class="minw-100px">Total Days</th>
								<th class="minw-150px">Working Day</th>
								<th class="minw-150px">Total Salary</th>
								<th class="minw-100px">Over Time</th>
								<th class="minw-100px">Status</th>
								<th class="text-end">Action</th>
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
								<td>Back-End Developer</td>
								<td>30 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$1500</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Full-Stack Developer</td>
								<td>29 Dyas</td>
								<td>18 Days</td>
								<td>
									<span class="fw-semibold">$21,2500</span>
								</td>
								<td>$1800</td>
								<td>
									<span class="badge bg-primary-subtle text-primary">Completed</span>
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
								<td>Mobile App Developer</td>
								<td>28 Dyas</td>
								<td>4 Days</td>
								<td>
									<span class="fw-semibold">$22,250</span>
								</td>
								<td>$2900</td>
								<td>
									<span class="badge bg-danger-subtle text-danger">Reject</span>
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
								<td>UI/UX Designer</td>
								<td>27 Dyas</td>
								<td>27 Days</td>
								<td>
									<span class="fw-semibold">$86,000</span>
								</td>
								<td>$400</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
								<td>DevOps Engineer</td>
								<td>26 Dyas</td>
								<td>30 Days</td>
								<td>
									<span class="fw-semibold">$12,000</span>
								</td>
								<td>$700</td>
								<td>
									<span class="badge bg-secondary-subtle text-secondary">Pending</span>
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
</div>
@endsection