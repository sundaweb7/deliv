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
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')

<div class="app-page-head d-flex flex-wrap gap-3 align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">
		<span class="text-primary">1206</span> Employee
		</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Employee</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
	<i class="fi fi-rr-plus me-1"></i> Add Employee
	</button>
</div>
<div class="card d-flex flex-row flex-wrap align-items-center h-auto mb-5">
	<ul class="nav nav-underline me-auto px-3 gap-2">
		<li class="nav-item">
			<a class="nav-link border-3 py-3 px-2 active" href="javascript:void(0);">Employee</a>
		</li>
		<li class="nav-item">
			<a class="nav-link border-3 py-3 px-2" href="{{ route('leave') }}">Leave Request</a>
		</li>
	</ul>
	<div class="d-flex ps-3">
		<div class="d-flex align-items-center me-4">
			<button class="btn btn-link p-0 me-3 text-primary">
			<i class="fi fi-rr-apps text-sm"></i>
			</button>
			<button class="btn btn-link p-0 text-body">
			<i class="fi fi-br-list text-sm"></i>
			</button>
		</div>
		<div class="vr"></div>
		<form class="d-flex align-items-center h-100 w-150px w-lg-300px position-relative" action="#">
			@csrf
			<button type="button" class="btn btn-sm border-0 position-absolute start-0 ms-3 p-0">
			<i class="fi fi-rr-search"></i>
			</button>
			<input type="text" class="form-control form-control-lg ps-5 rounded-start-0 border-0 shadow-none bg-transparent" placeholder="Search Employee">
		</form>
	</div>
</div>
<div class="row">
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-success-subtle text-success">Active</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large3.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Emma Smith</h5>
					<p class="text-primary mb-0">UI/UX Designer</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card bg-success-subtle border-0">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-success-subtle text-success">Active</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large1.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">William Johnson</h5>
					<p class="text-primary mb-0">Front-End Developer</p>
				</div>
				<div class="p-3 bg-body rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-danger-subtle text-danger">On Leave</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large8.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Benjamin Martinez</h5>
					<p class="text-primary mb-0">Web Designer</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-success-subtle text-success">Active</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large7.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Olivia Clark</h5>
					<p class="text-primary mb-0">Data Analyst</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-danger-subtle text-success">On Leave</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large5.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Ava Lewis</h5>
					<p class="text-primary mb-0">Front-End Developer</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-danger-subtle text-danger">On Leave</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large2.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Isabella Walker</h5>
					<p class="text-primary mb-0">UI/UX Designer</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-success-subtle text-success">Active</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large6.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Alexander Brown</h5>
					<p class="text-primary mb-0">Data Analyst</p>
				</div>
				<div class="p-3 bg-light rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4 col-md-6">
		<div class="card bg-danger-subtle border-0">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0 p-3">
				<span class="badge bg-danger-subtle text-danger">On Leave</span>
				<div class="clearfix">
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
			</div>
			<div class="card-body p-2 pt-0">
				<div class="text-center mb-3">
					<div class="avatar avatar-xxl rounded-4 mx-auto mb-3">
						<img src="{{ asset('assets/images/avatar/avatar-large4.jpg') }}" alt="">
					</div>
					<h5 class="mb-0 fw-bold">Sophia Hall</h5>
					<p class="text-primary mb-0">Front-End Developer</p>
				</div>
				<div class="p-3 bg-body rounded">
					<div class="d-flex gap-3">
						<div class="w-50">
							<span class="text-1xs">Department</span>
							<h6 class="mb-0">Designing Team</h6>
						</div>
						<div class="w-50">
							<span class="text-1xs">Hired Date</span>
							<h6 class="mb-0">12 Aug 2020</h6>
						</div>
					</div>
					<hr class="border-dashed">
					<div class="d-grid gap-2">
						<span class="d-block text-dark">
							<i class="fi fi-rr-envelope me-2 text-primary"></i>
							Info@example@mail.com
						</span>
						<span class="d-block text-dark">
							<i class="fi fi-rr-phone-call me-2 text-primary"></i>
							+01 987 654 3210
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<nav aria-label="pagination" class="float-end">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="javascript:void(0);" aria-label="Previous">
						<i class="fi fi-rr-angle-left me-1"></i>
						Previous
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="javascript:void(0);">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="javascript:void(0);">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="javascript:void(0);">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="javascript:void(0);" aria-label="Next">
						Next
						<i class="fi fi-rr-angle-right ms-1"></i>
					</a>
				</li>
			</ul>
		</nav>
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