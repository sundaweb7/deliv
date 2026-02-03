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
	<h1 class="app-page-title">Form floating labels</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Form floating labels</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Basic example</h6>
					</div>
					<div class="card-body">
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
							<label for="floatingInput">Email address</label>
						</div>
						<div class="form-floating">
							<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
							<label for="floatingPassword">Password</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Selects</h6>
					</div>
					<div class="card-body">
						<div class="form-floating">
							<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
							<label for="floatingSelect">Works with selects</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Disabled</h6>
					</div>
					<div class="card-body">
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled>
							<label for="floatingInputDisabled">Email address</label>
						</div>
						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextareaDisabled" disabled></textarea>
							<label for="floatingTextareaDisabled">Comments</label>
						</div>
						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 100px" disabled>Disabled textarea with some text inside</textarea>
							<label for="floatingTextarea2Disabled">Comments</label>
						</div>
						<div class="form-floating">
							<select class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example" disabled>
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
							<label for="floatingSelectDisabled">Works with selects</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Layout </h6>
					</div>
					<div class="card-body">
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
									<label for="floatingInputGrid">Email address</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<select class="form-select" id="floatingSelectGrid">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
									<label for="floatingSelectGrid">Works with selects</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Form validation</h6>
					</div>
					<div class="card-body">
						<form class="form-floating mb-3">
							@csrf
							<input type="email" class="form-control is-valid" id="floatingInputValue" placeholder="info@example.com" value="info@example.com">
							<label for="floatingInputValue">Input with value</label>
						</form>
						<form class="form-floating">
							@csrf
							<input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com">
							<label for="floatingInputInvalid">Invalid input</label>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Textareas</h6>
					</div>
					<div class="card-body">
						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
							<label for="floatingTextarea">Comments</label>
						</div>
						<div class="form-floating">
							<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
							<label for="floatingTextarea2">Comments</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Input groups</h6>
					</div>
					<div class="card-body">
						<div class="input-group mb-3">
							<span class="input-group-text">@</span>
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
								<label for="floatingInputGroup1">Username</label>
							</div>
						</div>
						<div class="input-group has-validation">
							<span class="input-group-text">@</span>
							<div class="form-floating is-invalid">
								<input type="text" class="form-control is-invalid" id="floatingInputGroup2" placeholder="Username" required>
								<label for="floatingInputGroup2">Username</label>
							</div>
							<div class="invalid-feedback">Please choose a username.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title">Readonly plaintext</h6>
					</div>
					<div class="card-body">
						<div class="form-floating mb-3">
							<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">
							<label for="floatingEmptyPlaintextInput">Empty input</label>
						</div>
						<div class="form-floating mb-3">
							<input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput" placeholder="name@example.com" value="name@example.com">
							<label for="floatingPlaintextInput">Input with value</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection