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

<div class="app-page-head d-flex flex-wrap gap-3 align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Today, 01 July 2024</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Attendance</li>
			</ol>
		</nav>
	</div>
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
	<i class="fi fi-rr-plus me-1"></i> Add Employee
	</button>
</div>
<div class="row">
	<div class="col-xxl-9 col-lg-8">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Attendance Rate</h6>
				<a href="javascript:void(0);" class="btn btn-sm btn-outline-light waves-effect btn-shadow">Download Report</a>
			</div>
			<div class="card-body px-1 py-2">
				<div id="chartAttendanceRate"></div>
			</div>
		</div>
	</div>
	<div class="col-xxl-3 col-lg-4">
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
	<div class="col-lg-12">
		<div class="card overflow-hidden">
			<div class="card-header d-flex gap-3 flex-wrap align-items-center justify-content-between border-0 pb-0">
				<h6 class="card-title mb-0">Employee Attendance</h6>
				<div class="d-flex gap-3 flex-wrap">
					<div id="dt_EmployeeAttendance_Search"></div>
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
				<table id="dt_EmployeeAttendance" class="table table-sm display table-row-rounded">
					<thead class="table-light">
						<tr>
							<th class="minw-200px">Employee Name</th>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
							<th>12</th>
							<th>13</th>
							<th>14</th>
							<th>15</th>
							<th>16</th>
							<th>17</th>
							<th>18</th>
							<th>19</th>
							<th>20</th>
							<th>21</th>
							<th>22</th>
							<th>23</th>
							<th>24</th>
							<th>25</th>
							<th>26</th>
							<th>27</th>
							<th>28</th>
							<th>29</th>
							<th>30</th>
							<th>31</th>
							<th>Leave</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">James Anderson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">William Johnson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Benjamin Martinez</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">12 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Michael Davis</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">7 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Matthew Taylor</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">2 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">David Wilson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">4 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Anthony Thomas</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Christopher Moore</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">1 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Emma Smith</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">James Anderson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">William Johnson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Benjamin Martinez</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">12 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Michael Davis</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">7 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Matthew Taylor</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">2 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">David Wilson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">4 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Anthony Thomas</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Christopher Moore</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">1 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Emma Smith</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">James Anderson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">William Johnson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Benjamin Martinez</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">12 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Michael Davis</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">7 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar5.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Matthew Taylor</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">2 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">David Wilson</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">4 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Anthony Thomas</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">3 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Christopher Moore</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">1 Day</span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-flex align-items-center mw-175px">
									<div class="avatar avatar-xs rounded-circle">
										<img src="{{ asset('assets/images/avatar/avatar4.jpg') }}" alt="">
									</div>
									<div class="ms-2 me-auto">
										<h6 class="mb-0">Emma Smith</h6>
									</div>
								</div>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-primary text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-circle-xmark text-danger text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<i class="fi fi-rr-check-circle text-body text-sm"></i>
							</td>
							<td>
								<span class="text-danger">5 Day</span>
							</td>
						</tr>
					</tbody>
				</table>
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