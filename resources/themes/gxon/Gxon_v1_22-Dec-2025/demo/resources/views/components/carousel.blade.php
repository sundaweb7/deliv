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
	<h1 class="app-page-title">Carousel</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Carousel</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6 mb-5">
		<h6 class="mb-3">Basic carousel</h6>
		<div id="carouselExample" class="carousel slide">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel2.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<div class="col-lg-6 mb-5">
		<h6 class="mb-3">Indicators carousel</h6>
		<div id="carouselExampleIndicators" class="carousel slide">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{ asset('assets/images/carousel/carousel2.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<div class="col-lg-6 mb-5">
		<h6 class="mb-3">Captions carousel</h6>
		<div id="carouselExampleCaptions" class="carousel slide">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" class="d-block w-100 rounded" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5 class="text-white">First slide label</h5>
						<p>Some representative placeholder content for the first slide.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" class="d-block w-100 rounded" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5 class="text-white">Second slide label</h5>
						<p>Some representative placeholder content for the second slide.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel5.webp') }}" class="d-block w-100 rounded" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5 class="text-white">Third slide label</h5>
						<p>Some representative placeholder content for the third slide.</p>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<div class="col-lg-6 mb-5">
		<h6 class="mb-3">Crossfade carousel</h6>
		<div id="carouselExampleFade" class="carousel slide carousel-fade">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel5.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
				<div class="carousel-item">
					<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" class="d-block w-100 rounded" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
</div>
@endsection