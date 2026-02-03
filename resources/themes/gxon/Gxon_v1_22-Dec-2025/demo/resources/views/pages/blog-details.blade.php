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
		<h1 class="app-page-title">Blog details</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Blog details</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-xxl-8">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header position-relative border-0 p-0 m-3">
						<img src="{{ asset('assets/images/blog/blog-details.webp') }}" class="card-img rounded" alt="...">
						<div class="d-flex gap-2 align-items-center position-absolute top-0 end-0 mt-3 me-3">
							<button class="btn rounded-pill btn-sm btn-primary waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like">
							<i class="fi fi-rr-social-network me-1"></i> Like
							</button>
							<button class="btn rounded-pill btn-sm btn-secondary waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Share">
							<i class="fi fi-rs-share me-1"></i> Share
							</button>
						</div>
					</div>
					<div class="card-body pt-0">
						<div class="d-flex align-items-center justify-content-between mb-3 mt-3 flex-wrap gap-2">
							<div class="d-flex align-items-center">
								<img class="avatar avatar-xxs rounded-circle me-2" src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								<div class="clearfix">
									<p class="mb-0 fw-medium">Michael Thompson - <span> 20 July 2025</span>
								</p>
							</div>
						</div>
					</div>
					<h2 class="mb-3 fw-bold">Effective Hiring Process for Finding the Right Talent</h2>
					<h6 class="mb-2">Performance Management is More Than Just Appraisals</h6>
					<p class="mb-2">Performance reviews shouldn’t be annual checkboxes—they should support continuous growth. Real-time feedback and goal-setting drive real results.</p>
					<p class="mb-2">Company culture shapes how people feel and perform at work. HR silently creates values that define a strong and inclusive workplace. A good onboarding experience sets the tone for long-term employee engagement. It builds trust, clarity, and early confidence.</p>
					<ul class="list-inline">
						<li class="d-flex gap-2 align-items-center py-1">
							<i class="fa-regular fa-circle-check"></i> HR aligns talent with business goals
						</li>
						<li class="d-flex gap-2 align-items-center py-1">
							<i class="fa-regular fa-circle-check"></i> Manages employee lifecycle from onboarding to exit
						</li>
						<li class="d-flex gap-2 align-items-center py-1">
							<i class="fa-regular fa-circle-check"></i> Builds company culture and promotes values
						</li>
						<li class="d-flex gap-2 align-items-center py-1">
							<i class="fa-regular fa-circle-check"></i> Acts as a bridge between management and employees
						</li>
						<li class="d-flex gap-2 align-items-center py-1">
							<i class="fa-regular fa-circle-check"></i> Plays a key role in compliance and workplace policies
						</li>
					</ul>
					<p class="mb-2">HR is no longer just an administrative role—it drives business strategy and growth. A strong HR foundation ensures smooth operations and a thriving workforce.</p>
					<blockquote class="blockquote my-4">
						<p>“Great organizations are built on great people who are aligned with a common purpose. Hiring the right talent isn't just about filling positions — it's about shaping culture. When you invest in people, you invest in the future of your company.”</p>
						<cite>Simon Sinek</cite>
					</blockquote>
					<p>In the world of HR, identifying the right talent and placing them correctly is the biggest challenge. It’s not just about recruitment, but about building a sustainable culture. An organization can only thrive when its people are motivated and aligned with its vision</p>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h6 class="card-title">Comments <span class="badge badge-sm rounded-pill bg-primary ms-1">5</span>
					</h6>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush d-flex flex-wrap gap-4">
						<li class="list-group-item border-0 p-0">
							<div class="d-flex align-items-start gap-3 flex-wrap">
								<div class="avatar rounded-circle">
									<img src="{{ asset('assets/images/avatar/avatar1.jpg') }}" alt="">
								</div>
								<div class="flex-fill w-50">
									<div class="p-3 bg-light border border-light rounded bg-opacity-50">
										<div class="d-flex gap-2 mb-2">
											<span class="fw-semibold">Sophia</span>
											<span class="text-body text-xs">on December 25, 2024</span>
										</div>
										<p class="d-block text-body mb-3">This is a really insightful post, and I appreciate you sharing your perspective. I've learned something new today and will definitely be thinking about this further.</p>
										<button class="btn btn-sm btn-white waves-effect waves-light">Reply</button>
									</div>
									<div class="list-group-item border-0 pe-0 pb-0">
										<div class="d-flex align-items-start gap-3 flex-wrap">
											<div class="avatar rounded-circle">
												<img src="{{ asset('assets/images/avatar/avatar2.jpg') }}" alt="">
											</div>
											<div class="flex-fill w-50">
												<div class="p-3 bg-light border border-light rounded bg-opacity-50">
													<div class="d-flex gap-2 mb-2">
														<span class="fw-semibold">Mary Brown</span>
														<span class="text-body text-xs">on December 25, 2024</span>
													</div>
													<p class="d-block text-body mb-3">I completely agree with your assessment of the situation. It's important to have these conversations, and I appreciate you bringing this to light.</p>
													<button class="btn btn-sm btn-white waves-effect waves-light">Reply</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item border-0 p-0">
							<div class="d-flex align-items-start gap-3 flex-wrap">
								<div class="avatar rounded-circle">
									<img src="{{ asset('assets/images/avatar/avatar3.jpg') }}" alt="">
								</div>
								<div class="flex-fill w-50">
									<div class="p-3 bg-light border border-light rounded bg-opacity-50">
										<div class="d-flex gap-2 mb-2">
											<span class="fw-semibold">Olivia Wilson</span>
											<span class="text-body text-xs">on December 25, 2024</span>
										</div>
										<p class="d-block text-body mb-3">This is a fantastic resource, and I'm so glad I came across it. I'll be sharing this with my network as it's relevant to so many people.</p>
										<button class="btn btn-sm btn-white waves-effect waves-light">Reply</button>
									</div>
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
					<h6 class="card-title">Leave a comment </h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 mb-4">
							<label for="blogFirstName" class="form-label">First Name</label>
							<input type="text" class="form-control" id="blogFirstName">
						</div>
						<div class="col-md-6 mb-4">
							<label for="blogLastName" class="form-label">Last Name</label>
							<input type="text" class="form-control" id="blogLastName">
						</div>
						<div class="col-md-12 mb-4">
							<label for="blogEmail" class="form-label">Email ID</label>
							<input type="text" class="form-control" id="blogEmail">
						</div>
						<div class="col-md-12">
							<label for="blogComment" class="form-label">Write Comment</label>
							<textarea class="form-control" id="blogComment" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="card-footer border-0 pt-0">
					<button class="btn btn-primary waves-effect waves-light">Post Comment</button>
				</div>
			</div>
		</div>
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
									<a href="javascript:void(0);" class="badge badge-sm bg-info mb-1">Education</a>
									<h6 class="mb-1">
									<a href="javascript:void(0);" class="text-dark">Traditional Education Which One</a>
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
									<a href="javascript:void(0);" class="badge badge-sm bg-success mb-1">Lifestyle</a>
									<h6 class="mb-1">
									<a href="javascript:void(0);" class="text-dark">Minimalism: Living More with Less</a>
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
									<a href="javascript:void(0);" class="badge badge-sm bg-primary mb-1">Technology</a>
									<h6 class="mb-1">
									<a href="javascript:void(0);" class="text-dark">The Rise of Augmented Reality</a>
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