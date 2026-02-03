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
	<h1 class="app-page-title">Team</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Team</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-border-primary action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media6.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">David Martinez</a>
				</h4>
				<span>Marketing Mentor</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-border-secondary action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media2.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Michael Thompson</a>
				</h4>
				<span>Data Scientist</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-border-success action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media3.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Emily Chen</a>
				</h4>
				<span>Graphic Design</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-border-warning action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media4.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Alexander Johnson</a>
				</h4>
				<span>Coding Instructor</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden">
				<img src="{{ asset('assets/images/team/media6.webp') }}" alt="" class="img-fluid w-100">
			</div>
			<div class="p-3 pb-2">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">David Martinez</a>
				</h4>
				<span>Marketing Mentor</span>
				<div class="d-flex flex-wrap gap-2 mt-3">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-github waves-effect waves-light">
						<i class="fa-brands fa-github"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden">
				<img src="{{ asset('assets/images/team/media2.webp') }}" alt="" class="img-fluid w-100">
			</div>
			<div class="p-3 pb-2">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Michael Thompson</a>
				</h4>
				<span>Data Scientist</span>
				<div class="d-flex flex-wrap gap-2 mt-3">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-github waves-effect waves-light">
						<i class="fa-brands fa-github"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden">
				<img src="{{ asset('assets/images/team/media3.webp') }}" alt="" class="img-fluid w-100">
			</div>
			<div class="p-3 pb-2">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Emily Chen</a>
				</h4>
				<span>Graphic Design</span>
				<div class="d-flex flex-wrap gap-2 mt-3">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-github waves-effect waves-light">
						<i class="fa-brands fa-github"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden">
				<img src="{{ asset('assets/images/team/media4.webp') }}" alt="" class="img-fluid w-100">
			</div>
			<div class="p-3 pb-2">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Alexander Johnson</a>
				</h4>
				<span>Coding Instructor</span>
				<div class="d-flex flex-wrap gap-2 mt-3">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-github waves-effect waves-light">
						<i class="fa-brands fa-github"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-subtle-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media6.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">David Martinez</a>
				</h4>
				<span>Marketing Mentor</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media2.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Michael Thompson</a>
				</h4>
				<span>Data Scientist</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media3.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Emily Chen</a>
				</h4>
				<span>Graphic Design</span>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card card-body card-action action-elevate p-2">
			<div class="rounded overflow-hidden position-relative">
				<img src="{{ asset('assets/images/team/media4.webp') }}" alt="" class="img-fluid w-100">
				<div class="d-flex flex-wrap gap-2 position-absolute bottom-0 justify-content-center w-100 p-3 action-visible">
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-facebook waves-effect waves-light">
						<i class="fa-brands fa-facebook-f"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-twitter waves-effect waves-light">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-instagram waves-effect waves-light">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle btn-youtube waves-effect waves-light">
						<i class="fa-brands fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="p-3 pb-2 text-center">
				<h4 class="mb-1">
				<a class="text-dark" href="javascript:void(0);">Alexander Johnson</a>
				</h4>
				<span>Coding Instructor</span>
			</div>
		</div>
	</div>
</div>
@endsection