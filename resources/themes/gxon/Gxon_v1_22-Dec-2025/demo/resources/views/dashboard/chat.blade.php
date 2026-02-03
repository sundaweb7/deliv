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
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card card-body overflow-hidden chat-wrapper p-0">
			<div class="sidebar-mobile-overlay"></div>
			<div class="chat-sidebar">
				<div class="d-flex p-3 align-items-center justify-content-between">
					<form class="d-flex align-items-center shadow-sm rounded-2 position-relative w-100" action="#">
						@csrf
						<button type="button" class="btn btn-sm border-0 position-absolute start-0 ms-3 p-0">
						<i class="fi fi-rr-search"></i>
						</button>
						<input type="text" class="form-control ps-5" placeholder="Search">
					</form>
					<button type="button" class="btn btn-sm btn-shadow btn-icon ms-2 btn-close d-inline-flex d-lg-none">
					<i class="fi fi-sr-cross"></i>
					</button>
				</div>
				<div class="chat-nav" id="myTab" role="tablist" data-simplebar>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle avatar-status-success">
							<img src="{{ asset('assets/images/avatar/vector/avatar1.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Alex Storm</h6>
								<span class="type">Typing...</span>
							</div>
							<div class="text-end">
								<small class="time">02:21 PM</small>
								<span class="badge badge-sm rounded-pill bg-primary">12</span>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item active">
						<div class="avatar rounded-circle avatar-status-success">
							<img src="{{ asset('assets/images/avatar/vector/avatar2.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Jordan Miles</h6>
								<span class="text">Hey, did you get th..</span>
							</div>
							<div class="text-end">
								<small class="time">02:20 PM</small>
								<span class="badge badge-sm rounded-pill bg-primary">9</span>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle avatar-status-danger">
							<img src="{{ asset('assets/images/avatar/vector/avatar3.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Liam Carter</h6>
								<span class="text">Looks great, bro</span>
							</div>
							<div class="text-end">
								<small class="time">02:19 PM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle avatar-status-danger">
							<img src="{{ asset('assets/images/avatar/vector/avatar4.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Noah Blake</h6>
								<span class="text">Voice message</span>
							</div>
							<div class="text-end">
								<small class="time">01:00 PM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar5.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Mia Lane</h6>
								<span class="text">Thanks a lot!</span>
							</div>
							<div class="text-end">
								<small class="time">12:30 PM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar1.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Jordan Miles</h6>
								<span class="text">Hey, did you get th..</span>
							</div>
							<div class="text-end">
								<small class="time">11:00 AM</small>
								<span class="badge badge-sm rounded-pill bg-primary">8</span>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar2.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Liam Carter</h6>
								<span class="text">Looks great, bro</span>
							</div>
							<div class="text-end">
								<small class="time">11:00 AM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar3.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Noah Blake</h6>
								<span class="text">Voice message</span>
							</div>
							<div class="text-end">
								<small class="time">10:00 AM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar4.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Mia Lane</h6>
								<span class="text">Thanks a lot!</span>
							</div>
							<div class="text-end">
								<small class="time">09:00 AM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar5.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Noah Blake</h6>
								<span class="text">Voice message</span>
							</div>
							<div class="text-end">
								<small class="time">08:00 AM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar2.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Liam Carter</h6>
								<span class="text">Looks great, bro</span>
							</div>
							<div class="text-end">
								<small class="time">11:00 AM</small>
							</div>
						</div>
					</a>
					<a href="javascript:void(0);" class="chat-nav-item">
						<div class="avatar rounded-circle">
							<img src="{{ asset('assets/images/avatar/vector/avatar3.png') }}" alt="">
						</div>
						<div class="chat-avatar-info">
							<div class="clearfix">
								<h6 class="name">Noah Blake</h6>
								<span class="text">Voice message</span>
							</div>
							<div class="text-end">
								<small class="time">10:00 AM</small>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="chat-container">
				<div class="chat-header">
					<div class="d-flex align-items-center gap-3">
						<button class="btn btn-white btn-shadow btn-icon waves-effect chat-sidebar-toggler d-lg-none">
						<i class="fi fi-rs-list"></i>
						</button>
						<a href="javascript:void(0);" class="chat-nav-item">
							<div class="avatar rounded-circle avatar-status-success">
								<img src="{{ asset('assets/images/avatar/vector/avatar2.png') }}" alt="">
							</div>
							<div class="chat-avatar-info">
								<div class="clearfix">
									<h6 class="name">Jordan Miles</h6>
									<span class="text">Hey, did you get th..</span>
								</div>
							</div>
						</a>
					</div>
					<div class="clearfix">
						<a href="javascript:void(0);" class="btn btn-white text-success btn-shadow btn-icon waves-effect me-1 d-none d-sm-inline-flex">
							<i class="fi fi-rr-phone-flip"></i>
						</a>
						<a href="javascript:void(0);" class="btn btn-white text-danger btn-shadow btn-icon waves-effect me-1 d-none d-sm-inline-flex">
							<i class="fi fi-rr-video-camera-alt"></i>
						</a>
						<div class="btn-group">
							<button class="btn btn-white btn-shadow btn-icon waves-effect dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fi fi-rr-menu-dots-vertical"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-end">
								<li>
									<a class="dropdown-item" href="javascript:void(0);">View Contact</a>
								</li>
								<li>
									<a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
								</li>
								<li>
									<a class="dropdown-item" href="javascript:void(0);">Report</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="chat-body">
					<div class="chat-conversation" data-simplebar>
						<div class="chat-divider">
							<div class="chat-date">Today, 25 july</div>
						</div>
						<div class="chat-message-right">
							<div class="chat-message-text">
								<p>Guysss, next year we go to Japan! ✈️🎉</p>
								<p>Please help with the task distribution like usual later 🙏</p>
							</div>
							<div class="chat-message-text">
								<p>Also, please help divide the tasks like usual later.</p>
							</div>
							<div class="chat-time">10:25 PM</div>
						</div>
						<div class="chat-message-left">
							<div class="chat-message-text">
								<p>Are you serious???</p>
							</div>
							<div class="chat-message-text">
								<p>Gokilll!!</p>
							</div>
							<div class="chat-message-text">
								<p>Please check the Figma file for me</p>
							</div>
							<div class="chat-time">10:30 PM</div>
						</div>
						<div class="chat-message-right">
							<div class="chat-message-text">
								<p>Guys, let’s plan a trip to Japan next year!</p>
							</div>
							<div class="chat-message-text">
								<p>Also, please help divide the tasks like usual later.</p>
							</div>
							<div class="chat-time">10:40 PM</div>
						</div>
						<div class="chat-message-left">
							<div class="chat-message-text">
								<p>Already checked, looks clean 👌</p>
								<p>Maybe add a hover effect on the second card?</p>
							</div>
							<div class="chat-message-text">
								<p>I’ll review it in 10 mins ya 🙋‍</p>
							</div>
							<div class="chat-message-text">
								<p>Mantapp guys! Let’s finalize by tonight please 🕙</p>
							</div>
							<div class="chat-time">11:00 PM</div>
						</div>
					</div>
					<form class="chat-send-form">
						@csrf
						<input class="form-control chat-input border-0 shadow-none" placeholder="Type message">
						<div class="d-flex">
							<button type="button" class="btn btn-action-gray btn-icon waves-effect waves-light me-1">
							<i class="fi fi-rr-add-image"></i>
							</button>
							<button type="button" class="btn btn-action-gray btn-icon waves-effect waves-light me-3">
							<i class="fi fi-rr-link-alt"></i>
							</button>
							<button type="button" class="btn btn-primary waves-effect waves-light">
							Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection