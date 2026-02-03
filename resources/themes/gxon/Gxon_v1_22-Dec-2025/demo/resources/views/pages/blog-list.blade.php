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
		<h1 class="app-page-title">Blog List</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Blog List</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-xxl-8 mb-4">
		<div class="row">
			<div class="col-12 m-b30">
				<div class="card card-action action-elevate action-border-primary">
					<div class="row g-0">
						<div class="col-md-5">
							<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
								<img src="{{ asset('assets/images/blog/blog1.webp') }}" alt="" class="img-fluid rounded">
								<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
									<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
										<i class="fi fi-rr-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-7 py-3 d-flex flex-column">
							<div class="card-body px-3 py-2">
								<a href="{{ route('blog-details') }}" class="badge badge-sm bg-info mb-1">Education</a>
								<h4>
								<a href="{{ route('blog-details') }}" class="text-dark">Effective Hiring Process for Finding the Right Talent</a>
								</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
							</div>
							<div class="card-footer mx-3 px-0 py-3">
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
			</div>
			<div class="col-12 m-b30">
				<div class="card card-action action-elevate action-border-primary">
					<div class="row g-0">
						<div class="col-md-5">
							<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
								<img src="{{ asset('assets/images/blog/blog2.webp') }}" alt="" class="img-fluid rounded">
								<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
									<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
										<i class="fi fi-rr-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-7 py-3 d-flex flex-column">
							<div class="card-body px-3 py-2">
								<a href="{{ route('blog-details') }}" class="badge badge-sm bg-success mb-1">Lifestyle</a>
								<h4>
								<a href="{{ route('blog-details') }}" class="text-dark">Employee Onboarding and the Power of First Impressions</a>
								</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
							</div>
							<div class="card-footer mx-3 px-0 py-3">
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
			</div>
			<div class="col-12 m-b30">
				<div class="card card-action action-elevate action-border-primary">
					<div class="row g-0">
						<div class="col-md-5">
							<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
								<img src="{{ asset('assets/images/blog/blog3.webp') }}" alt="" class="img-fluid rounded">
								<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
									<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
										<i class="fi fi-rr-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-7 py-3 d-flex flex-column">
							<div class="card-body px-3 py-2">
								<a href="{{ route('blog-details') }}" class="badge badge-sm bg-primary mb-1">Technology</a>
								<h4>
								<a href="{{ route('blog-details') }}" class="text-dark">Training and Development for a Skilled Workforce</a>
								</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
							</div>
							<div class="card-footer mx-3 px-0 py-3">
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
			</div>
			<div class="col-12 m-b30">
				<div class="card card-action action-elevate action-border-primary">
					<div class="row g-0">
						<div class="col-md-5">
							<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
								<img src="{{ asset('assets/images/blog/blog4.webp') }}" alt="" class="img-fluid rounded">
								<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
									<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
										<i class="fi fi-rr-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-7 py-3 d-flex flex-column">
							<div class="card-body px-3 py-2">
								<a href="{{ route('blog-details') }}" class="badge badge-sm bg-danger mb-1">News</a>
								<h4>
								<a href="{{ route('blog-details') }}" class="text-dark">Managing Remote Work with the Right HR Strategy</a>
								</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
							</div>
							<div class="card-footer mx-3 px-0 py-3">
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
			</div>
			<div class="col-12 m-b30">
				<div class="card card-action action-elevate action-border-primary">
					<div class="row g-0">
						<div class="col-lg-5">
							<div class="card-header border-0 p-0 m-2 position-relative overflow-hidden">
								<img src="{{ asset('assets/images/blog/blog5.webp') }}" alt="" class="img-fluid rounded">
								<div class="position-absolute action-visible top-0 start-0 h-100 w-100 bg-dark bg-opacity-50 rounded d-flex align-items-center justify-content-center">
									<a href="{{ route('blog-details') }}" class="btn btn-icon btn-lg btn-secondary rounded-circle waves-effect waves-light">
										<i class="fi fi-rr-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-7 py-3 d-flex flex-column">
							<div class="card-body px-3 py-2">
								<a href="{{ route('blog-details') }}" class="badge badge-sm bg-warning mb-1">Blogger</a>
								<h4>
								<a href="{{ route('blog-details') }}" class="text-dark">HR Management the Backbone of Modern Organizations</a>
								</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting standard dummy text ever since.</p>
							</div>
							<div class="card-footer mx-3 px-0 py-3">
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
	</div>
	<div class="col-xxl-4">
		<div class="row">
			<div class="col-xl-12">
				<div class="card text-bg-light">
					<div class="card-body text-center">
						<h6 class="mb-3"> Stay updated with the latest news and
						<br>articles — subscribe now!
						</h6>
						<div class="d-flex">
							<input type="text" class="form-control" placeholder="Email Here">
							<div class="clearfix ms-2">
								<button class="btn btn-secondary waves-effect waves-light" type="button">Subscribe</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="card overflow-hidden">
					<div class="card-header justify-content-between d-flex">
						<h6 class="card-title mb-0"> Recent Posts </h6>
						<a href="javascript:void(0);" class="btn-link fw-semibold"> View All</a>
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush">
							<li class="list-group-item py-3">
								<div class="d-flex gap-3 align-items-center">
									<div class="avatar avatar-xl">
										<img src="{{ asset('assets/images/blog/recent/blog1.webp') }}" alt="">
									</div>
									<div class="flex-fill">
										<a href="{{ route('blog-details') }}" class="badge badge-sm bg-info mb-1">Education</a>
										<h6 class="mb-1">
										<a href="{{ route('blog-details') }}" class="text-dark">Traditional Education Which One</a>
										</h6>
										<span class="text-2xs text-body">2024-02-19 10:30 AM</span>
									</div>
								</div>
							</li>
							<li class="list-group-item py-3">
								<div class="d-flex gap-3 align-items-center">
									<div class="avatar avatar-xl">
										<img src="{{ asset('assets/images/blog/recent/blog2.webp') }}" alt="">
									</div>
									<div class="flex-fill">
										<a href="{{ route('blog-details') }}" class="badge badge-sm bg-success mb-1">Lifestyle</a>
										<h6 class="mb-1">
										<a href="{{ route('blog-details') }}" class="text-dark">Minimalism: Living More with Less</a>
										</h6>
										<span class="text-2xs text-body">2024-02-19 10:30 AM</span>
									</div>
								</div>
							</li>
							<li class="list-group-item py-3">
								<div class="d-flex gap-3 align-items-center">
									<div class="avatar avatar-xl">
										<img src="{{ asset('assets/images/blog/recent/blog3.webp') }}" alt="">
									</div>
									<div class="flex-fill">
										<a href="{{ route('blog-details') }}" class="badge badge-sm bg-primary mb-1">Technology</a>
										<h6 class="mb-1">
										<a href="{{ route('blog-details') }}" class="text-dark">The Rise of Augmented Reality</a>
										</h6>
										<span class="text-2xs text-body">2024-02-19 10:30 AM</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title mb-0"> Explore Topics </h6>
					</div>
					<div class="card-body">
						<ul class="list-inline mb-0">
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Business Management</a>
								<span class="ms-auto">(5)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Personal Development</a>
								<span class="ms-auto">(7)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Arts & Design</a>
								<span class="ms-auto">(2)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Data Science</a>
								<span class="ms-auto">(8)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Marketing</a>
								<span class="ms-auto">(6)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Builds Company</a>
								<span class="ms-auto">(9)</span>
							</li>
							<li class="d-flex gap-2 align-items-center py-1">
								<i class="fa-solid fa-angles-right text-primary"></i>
								<a href="javascript:void(0);" class="text-body">Management And Employees</a>
								<span class="ms-auto">(4)</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header">
						<h6 class="card-title mb-0">Popular Tags </h6>
					</div>
					<div class="card-body">
						<div class="d-flex flex-wrap gap-2">
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#HRStrategy</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#HRTrends</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#Leadership</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#Recruitment</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#Onboarding</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#Blogger</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#HRAdmin</a>
							<a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">#CareerGrowth</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection