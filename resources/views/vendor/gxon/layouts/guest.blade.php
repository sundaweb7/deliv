<!DOCTYPE html>
<html lang="en">

<head>

	<base href="{{ route('index') }}">

	<!-- begin::GXON Meta Basic -->
	<meta charset="utf-8">
	<meta name="theme-color" content="#316AFF">
	<meta name="robots" content="index, follow">
	<meta name="author" content="LayoutDrop">
	<meta name="format-detection" content="telephone=no">
	<meta name="keywords" content="hr dashboard, admin template, hr management, employee management, hr admin panel, gxon bootstrap dashboard, hr software ui, hrm dashboard, bootstrap hr template, responsive, bootstrap hr template, light mode, dark mode">
	<meta name="description" content="GXON is a professional and modern HR Management Laravel Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
	<!-- end::GXON Meta Basic -->

	<!-- begin::GXON Meta Social -->
	<meta property="og:url" content="{{ route('index') }}/laravel/demo/">
	<meta property="og:site_name" content="GXON | HR Management Laravel Admin Dashboard Template">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="en_us">
	<meta property="og:title" content="GXON | HR Management Laravel Admin Dashboard Template">
	<meta property="og:description" content="GXON is a professional and modern HR Management Laravel Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
	<meta property="og:image" content="{{ route('index') }}/laravel/demo/preview.png">
	<!-- end::GXON Meta Social -->

	<!-- begin::GXON Meta Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="{{ route('index') }}/laravel/demo/">
	<meta name="twitter:creator" content="@layoutdrop">
	<meta name="twitter:title" content="GXON | HR Management Laravel Admin Dashboard Template">
	<meta name="twitter:description" content="GXON is a professional and modern HR Management Laravel Admin Dashboard Template built with Bootstrap. It includes light and dark modes, and is ideal for managing employees, attendance, payroll, recruitment, and more — perfect for HR software and admin panels.">
	<!-- end::GXON Meta Twitter -->

	<!-- begin::GXON Website Page Title -->
	<title>@yield('title', 'GXON | HR Management Laravel Admin Dashboard Template')</title>
	<!-- end::GXON Website Page Title -->

	<!-- begin::GXON Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end::GXON Mobile Specific -->

	<!-- begin::GXON Favicon Tags -->
	<link rel="icon" type="image/png" href="{{ asset("assets/images/favicon.png") }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset("assets/images/apple-touch-icon.png") }}">
	<!-- end::GXON Favicon Tags -->

	<!-- begin::GXON Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
	<!-- end::GXON Google Fonts -->

	@stack('styles')

</head>

<body>
	<div class="page-layout">
		@yield('content')
	</div>
	@stack('scripts')
</body>
</html>
