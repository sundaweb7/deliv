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
	<link rel="stylesheet" href="{{ asset('assets/libs/leaflet/leaflet.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>
	<script src="{{ asset('assets/libs/leaflet/us-states.js') }}"></script>
	<script src="{{ asset('assets/js/leaflet.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head">
	<h1 class="app-page-title">Leaflet Map</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Leaflet Map</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Basic World Map</h6>
			</div>
			<div class="card-body">
				<div id="mapBasicWorld" style="height: 400px;"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Map Overlays</h6>
			</div>
			<div class="card-body">
				<div id="mapOverlays" style="height: 400px;"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Layers Control</h6>
			</div>
			<div class="card-body">
				<div id="mapLayersControl" style="height: 400px;"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Markers With Custom Icons</h6>
			</div>
			<div class="card-body">
				<div id="mapMarkersCustom" style="height: 400px;"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Interactive Choropleth Map</h6>
			</div>
			<div class="card-body">
				<div id="mapInteractiveChoropleth" style="height: 400px;"></div>
			</div>
		</div>
	</div>
</div>
@endsection