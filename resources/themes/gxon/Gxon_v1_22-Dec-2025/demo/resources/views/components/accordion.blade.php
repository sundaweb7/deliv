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
	<h1 class="app-page-title">Accordion</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Accordion</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Accordion Custom Primary</h6>
		<div class="accordion accordion-custom-button accordion-primary" id="accordionCustomPrimary">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseOne" aria-expanded="false" aria-controls="CustomPrimary-collapseOne">Accordion Item #1</button>
				</h2>
				<div id="CustomPrimary-collapseOne" class="accordion-collapse collapse collapse show" data-bs-parent="#accordionCustomPrimary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseTwo" aria-expanded="false" aria-controls="CustomPrimary-collapseTwo">Accordion Item #2</button>
				</h2>
				<div id="CustomPrimary-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomPrimary-collapseThree" aria-expanded="false" aria-controls="CustomPrimary-collapseThree">Accordion Item #3</button>
				</h2>
				<div id="CustomPrimary-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionCustomPrimary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Accordion Custom Secondary</h6>
		<div class="accordion accordion-custom-button accordion-secondary" id="accordionCustomSecondary">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#CustomSecondary-collapseOne" aria-expanded="false" aria-controls="CustomSecondary-collapseOne">Accordion Item #1</button>
				</h2>
				<div id="CustomSecondary-collapseOne" class="accordion-collapse collapse collapse show" data-bs-parent="#accordionCustomSecondary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomSecondary-collapseTwo" aria-expanded="false" aria-controls="CustomSecondary-collapseTwo">Accordion Item #2</button>
				</h2>
				<div id="CustomSecondary-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionCustomSecondary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#CustomSecondary-collapseThree" aria-expanded="false" aria-controls="CustomSecondary-collapseThree">Accordion Item #3</button>
				</h2>
				<div id="CustomSecondary-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionCustomSecondary">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Accordion with icon</h6>
		<div class="accordion" id="accordionWithIcon">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#WithIcon-collapseOne" aria-expanded="true" aria-controls="WithIcon-collapseOne">
				<i class="fi fi-rr-star me-2 scale-2x"></i>
				Accordion Item #1
				</button>
				</h2>
				<div id="WithIcon-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionWithIcon">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#WithIcon-collapseTwo" aria-expanded="false" aria-controls="WithIcon-collapseTwo">
				<i class="fi fi-rr-gift me-2 scale-2x"></i>
				Accordion Item #2
				</button>
				</h2>
				<div id="WithIcon-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionWithIcon">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#WithIcon-collapseThree" aria-expanded="false" aria-controls="WithIcon-collapseThree">
				<i class="fi fi-rr-trophy-star me-2 scale-2x"></i>
				Accordion Item #3
				</button>
				</h2>
				<div id="WithIcon-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionWithIcon">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Default Accordion</h6>
		<div class="accordion" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion Item #1</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Accordion Item #2</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accordion Item #3</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Flush</h6>
		<div class="accordion accordion-flush p-2 border bg-light rounded" id="accordionFlushExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Accordion Item #1</button>
				</h2>
				<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">Accordion Item #2</button>
				</h2>
				<div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">Accordion Item #3</button>
				</h2>
				<div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<h6 class="mb-3">Always open</h6>
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">Accordion Item #1</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Accordion Item #2</button>
				</h2>
				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">Accordion Item #3</button>
				</h2>
				<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
					<div class="accordion-body">
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection