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
	<link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/swiper.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head">
	<h1 class="app-page-title">Swiper</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Swiper</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Basic Slider</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperInit">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel2.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Navigation</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperNav">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel2.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperPagination">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel5.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
					<div class="pagination-wrapper">
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination dynamic</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperDynamicBullets">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel5.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel2.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
					<div class="pagination-wrapper">
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination progress</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperProgressbar">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination fraction</h6>
			</div>
			<div class="card-body">
				<div class="swiper swiperFraction">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel3.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel4.webp') }}" alt="" class="img-fluid rounded">
						</div>
						<div class="swiper-slide">
							<img src="{{ asset('assets/images/carousel/carousel1.webp') }}" alt="" class="img-fluid rounded">
						</div>
					</div>
					<div class="pagination-wrapper">
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="text-center mt-4 mb-3">
	<a href="https://swiperjs.com/demos" target="_blank" class="btn btn-primary waves-effect waves-light">View All demos</a>
</div>
@endsection