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
	<h1 class="app-page-title">Popovers</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Popovers</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Directions</h6>
				<p class="card-text">Four options are available: top, right, bottom, and left. Directions are mirrored when using Bootstrap in RTL. Set <code>data-bs-placement</code> to change the direction.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2 justify-content-between">
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Popover on top
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-placement="right" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Popover on right
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-placement="bottom" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Popover on bottom
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-placement="left" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Popover on left
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Custom tooltips</h6>
				<p class="card-text">You can customize the appearance of popovers using CSS variables.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-primary" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Primary
					</button>
					<button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-secondary" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Secondary
					</button>
					<button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-success" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Success
					</button>
					<button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-info" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Info
					</button>
					<button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-warning" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Warning
					</button>
					<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-danger" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Danger
					</button>
					<button type="button" class="btn btn-dark waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-dark" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Dark
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Custom Header Color</h6>
				<p class="card-text">You can customize the appearance of popovers using CSS variables.</p>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-primary" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Primary
					</button>
					<button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-secondary" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Secondary
					</button>
					<button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-success" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Success
					</button>
					<button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-info" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Info
					</button>
					<button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-warning" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Warning
					</button>
					<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-danger" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Danger
					</button>
					<button type="button" class="btn btn-dark waves-effect waves-light" data-bs-toggle="popover" data-bs-custom-class="popover-header-dark" data-bs-title="Popover title" data-bs-placement="top" data-bs-content="And here’s some amazing content. It’s very engaging. Right?">
					Dark
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Without header</h6>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap gap-2">
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover">
					Popover on top
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover">
					Popover on right
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover">
					Popover on bottom
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Left popover">
					Popover on left
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection