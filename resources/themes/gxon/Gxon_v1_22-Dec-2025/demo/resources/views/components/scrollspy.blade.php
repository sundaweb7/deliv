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
	<h1 class="app-page-title">Scrollspy</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('index') }}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Scrollspy</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Navbar scrollspy</h6>
			</div>
			<div class="card-body">
				<nav id="navbar-example2" class="navbar bg-light gap-2 px-3 mb-3 rounded">
					<a class="navbar-brand" href="javascript:void(0);">
						<img class="visible-light" src="{{ asset('assets/images/logo-full.svg') }}" alt="logo">
						<img class="visible-dark" src="{{ asset('assets/images/logo-full-white.svg') }}" alt="logo">
					</a>
					<ul class="nav nav-pills">
						<li class="nav-item">
							<a class="nav-link" href="#scrollspyHeading1">First</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#scrollspyHeading2">Second</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-expanded="false">Dropdown</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="#scrollspyHeading3">Third</a>
								</li>
								<li>
									<a class="dropdown-item" href="#scrollspyHeading4">Fourth</a>
								</li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<a class="dropdown-item" href="#scrollspyHeading5">Fifth</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
				<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="p-3 rounded-2 border" tabindex="0" style="height: 300px" data-simplebar>
					<h4 id="scrollspyHeading1">First heading</h4>
					<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
					<h4 id="scrollspyHeading2">Second heading</h4>
					<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
					<h4 id="scrollspyHeading3">Third heading</h4>
					<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
					<h4 id="scrollspyHeading4">Fourth heading</h4>
					<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
					<h4 id="scrollspyHeading5">Fifth heading</h4>
					<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Nested nav</h6>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-sm-4">
						<nav id="navbar-example3" class="h-100 flex-column align-items-stretch bg-light rounded p-2">
							<nav class="nav nav-pills flex-column">
								<a class="nav-link" href="#item-1">Item 1</a>
								<nav class="nav nav-pills flex-column">
									<a class="nav-link ms-3 my-1" href="#item-1-1">Item 1-1</a>
									<a class="nav-link ms-3 my-1" href="#item-1-2">Item 1-2</a>
								</nav>
								<a class="nav-link" href="#item-2">Item 2</a>
								<a class="nav-link" href="#item-3">Item 3</a>
								<nav class="nav nav-pills flex-column">
									<a class="nav-link ms-3 my-1" href="#item-3-1">Item 3-1</a>
									<a class="nav-link ms-3 my-1" href="#item-3-2">Item 3-2</a>
								</nav>
							</nav>
						</nav>
					</div>
					<div class="col-sm-8">
						<div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="p-3 rounded-2 border" tabindex="0" style="height: 365px" data-simplebar>
							<div id="item-1">
								<h4>First heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-1-1">
								<h4>Second heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-1-2">
								<h4>Third heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-2">
								<h4>Fourth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-3">
								<h4>Fifth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-3-1">
								<h4>Sixth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="item-3-2">
								<h4>Seventh heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">List group</h6>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-4">
						<div id="list-example" class="list-group">
							<a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
							<a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
							<a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
							<a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
						</div>
					</div>
					<div class="col-8">
						<div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="p-3 rounded-2 border" tabindex="0" style="height: 365px" data-simplebar>
							<div id="list-item-1">
								<h4>First heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="list-item-2">
								<h4>Second heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="list-item-3">
								<h4>Third heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="list-item-4">
								<h4>Fourth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title mb-0">Simple anchors</h6>
			</div>
			<div class="card-body">
				<div class="row g-3">
					<div class="col-4">
						<div id="simple-list-example" class="d-flex flex-column gap-2 text-center">
							<a class="p-1 rounded" href="#simple-list-item-1">Item 1</a>
							<a class="p-1 rounded" href="#simple-list-item-2">Item 2</a>
							<a class="p-1 rounded" href="#simple-list-item-3">Item 3</a>
							<a class="p-1 rounded" href="#simple-list-item-4">Item 4</a>
							<a class="p-1 rounded" href="#simple-list-item-5">Item 5</a>
						</div>
					</div>
					<div class="col-8">
						<div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="p-3 rounded-2 border" tabindex="0" style="height: 365px" data-simplebar>
							<div id="simple-list-item-1">
								<h4>First heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="simple-list-item-2">
								<h4>Second heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="simple-list-item-3">
								<h4>Third heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="simple-list-item-4">
								<h4>Fourth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
							<div id="simple-list-item-5">
								<h4>Fifth heading</h4>
								<p>This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted. It’s repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection