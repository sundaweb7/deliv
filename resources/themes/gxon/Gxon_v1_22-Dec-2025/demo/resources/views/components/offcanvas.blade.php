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
	<h1 class="app-page-title">Offcanvas</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Offcanvas</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Placement</h6>
			</div>
			<div class="card-body">
				<div class="d-flex gap-3 flex-wrap">
					<!-- Offcanvas Start -->
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
					Offcanvas Start
					</button>
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
						<div class="offcanvas-header pb-0">
							<h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<div>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
							</div>
							<div class="pt-4">
								<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
								<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
							</div>
						</div>
					</div>
					<!-- Offcanvas Top -->
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Offcanvas Top</button>
					<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
						<div class="offcanvas-header pb-0">
							<h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<div>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
							</div>
							<div class="pt-4">
								<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
								<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
							</div>
						</div>
					</div>
					<!-- Offcanvas Right -->
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Offcanvas Right</button>
					<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
						<div class="offcanvas-header pb-0">
							<h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<div>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
							</div>
							<div class="pt-4">
								<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
								<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
							</div>
						</div>
					</div>
					<!-- Offcanvas Bottom -->
					<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Offcanvas Bottom</button>
					<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
						<div class="offcanvas-header pb-0">
							<h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">
							<div>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
							</div>
							<div class="pt-4">
								<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
								<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Dark offcanvas</h6>
			</div>
			<div class="card-body">
				<!-- Offcanvas Start -->
				<button class="btn btn-dark waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">
				Offcanvas Dark
				</button>
				<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
					<div class="offcanvas-header pb-0">
						<h5 class="offcanvas-title text-white" id="offcanvasDarkLabel">Offcanvas</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</div>
						<div class="pt-4">
							<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
							<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Static backdrop</h6>
			</div>
			<div class="card-body">
				<!-- Toggle static offcanvas -->
				<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
				Toggle static offcanvas
				</button>
				<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
					<div class="offcanvas-header pb-0">
						<h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</div>
						<div class="pt-4">
							<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
							<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Body scrolling</h6>
			</div>
			<div class="card-body">
				<!-- Toggle static offcanvas -->
				<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Enable body scrolling</button>
				<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</div>
						<div class="pt-4">
							<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
							<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Body scrolling and backdrop</h6>
			</div>
			<div class="card-body">
				<!-- Body scrolling and backdrop -->
				<button class="btn btn-primary waves-effect waves-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Enable both scrolling & backdrop</button>
				<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</div>
						<div class="pt-4">
							<button type="button" class="btn btn-primary waves-effect waves-light me-2">Continue</button>
							<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="offcanvas">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection