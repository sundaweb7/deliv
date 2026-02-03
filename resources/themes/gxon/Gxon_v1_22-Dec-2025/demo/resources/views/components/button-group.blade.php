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
	<h1 class="app-page-title">Button group</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Button group</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Basic</h6>
			</div>
			<div class="card-body">
				<div class="d-flex gap-3 flex-wrap">
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-primary waves-effect waves-light">Left</button>
						<button type="button" class="btn btn-primary waves-effect waves-light">Middle</button>
						<button type="button" class="btn btn-primary waves-effect waves-light">Right</button>
					</div>
					<div class="btn-group">
						<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light active" aria-current="page">Active link</a>
						<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Link</a>
						<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Link</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Mixed styles</h6>
			</div>
			<div class="card-body">
				<div class="btn-group" role="group" aria-label="Basic mixed styles example">
					<button type="button" class="btn btn-danger waves-effect waves-light">Left</button>
					<button type="button" class="btn btn-warning waves-effect waves-light">Middle</button>
					<button type="button" class="btn btn-success waves-effect waves-light">Right</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Outlined styles</h6>
			</div>
			<div class="card-body">
				<div class="btn-group" role="group" aria-label="Basic outlined example">
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Left</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Middle</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Right</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Checkbox button groups </h6>
			</div>
			<div class="card-body">
				<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
					<input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
					<label class="btn btn-outline-primary waves-effect waves-light" for="btncheck1">Check box 1</label>
					<input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
					<label class="btn btn-outline-primary waves-effect waves-light" for="btncheck2">Check box 2</label>
					<input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
					<label class="btn btn-outline-primary waves-effect waves-light" for="btncheck3">Check box 3</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Radio button groups </h6>
			</div>
			<div class="card-body">
				<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
					<input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
					<label class="btn btn-outline-primary waves-effect waves-light" for="btnradio1">Radio 1</label>
					<input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
					<label class="btn btn-outline-primary waves-effect waves-light" for="btnradio2">Radio 2</label>
					<input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
					<label class="btn btn-outline-primary waves-effect waves-light" for="btnradio3">Radio 3</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Button toolbar</h6>
			</div>
			<div class="card-body">
				<div class="btn-toolbar gap-2" role="toolbar" aria-label="Toolbar with button groups">
					<div class="btn-group" role="group" aria-label="First group">
						<button type="button" class="btn btn-primary waves-effect waves-light">1</button>
						<button type="button" class="btn btn-primary waves-effect waves-light">2</button>
						<button type="button" class="btn btn-primary waves-effect waves-light">3</button>
						<button type="button" class="btn btn-primary waves-effect waves-light">4</button>
					</div>
					<div class="btn-group" role="group" aria-label="Second group">
						<button type="button" class="btn btn-secondary waves-effect waves-light">5</button>
						<button type="button" class="btn btn-secondary waves-effect waves-light">6</button>
						<button type="button" class="btn btn-secondary waves-effect waves-light">7</button>
					</div>
					<div class="btn-group" role="group" aria-label="Third group">
						<button type="button" class="btn btn-info waves-effect waves-light">8</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Sizing </h6>
			</div>
			<div class="card-body">
				<div class="btn-group btn-group-lg mb-3" role="group" aria-label="Large button group">
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Left</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Middle</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Right</button>
				</div>
				<br>
				<div class="btn-group mb-3" role="group" aria-label="Default button group">
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Left</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Middle</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Right</button>
				</div>
				<br>
				<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Left</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Middle</button>
					<button type="button" class="btn btn-outline-primary waves-effect waves-light">Right</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Nesting</h6>
			</div>
			<div class="card-body">
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
					<button type="button" class="btn btn-primary waves-effect waves-light">1</button>
					<button type="button" class="btn btn-primary waves-effect waves-light">2</button>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Dropdown
						</button>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
							</li>
							<li>
								<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Vertical variation</h6>
			</div>
			<div class="card-body">
				<div class="d-flex gap-3 flex-wrap">
					<div class="clearfix">
						<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
							<button type="button" class="btn btn-primary">Button</button>
							<button type="button" class="btn btn-primary">Button</button>
							<button type="button" class="btn btn-primary">Button</button>
							<button type="button" class="btn btn-primary">Button</button>
						</div>
					</div>
					<div class="clearfix">
						<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
								</button>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
								</ul>
							</div>
							<button type="button" class="btn btn-primary">Button</button>
							<button type="button" class="btn btn-primary">Button</button>
							<div class="btn-group dropstart" role="group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
								</button>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
								</ul>
							</div>
							<div class="btn-group dropend" role="group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
								</button>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
								</ul>
							</div>
							<div class="btn-group dropup" role="group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
								</button>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:void(0);">Dropdown link</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix">
						<div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
							<input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked>
							<label class="btn btn-outline-danger" for="vbtn-radio1">Radio 1</label>
							<input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
							<label class="btn btn-outline-danger" for="vbtn-radio2">Radio 2</label>
							<input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
							<label class="btn btn-outline-danger" for="vbtn-radio3">Radio 3</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection