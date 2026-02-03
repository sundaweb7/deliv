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
	<h1 class="app-page-title">Progress</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Progress</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Progress</h6>
				<p class="card-text">Progress components are built with two HTML elements, some CSS to set the width, and a few attributes.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 0%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 25%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 50%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 75%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Backgrounds</h6>
				<p class="card-text">Use background utility classes to change the appearance of individual progress bars.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-2" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar bg-success" style="width: 25%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar bg-info" style="width: 50%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar bg-warning" style="width: 75%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar bg-danger" style="width: 100%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Progress size</h6>
				<p class="card-text">Progress components are built with two HTML elements, some CSS to set the height, and a few attributes.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-3" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px">
					<div class="progress-bar" style="width: 25%"></div>
				</div>
				<div class="progress progress-sm mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 25%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 50%"></div>
				</div>
				<div class="progress progress-lg mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 75%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Striped </h6>
				<p class="card-text">Add <code>.progress-bar-striped</code> to any <code>.progress-bar</code> to apply a stripe via CSS gradient over the progress bar’s background color.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-2" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped" style="width: 10%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped bg-success" style="width: 25%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Info striped example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped bg-info" style="width: 50%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Warning striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped bg-warning" style="width: 75%"></div>
				</div>
				<div class="progress mb-2" role="progressbar" aria-label="Danger striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped bg-danger" style="width: 100%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Animated stripes</h6>
				<p class="card-text">The striped gradient can also be animated. Add <code>.progress-bar-animated</code> to <code>.progress-bar</code> to animate the stripes right to left via CSS3 animations.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-2" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 10%"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Labels</h6>
				<p class="card-text">Add labels to your progress bars by placing text within the <code>.progress-bar</code>.</p>
			</div>
			<div class="card-body">
				<div class="progress mb-2" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
					<div class="progress-bar" style="width: 25%">25%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Multiple bars</h6>
				<p class="card-text">You can include multiple progress components inside a container with <code>.progress-stacked</code>
				</p>
			</div>
			<div class="card-body">
				<div class="progress-stacked">
					<div class="progress mb-2" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
						<div class="progress-bar"></div>
					</div>
					<div class="progress mb-2" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
						<div class="progress-bar bg-success"></div>
					</div>
					<div class="progress mb-2" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						<div class="progress-bar bg-info"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection