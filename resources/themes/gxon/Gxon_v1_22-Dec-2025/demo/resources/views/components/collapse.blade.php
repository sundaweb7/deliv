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
	<h1 class="app-page-title">Collapse</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Collapse</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Basic collapse</h6>
				<p class="card-text">Click the buttons below to show and hide another element via class changes.</p>
			</div>
			<div class="card-body">
				<p class="d-inline-flex gap-2">
					<a class="btn btn-primary waves-effect waves-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						Link with href
					</a>
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Button with data-bs-target
					</button>
				</p>
				<div class="collapse" id="collapseExample">
					<div class="p-3 border rounded">
						Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Horizontal</h6>
				<p class="card-text">The collapse plugin supports horizontal collapsing.</p>
			</div>
			<div class="card-body">
				<p>
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
					Toggle width collapse
					</button>
				</p>
				<div style="min-height: 110px;">
					<div class="collapse-horizontal collapse show" id="collapseWidthExample" style="">
						<div class="p-3 border rounded" style="width: 300px;">
							This is some placeholder content for a horizontal collapse. It’s hidden by default and shown when triggered.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Multiple toggles and targets</h6>
				<p class="card-text">A <code>&lt;button&gt;</code> or <code>&lt;a&gt;</code> element can show and hide multiple elements by referencing them with a selector in its <code>data-bs-target</code> or <code>href</code> attribute. Conversely, multiple <code>&lt;button&gt;</code> or <code>&lt;a&gt;</code> elements can show and hide the same element if they each reference it with their <code>data-bs-target</code> or <code>href</code> attribute.</p>
			</div>
			<div class="card-body">
				<p class="d-inline-flex flex-wrap gap-2">
					<a class="btn btn-primary waves-effect waves-light" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
				</p>
				<div class="row">
					<div class="col">
						<div class="collapse multi-collapse" id="multiCollapseExample1">
							<div class="p-3 border rounded">
								Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
							</div>
						</div>
					</div>
					<div class="col">
						<div class="collapse multi-collapse" id="multiCollapseExample2">
							<div class="p-3 border rounded">
								Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection