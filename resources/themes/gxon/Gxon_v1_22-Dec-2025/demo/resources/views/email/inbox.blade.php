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
					<a href="#inbox-tab" class="mail-nav-item active" data-bs-toggle="tab" data-bs-target="#inbox-tab" role="tab" aria-controls="inbox-tab" aria-selected="true">
						<i class="fi fi-rr-inbox-in me-2"></i> Inbox
						<span class="badge badge-sm bg-primary-subtle text-primary ms-auto">247</span>
					</a>
					<a href="#sent-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#sent-tab" role="tab" aria-controls="sent-tab" aria-selected="false">
						<i class="fi fi-rr-paper-plane-top me-2"></i> Sent
					</a>
					<a href="#drafts-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#drafts-tab" role="tab" aria-controls="drafts-tab" aria-selected="false">
						<i class="fi fi-rr-blueprint me-2"></i> Drafts
					</a>
					<a href="#trash-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#trash-tab" role="tab" aria-controls="trash-tab" aria-selected="false">
						<i class="fi fi-rr-trash me-2"></i> Trash
					</a>
					<a href="#starred-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#starred-tab" role="tab" aria-controls="starred-tab" aria-selected="false">
						<i class="fi fi-rr-star me-2"></i> Starred
					</a>
					<a href="#spam-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#spam-tab" role="tab" aria-controls="spam-tab" aria-selected="false">
						<i class="fi fi-rr-square-info me-2"></i> Spam
					</a>
					<a href="#archive-tab" class="mail-nav-item" data-bs-toggle="tab" data-bs-target="#archive-tab" role="tab" aria-controls="archive-tab" aria-selected="false">
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
					<form class="d-flex align-items-center h-100 w-200px w-md-250px position-relative me-auto" action="#">
						@csrf
						<button type="button" class="btn btn-sm border-0 position-absolute start-0 ms-3 p-0">
						<i class="fi fi-rr-search"></i>
						</button>
						<input type="text" class="form-control ps-5" placeholder="Search">
					</form>
					<div class="d-flex align-items-center gap-3">
						<span>1 - 50 of 570</span>
						<div class="d-flex gap-2">
							<button class="btn btn-white btn-shadow btn-icon waves-effect">
							<i class="fi fi-rr-angle-left text-2xs"></i>
							</button>
							<button class="btn btn-white btn-shadow btn-icon waves-effect">
							<i class="fi fi-rr-angle-right text-2xs"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="inbox-tab" role="tabpanel" aria-labelledby="inbox-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🎨 Fresh Color Kits Just Dropped!-</span>
										<span class="mail-item-text text-body"> Add vibrance to your summer projects with pastel gradients and neon palettes.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">08:40 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave</span>
										<span class="mail-item-subject">💰 You Made a Sale!</span>
										<span class="mail-item-text text-body"> Congrats, layoutWave! Your product “MetroGrid Figma Layout” has sold for $</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">1:02 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">SiteTracker</span>
										<span class="mail-item-subject">📊 1,000 Visitors Reached</span>
										<span class="mail-item-text text-body"> Great job! Your site is gaining traction — keep the momentum going!</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 21</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">Review Digest – July 20th</span>
										<span class="mail-item-text text-body"> Hello layoutWave, 2 themes approved:</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 21</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">Must-Have Fonts for Creators</span>
										<span class="mail-item-text text-body"> Explore our top picks for minimal, bold, and handwritten font styles</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave QA</span>
										<span class="mail-item-subject">⚠️ Feedback on Recent Upload</span>
										<span class="mail-item-text text-body"> Please fix responsiveness and padding issues.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave QA</span>
										<span class="mail-item-subject">⚠️ Feedback on Recent Upload</span>
										<span class="mail-item-text text-body"> Please fix responsiveness and padding issues</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity </span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 18</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="sent-tab" role="tabpanel" aria-labelledby="sent-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🎨 Fresh Color Kits Just Dropped!-</span>
										<span class="mail-item-text text-body"> Add vibrance to your summer projects with pastel gradients and neon palettes.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">08:40 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">Must-Have Fonts for Creators</span>
										<span class="mail-item-text text-body"> Explore our top picks for minimal, bold, and handwritten font styles</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 18</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="drafts-tab" role="tabpanel" aria-labelledby="drafts-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity </span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 18</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="trash-tab" role="tabpanel" aria-labelledby="trash-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave</span>
										<span class="mail-item-subject">💰 You Made a Sale!</span>
										<span class="mail-item-text text-body"> Congrats, layoutWave! Your product “MetroGrid Figma Layout” has sold for $</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">1:02 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">Review Digest – July 20th</span>
										<span class="mail-item-text text-body"> Hello layoutWave, 2 themes approved:</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 21</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave QA</span>
										<span class="mail-item-subject">⚠️ Feedback on Recent Upload</span>
										<span class="mail-item-text text-body"> Please fix responsiveness and padding issues.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="starred-tab" role="tabpanel" aria-labelledby="starred-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🎨 Fresh Color Kits Just Dropped!-</span>
										<span class="mail-item-text text-body"> Add vibrance to your summer projects with pastel gradients and neon palettes.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">08:40 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave</span>
										<span class="mail-item-subject">💰 You Made a Sale!</span>
										<span class="mail-item-text text-body"> Congrats, layoutWave! Your product “MetroGrid Figma Layout” has sold for $</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">1:02 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="spam-tab" role="tabpanel" aria-labelledby="spam-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave QA</span>
										<span class="mail-item-subject">⚠️ Feedback on Recent Upload</span>
										<span class="mail-item-text text-body"> Please fix responsiveness and padding issues</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity </span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 18</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="archive-tab" role="tabpanel" aria-labelledby="archive-tab">
						<div class="checkable-wrapper">
							<div class="d-flex bg-light px-3 py-2 align-items-center gap-2 border-bottom">
								<div class="form-check m-0 ms-1">
									<input class="form-check-input checkable-check-all" type="checkbox">
								</div>
								<a href="javascript:void(0);" class="text-body ms-1">
									<i class="fi fi-rr-rotate-right"></i>
								</a>
							</div>
							<ul class="list-unstyled mail-list m-0 gradient-layer" data-simplebar>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave</span>
										<span class="mail-item-subject">💰 You Made a Sale!</span>
										<span class="mail-item-text text-body"> Congrats, layoutWave! Your product “MetroGrid Figma Layout” has sold for $</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">1:02 AM</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">Review Digest – July 20th</span>
										<span class="mail-item-text text-body"> Hello layoutWave, 2 themes approved:</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 21</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item mail-unread">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave QA</span>
										<span class="mail-item-subject">⚠️ Feedback on Recent Upload</span>
										<span class="mail-item-text text-body"> Please fix responsiveness and padding issues.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">ThemeHive</span>
										<span class="mail-item-subject">🛑 Hard Rejection – July 18</span>
										<span class="mail-item-text text-body"> our “NewsNow” template did not meet our layout standards. Check feedback.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 20</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark active" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">DesignWave Support</span>
										<span class="mail-item-subject">[Published] StudioX Portfolio Template</span>
										<span class="mail-item-text text-body"> Hi layoutWave, your new template is now live and ready to be purchased.out” has sold for $6.50 USD.</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">PixelMarket</span>
										<span class="mail-item-subject">🌟 Trending Items This Week</span>
										<span class="mail-item-text text-body"> See what's rising in popularity </span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 19</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
								<li class="mail-list-item checkable-item">
									<div class="form-check my-0 me-2">
										<input class="form-check-input checkable-check-input" type="checkbox">
									</div>
									<a class="mail-item-bookmark" href="javascript:void();">
										<i class="fi fi-rr-star me-2 me-sm-3"></i>
									</a>
									<a href="{{ route('read-email') }}" class="mail-item-content ms-2 ms-sm-0 me-2">
										<span class="mail-item-username me-2">TemplateGalaxy Team</span>
										<span class="mail-item-subject">✅ Your Template Passed Review</span>
										<span class="mail-item-text text-body"> ZenBlocks UI System” is now listed on TemplateGalaxy. Congrats</span>
									</a>
									<div class="mail-item-meta ms-auto">
										<small class="mail-item-time">Jul 18</small>
										<div class="mail-item-actions">
											<button class="btn btn-white btn-sm text-danger btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-trash"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-box"></i>
											</button>
											<button class="btn btn-white btn-sm btn-shadow btn-icon waves-effect">
											<i class="fi fi-rr-menu-dots"></i>
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection