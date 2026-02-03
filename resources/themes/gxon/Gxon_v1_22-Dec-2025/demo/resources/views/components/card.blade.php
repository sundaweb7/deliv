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
	<h1 class="app-page-title">Card</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Card</li>
		</ol>
	</nav>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Basic Example</h6>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card5.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title mb-2">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card4.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title mb-2">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card3.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title mb-2">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card2.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title mb-2">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Kitchen sink</h6>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card5.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">An item</li>
				<li class="list-group-item">A second item</li>
				<li class="list-group-item">A third item</li>
			</ul>
			<div class="card-body">
				<a href="javascript:void(0);" class="card-link">Card link</a>
				<a href="javascript:void(0);" class="card-link">Another link</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card3.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">An item</li>
				<li class="list-group-item">A second item</li>
				<li class="list-group-item">A third item</li>
			</ul>
			<div class="card-body">
				<a href="javascript:void(0);" class="card-link">Card link</a>
				<a href="javascript:void(0);" class="card-link">Another link</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card1.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">An item</li>
				<li class="list-group-item">A second item</li>
				<li class="list-group-item">A third item</li>
			</ul>
			<div class="card-body">
				<a href="javascript:void(0);" class="card-link">Card link</a>
				<a href="javascript:void(0);" class="card-link">Another link</a>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<img src="{{ asset('assets/images/card/card2.webp') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">An item</li>
				<li class="list-group-item">A second item</li>
				<li class="list-group-item">A third item</li>
			</ul>
			<div class="card-body">
				<a href="javascript:void(0);" class="card-link">Card link</a>
				<a href="javascript:void(0);" class="card-link">Another link</a>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Navigation</h6>
	</div>
	<div class="col-lg-6">
		<div class="card text-center">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a class="nav-link active" aria-current="true" href="javascript:void(0);">Active</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:void(0);">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Disabled</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card text-center">
			<div class="card-header">
				<ul class="nav nav-pills card-header-pills">
					<li class="nav-item">
						<a class="nav-link active" href="javascript:void(0);">Active</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:void(0);">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Disabled</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-8">
		<div class="row">
			<div class="col-lg-12">
				<h6 class="mb-3">Image caps</h6>
			</div>
			<div class="col-md-6">
				<div class="card mb-3">
					<img src="{{ asset('assets/images/card/card4.webp') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title mb-2">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<p class="card-text">
							<small class="text-body-secondary">Last updated 3 mins ago</small>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title mb-2">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<p class="card-text">
							<small class="text-body-secondary">Last updated 3 mins ago</small>
						</p>
					</div>
					<img src="{{ asset('assets/images/card/card5.webp') }}" class="card-img-bottom" alt="...">
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="row">
			<div class="col-lg-12">
				<h6 class="mb-3">Image overlays</h6>
			</div>
			<div class="col-lg-12">
				<div class="card text-bg-dark">
					<img src="{{ asset('assets/images/card/card3.webp') }}" class="card-img" alt="...">
					<div class="card-img-overlay">
						<h5 class="card-title text-white mb-2">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<p class="card-text">
							<small>Last updated 3 mins ago</small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Horizontal </h6>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="row g-0">
				<div class="col-md-4">
					<img src="{{ asset('assets/images/card/card1.webp') }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title mb-2">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<p class="card-text">
							<small class="text-body-secondary">Last updated 3 mins ago</small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="row g-0">
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title mb-2">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<p class="card-text">
							<small class="text-body-secondary">Last updated 3 mins ago</small>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<img src="{{ asset('assets/images/card/card2.webp') }}" class="img-fluid rounded-end h-100 object-fit-cover" alt="...">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Background and color</h6>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-primary border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Primary card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-secondary border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Secondary card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-success border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Success card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-danger border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Danger card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-warning border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Warning card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-info border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Info card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-light border-0">
			<div class="card-header border-bottom border-dark border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Light card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card text-bg-dark border-0">
			<div class="card-header border-bottom border-light border-opacity-25">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white mb-2">Dark card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Border</h6>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-primary">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Primary card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-secondary">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Secondary card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-success">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Success card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-danger">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Danger card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-warning">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Warning card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-info">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Info card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-light">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Light card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6">
		<div class="card border-dark mb-3">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title mb-2">Dark card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-lg-12">
		<h6 class="mb-3">Card groups</h6>
	</div>
	<div class="col-lg-12">
		<div class="card-group">
			<div class="card">
				<img src="{{ asset('assets/images/card/card1.webp') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title mb-2">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				</div>
				<div class="card-footer">
					<small class="text-body-secondary">Last updated 3 mins ago</small>
				</div>
			</div>
			<div class="card">
				<img src="{{ asset('assets/images/card/card2.webp') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title mb-2">Card title</h5>
					<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				</div>
				<div class="card-footer">
					<small class="text-body-secondary">Last updated 3 mins ago</small>
				</div>
			</div>
			<div class="card">
				<img src="{{ asset('assets/images/card/card3.webp') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title mb-2">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				</div>
				<div class="card-footer">
					<small class="text-body-secondary">Last updated 3 mins ago</small>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection