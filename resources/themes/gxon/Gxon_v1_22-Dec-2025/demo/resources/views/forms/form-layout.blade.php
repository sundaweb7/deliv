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
	<h1 class="app-page-title">Form layout</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Form layout</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-xxl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Vertical form</h6>
			</div>
			<div class="card-body">
				<form class="row">
					@csrf
					<div class="col-md-6 mb-3">
						<label for="inputEmail4" class="form-label">Email</label>
						<input type="email" class="form-control" id="inputEmail4">
					</div>
					<div class="col-md-6 mb-3">
						<label for="inputPassword4" class="form-label">Password</label>
						<input type="password" class="form-control" id="inputPassword4">
					</div>
					<div class="col-12 mb-3">
						<label for="inputAddress" class="form-label">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
					</div>
					<div class="col-12 mb-3">
						<label for="inputAddress2" class="form-label">Address 2</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="col-md-6 mb-3">
						<label for="inputCity" class="form-label">City</label>
						<input type="text" class="form-control" id="inputCity">
					</div>
					<div class="col-md-4 mb-3">
						<label for="inputState" class="form-label">State</label>
						<select id="inputState" class="form-select">
							<option selected>Choose...</option>
							<option>...</option>
						</select>
					</div>
					<div class="col-md-2 mb-3">
						<label for="inputZip" class="form-label">Zip</label>
						<input type="text" class="form-control" id="inputZip">
					</div>
					<div class="col-12 mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">Check me out</label>
						</div>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xxl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Horizontal form</h6>
			</div>
			<div class="card-body">
				<form>
					@csrf
					<div class="row mb-3">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3">
						</div>
					</div>
					<div class="row mb-3">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3">
						</div>
					</div>
					<div class="row mb-3">
						<label for="inputAddress3" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputAddress3" placeholder="1234 Main St">
						</div>
					</div>
					<div class="row mb-3">
						<label for="inputState2" class="col-sm-2 col-form-label">State</label>
						<div class="col-sm-10">
							<select id="inputState2" class="form-select">
								<option selected>Choose...</option>
								<option>...</option>
							</select>
						</div>
					</div>
					<fieldset class="row mb-3">
						<legend class="col-form-label col-sm-2 pt-0">Radios</legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
								<label class="form-check-label" for="gridRadios1">
									First radio
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
								<label class="form-check-label" for="gridRadios2">
									Second radio
								</label>
							</div>
							<div class="form-check disabled">
								<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
								<label class="form-check-label" for="gridRadios3">
									Third disabled radio
								</label>
							</div>
						</div>
					</fieldset>
					<div class="row mb-3">
						<div class="col-sm-10 offset-sm-2">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck1">
								<label class="form-check-label" for="gridCheck1">
									Example checkbox
								</label>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xxl-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Auto sizing</h6>
			</div>
			<div class="card-body">
				<form class="row gy-3 gx-3 align-items-center">
					@csrf
					<div class="col-auto">
						<label class="visually-hidden" for="autoSizingInput">Name</label>
						<input type="text" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
					</div>
					<div class="col-auto">
						<label class="visually-hidden" for="autoSizingInputGroup">Username</label>
						<div class="input-group">
							<div class="input-group-text">@</div>
							<input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username">
						</div>
					</div>
					<div class="col-auto">
						<label class="visually-hidden" for="autoSizingSelect">Preference</label>
						<select class="form-select" id="autoSizingSelect">
							<option selected>Choose...</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<div class="col-auto">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="autoSizingCheck">
							<label class="form-check-label" for="autoSizingCheck">Remember me</label>
						</div>
					</div>
					<div class="col-auto">
						<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection