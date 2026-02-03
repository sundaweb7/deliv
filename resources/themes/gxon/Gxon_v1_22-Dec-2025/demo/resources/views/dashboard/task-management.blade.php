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
	<script src="{{ asset('assets/libs/sortable/Sortable.min.js') }}"></script>
	<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('assets/js/task.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
	
<div class="app-page-head d-flex flex-wrap gap-3 align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Task Management</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Task Management</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addTaskModal">
	<i class="fi fi-rr-plus me-1"></i> Add Task
	</button>
</div>
<div class="card d-flex flex-row flex-wrap align-items-center h-auto mb-5">
	<ul class="nav nav-underline me-auto px-3 gap-2">
		<li class="nav-item">
			<a class="nav-link border-3 py-3 px-2 active" href="javascript:void(0);">Overview</a>
		</li>
		<li class="nav-item">
			<a class="nav-link border-3 py-3 px-2" href="javascript:void(0);">Timeline</a>
		</li>
		<li class="nav-item">
			<a class="nav-link border-3 py-3 px-2" href="{{ route('calendar') }}">Calendar</a>
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
			<input type="text" class="form-control form-control-lg ps-5 rounded-start-0 border-0 shadow-none bg-transparent" placeholder="Search Task">
		</form>
	</div>
</div>
<div class="row" id="taskWrapper">
	<div class="col-xxl-3 col-md-6">
		<div class="card bg-primary-subtle border-0 shadow-none border-top border-3 border-primary h-auto">
			<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">New Task</h6>
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
								<a class="dropdown-item" href="javascript:void(0);">Add</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Edit</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body p-3 d-grid gap-3" id="taskWrapper1">
				<div class="card card-action cursor-move action-border-primary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Hero Section Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-primary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-primary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
							<div class="avatar-group">
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
								</div>
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-primary-subtle text-primary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Select Status
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-primary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Logo Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-primary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-primary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-primary-subtle text-primary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Select Status
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-primary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Banner Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-primary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-primary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-primary-subtle text-primary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-primary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Select Status
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary" data-selected="true">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card bg-info-subtle border-0 shadow-none border-top border-3 border-info h-auto">
			<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">In Progress</h6>
				<div class="d-flex gap-2">
					<button type="button" class="btn btn-sm btn-icon btn-action-info waves-effect">
					<i class="fi fi-rr-plus text-2xs"></i>
					</button>
					<div class="btn-group">
						<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fi fi-rr-menu-dots"></i>
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Add</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Edit</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body p-3 d-grid gap-3" id="taskWrapper2">
				<div class="card card-action cursor-move action-border-info h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Website Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-info waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-info-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-info" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
							<div class="avatar-group">
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
								</div>
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-info-subtle text-info border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								In Progress
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-info h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Logo Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-info waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-info-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-info" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
							<div class="avatar-group">
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
								</div>
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-info-subtle text-info border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								In Progress
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-info h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Web Development</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-info waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-info-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-info" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
							<div class="avatar-group">
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								</div>
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-info-subtle text-info border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-info dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								In Progress
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info" data-selected="true">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card bg-secondary-subtle border-0 shadow-none border-top border-3 border-secondary h-auto">
			<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Pending</h6>
				<div class="d-flex gap-2">
					<button type="button" class="btn btn-sm btn-icon btn-action-secondary waves-effect">
					<i class="fi fi-rr-plus text-2xs"></i>
					</button>
					<div class="btn-group">
						<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fi fi-rr-menu-dots"></i>
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Add</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Edit</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body p-3 d-grid gap-3" id="taskWrapper3">
				<div class="card card-action cursor-move action-border-secondary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Banner Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-secondary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-secondary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-secondary" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-secondary-subtle text-secondary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Pending
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-secondary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Logo Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-secondary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-secondary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-secondary" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
							<div class="avatar-group">
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
								</div>
								<div class="avatar avatar-xs rounded-circle border border-2 border-white">
									<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								</div>
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-secondary-subtle text-secondary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Pending
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move cursor-move action-border-secondary h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Website Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-secondary waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-secondary-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-secondary" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-secondary-subtle text-secondary border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-secondary dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Pending
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary" data-selected="true">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-md-6">
		<div class="card bg-success-subtle border-0 shadow-none border-top border-3 border-success h-auto">
			<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Complete</h6>
				<div class="d-flex gap-2">
					<button type="button" class="btn btn-sm btn-icon btn-action-success waves-effect">
					<i class="fi fi-rr-plus text-2xs"></i>
					</button>
					<div class="btn-group">
						<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fi fi-rr-menu-dots"></i>
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Add</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Edit</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body p-3 d-grid gap-3" id="taskWrapper4">
				<div class="card card-action cursor-move action-border-success h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">React Development</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-success waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-success-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-success" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-success-subtle text-success border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Done
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-success h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Banner Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-success waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-success-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-success" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-success-subtle text-success border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Done
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-action cursor-move action-border-success h-auto mb-0">
					<div class="card-header p-3 d-flex align-items-center justify-content-between border-0 pb-0">
						<h6 class="card-title mb-0">Icon Design</h6>
						<div class="d-flex">
							<button type="button" class="btn btn-sm btn-icon btn-action-success waves-effect">
							<i class="fi fi-rr-pencil"></i>
							</button>
							<div class="btn-group">
								<button class="btn btn-sm btn-icon btn-action-gray waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fi fi-br-menu-dots-vertical"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Add</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body pt-2 p-3 text-1xs">
						<p>It is a long established fact that a reader will be distracted.</p>
						<div class="d-flex gap-2 mb-3">
							<div class="text-start w-50">
								<span>Start Date</span>
								<span class="text-dark d-block fw-semibold">14 Aug 2024</span>
							</div>
							<div class="text-start w-50">
								<span>End Date</span>
								<span class="text-dark d-block fw-semibold">20 Aug 2024</span>
							</div>
						</div>
						<div class="progress progress-sm bg-success-subtle mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar bg-success" style="width: 15%"></div>
						</div>
						<div class="d-flex gap-2 justify-content-between">
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
								<a href="javascript:void(0);" class="avatar avatar-xs rounded-circle bg-success-subtle text-success border border-2 border-white">
									<i class="fi fi-rr-plus text-2xs"></i>
								</a>
							</div>
							<div class="dropdown select-status">
								<button class="btn btn-sm btn-subtle-success dropdown-toggle waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Done
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-primary">New</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-info">In Progress</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-secondary">Pending</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);" data-class="btn-subtle-success" data-selected="true">Done</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
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
						<label for="taskTitle" class="form-label">Task Title</label>
						<input type="text" class="form-control" id="taskTitle" placeholder="Enter task title">
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="assignedTo" class="form-label">Assign To</label>
							<select class="form-select" id="assignedTo">
								<option selected disabled>Select Employee</option>
								<option>John Doe</option>
								<option>Jane Smith</option>
								<option>David Miller</option>
							</select>
						</div>
						<div class="col-md-6 mb-3">
							<label for="priority" class="form-label">Priority</label>
							<select class="form-select" id="priority">
								<option>Low</option>
								<option>Medium</option>
								<option>High</option>
								<option>Urgent</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="startDate" class="form-label">Start Date</label>
							<input type="date" class="form-control flatpickr-date" id="startDate">
						</div>
						<div class="col-md-6 mb-3">
							<label for="dueDate" class="form-label">Due Date</label>
							<input type="date" class="form-control flatpickr-date" id="dueDate">
						</div>
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Task Description</label>
						<textarea class="form-control" id="description" rows="3" placeholder="Describe the task..."></textarea>
					</div>
					<div class="mb-3">
						<label for="status" class="form-label">Status</label>
						<select class="form-select" id="status">
							<option>Not Started</option>
							<option>In Progress</option>
							<option>Completed</option>
							<option>On Hold</option>
						</select>
					</div>
					<div class="text-end">
						<button type="submit" class="btn btn-primary">Create Task</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	
@endsection