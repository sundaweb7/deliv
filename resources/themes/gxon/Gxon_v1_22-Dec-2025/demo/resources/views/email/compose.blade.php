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
	<link rel="stylesheet" href="{{ asset('assets/libs/tagify/tagify.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/tagify/tagify.js') }}"></script>
	<script src="{{ asset('assets/js/tagify.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="row">

					<div class="col-12">
						<div class="card card-body overflow-hidden mail-wrapper p-0">
							<div class="sidebar-mobile-overlay"></div>
							<div class="mail-sidebar bg-light">
								<div class="px-3 pt-3 mb-2">
									<a href="{{ route('compose') }}" class="btn btn-primary waves-effect waves-light w-100">
										Compose
									</a>
								</div>
								<div class="d-grid gap-2 p-2 mail-nav" id="myTab" role="tablist" data-simplebar>
									<a href="{{ route('inbox') }}" class="mail-nav-item active">
										<i class="fi fi-rr-inbox-in me-2"></i> Inbox
										<span class="badge badge-sm bg-primary-subtle text-primary ms-auto">247</span>
									</a>
									<a href="{{ route('inbox') }}" class="mail-nav-item">
										<i class="fi fi-rr-paper-plane-top me-2"></i> Sent
									</a>
									<a href="{{ route('inbox') }}" class="mail-nav-item">
										<i class="fi fi-rr-blueprint me-2"></i> Drafts
									</a>
									<a href="{{ route('inbox') }}" class="mail-nav-item">
										<i class="fi fi-rr-trash me-2"></i> Trash
									</a>
									<a href="{{ route('inbox') }}" class="mail-nav-item">
										<i class="fi fi-rr-star me-2"></i> Starred
									</a>
									<a href="{{ route('inbox') }}" class="mail-nav-item">
										<i class="fi fi-rr-box me-2"></i> Archive
									</a>
									<a href="{{ route('calendar') }}" class="mail-nav-item">
										<i class="fi fi-rr-calendar me-2"></i> Scheduled
									</a>
								</div>
							</div>
							<div class="mail-body">
								<div class="mail-header">
									<button class="btn btn-white btn-shadow btn-icon waves-effect mail-sidebar-toggler d-lg-none">
										<i class="fi fi-rs-list"></i>
									</button>
									<h6 class="mb-0 me-auto">New Message</h6>
								</div>
								<div class="px-4 py-3">
									<ul class="list-group list-group-flush border-bottom">
										<li class="list-group-item d-flex align-items-center px-0 py-0">
											<span class="text-body minw-100px">To</span>
											<input class="form-control border-0 shadow-none tagify-input px-2" name='basic' value='sales@example.com'>
										</li>
										<li class="list-group-item d-flex align-items-center px-0 py-0">
											<span class="text-body minw-100px">CC</span>
											<input class="form-control border-0 shadow-none tagify-input px-2" name='basic' value='sales@example.com, info@example.com'>
										</li>
										<li class="list-group-item d-flex align-items-center px-0 py-2">
											<span class="text-body minw-100px">Subject</span>
											<input type="text" class="form-control border-0 shadow-none text-dark" value="You Made a Sale! – MetroGrid Figma Portfolio">
										</li>
									</ul>
								</div>
								<textarea class="form-control mail-textarea">
Hi layoutWave,

🎉 Great news — your product has just been sold!
Your design file "MetroGrid – Figma Portfolio Layout" was purchased with a Single License. You've earned $6.50

USD from this sale.

Warm regards,
Team LayoutDrop
							</textarea>
								<div class="d-flex px-4 py-2">
									<button type="button" class="btn btn-primary waves-effect waves-light">
										Send Message
									</button>
									<button type="button" class="btn btn-action-gray text-dark btn-icon waves-effect waves-light ms-3">
										<i class="fi fi-rr-link-alt"></i>
									</button>
									<button type="button" class="btn btn-action-gray text-dark btn-icon waves-effect waves-light ms-1">
										<i class="fi fi-rr-add-image"></i>
									</button>
								</div>
							</div>
						</div>
					</div>

				</div>
@endsection