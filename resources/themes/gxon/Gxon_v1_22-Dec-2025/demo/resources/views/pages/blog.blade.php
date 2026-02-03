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
<div class="app-page-head d-flex align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Blog</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Blog</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog1.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">Effective Hiring Process for Finding the Right Talent</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog2.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">Employee Onboarding and the Power of First Impressions</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog3.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">Training and Development for a Skilled Workforce</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog4.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">Managing Remote Work with the Right HR Strategy</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog5.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">HR Management the Backbone of Modern Organizations</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 m-b30">
		<div class="card card-action action-elevate action-border-primary">
			<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
				<img src="{{ asset('assets/images/blog/blog6.webp') }}" alt="" class="img-fluid rounded">
				<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
					<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
						<i class="fi fi-rr-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="card-body px-3 py-2">
				<h4>
				<a href="{{ route('blog-details') }}" class="text-dark">Using HR Analytics for Better Decision Making</a>
				</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
			</div>
			<div class="card-footer mx-3 px-0 py-3 pb-4">
				<ul class="d-flex list-inline mb-0 gap-3 flex-wrap">
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-calendar text-primary"></i>
						<a class="text-body" href="javascript:void(0);">17 March 2025</a>
					</li>
					<li class="d-flex gap-1 align-items-center">
						<i class="icon-circle-user text-primary"></i> BY
						<a class="text-body" href="javascript:void(0);"> Roberts</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="text-center">
	<ul class="pagination justify-content-center">
		<li class="page-item">
			<a class="page-link" href="javascript:void(0);" aria-label="Previous">
				<span aria-hidden="true">«</span>
			</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="javascript:void(0);">1</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="javascript:void(0);">2</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="javascript:void(0);">3</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="javascript:void(0);" aria-label="Next">
				<span aria-hidden="true">»</span>
			</a>
		</li>
	</ul>
</div>
@endsection