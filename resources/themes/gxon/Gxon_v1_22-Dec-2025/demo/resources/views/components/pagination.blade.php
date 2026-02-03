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
	<h1 class="app-page-title">Pagination</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Pagination</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Sizing</h6>
			</div>
			<div class="card-body">
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-lg">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
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
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
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
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-sm mb-0">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
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
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Rounded circle</h6>
			</div>
			<div class="card-body">
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
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
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination Color</h6>
			</div>
			<div class="card-body">
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-primary">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-secondary">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-danger">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-success">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-warning">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-info">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-dark">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Pagination Outline Color</h6>
			</div>
			<div class="card-body">
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-primary">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-secondary">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-danger">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-success">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-warning">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-info">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
				<nav aria-label="Page navigation example">
					<ul class="pagination pagination-rounded pagination-outline-dark">
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Previous">
								<i class="fi fi-rr-angle-double-left"></i>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">1</a>
						</li>
						<li class="page-item">
							<a class="page-link active" href="javascript:void(0);">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="javascript:void(0);" aria-label="Next">
								<i class="fi fi-rr-angle-double-right"></i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection