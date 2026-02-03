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
	<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<!-- end::GXON CSS Stylesheet -->
@endpush

@push('scripts')
	<!-- begin::GXON Page Scripts -->
	<script src="{{ asset('assets/libs/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('assets/libs/fullcalendar/index.global.min.js') }}"></script>
	<script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
	<script src="{{ asset('assets/js/appSettings.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<!-- end::GXON Page Scripts -->
@endpush

@section('content')
<div class="app-page-head d-flex align-items-center justify-content-between">
	<div class="clearfix">
		<h1 class="app-page-title">Calendar</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item">
					<a href="{{ route('index') }}">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Calendar</li>
			</ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body p-0">
				<div class="row g-0">
					<div class="col-lg-3 p-4 border-end">
						<button id="openDrawerBtn" class="btn btn-primary waves-effect waves-light w-100" data-bs-toggle="modal" data-bs-target="#modalAddEvent">
						<i class="fi fi-rr-plus me-1"></i> Add Event
						</button>
						<hr class="border-dashed my-4">
						<h6 class="mb-3">Draggable Events</h6>
						<div id="external-events" class="d-grid gap-2">
							<div class="fc-event cursor-move rounded-2 px-3 py-2 bg-primary-subtle text-primary" data-color="var(--bs-primary)" data-location="Head Office" data-description="Discuss project status and next steps.">
								<i class="fi fi-rr-plane-departure me-1"></i> Tour & Picnic
							</div>
							<div class="fc-event cursor-move rounded-2 px-3 py-2 bg-success-subtle text-success" data-color="var(--bs-success)" data-location="Remote" data-description="Complete assigned tasks and update progress.">
								<i class="fi fi-rr-workflow-alt me-1"></i> Group Projects
							</div>
							<div class="fc-event cursor-move rounded-2 px-3 py-2 bg-info-subtle text-info" data-color="var(--bs-info)" data-location="Conference Room" data-description="Prepare and deliver client presentation.">
								<i class="fi fi-rr-podium me-1"></i> Presentation
							</div>
							<div class="fc-event cursor-move rounded-2 px-3 py-2 bg-warning-subtle text-warning" data-color="var(--bs-warning)" data-location="Personal" data-description="Follow up on pending emails and calls.">
								<i class="fi fi-rs-massage me-1"></i> Employee Wellness
							</div>
							<div class="fc-event cursor-move rounded-2 px-3 py-2 bg-danger-subtle text-danger" data-color="var(--bs-danger)" data-location="Office" data-description="Handle urgent support tickets immediately.">
								<i class="fi fi-rr-hr me-1"></i> Recruitment
							</div>
						</div>
					</div>
					<div class="col-lg-9 p-4">
						<div id="calendar"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalAddEvent" tabindex="-1" aria-labelledby="modalAddEventLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalAddEventLabel">Add Event</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="eventForm">
							@csrf
							<div class="row">
								<div class="col-12 mb-3">
									<label class="form-label">Title</label>
									<input type="text" id="title" class="form-control" required>
								</div>
								<div class="col-12 mb-3">
									<label class="form-label">Label</label>
									<select id="label" class="form-select">
										<option value="primary">Primary</option>
										<option value="success">Success</option>
										<option value="warning">Warning</option>
										<option value="danger">Danger</option>
										<option value="info">Info</option>
									</select>
								</div>
								<div class="col-6 mb-3">
									<label class="form-label">Start Date</label>
									<input type="datetime-local" id="eventStartDate" class="form-control" required>
								</div>
								<div class="col-6 mb-3">
									<label class="form-label">End Date</label>
									<input type="datetime-local" id="eventEndDate" class="form-control">
								</div>
								<div class="col-12 mb-3">
									<label class="form-label">Event URL</label>
									<input type="url" id="url" class="form-control" placeholder="https://www.google.com/">
								</div>
								<div class="col-12 mb-3">
									<label class="form-label">Location</label>
									<input type="text" id="location" class="form-control">
								</div>
								<div class="col-12 mb-3">
									<label class="form-label">Description</label>
									<textarea id="description" class="form-control"></textarea>
								</div>
								<div class="col-12">
									<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary waves-effect waves-light ms-2" data-bs-dismiss="modal">Add Event</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="eventTitle">Event Title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>
							<strong class="text-dark">Start:</strong>
							<span id="eventStart"></span>
						</p>
						<p>
							<strong class="text-dark">End:</strong>
							<span id="eventEnd"></span>
						</p>
						<p>
							<strong class="text-dark">Location:</strong>
							<span id="eventLocation"></span>
						</p>
						<p class="mb-0">
							<strong class="text-dark">Description:</strong>
							<span id="eventDescription"></span>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection