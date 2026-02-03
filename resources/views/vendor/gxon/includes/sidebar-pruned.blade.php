<aside class="app-menubar" id="menubar">
	<div class="app-navbar-brand">
		<a class="navbar-brand-logo" href="{{ safe_route('admin.dashboard') }}">
				<img src="{{ asset('theme/gxon-assets/images/logo.svg') }}" alt="logo">
		</a>
		<a class="navbar-brand-mini visible-light" href="{{ safe_route('index') }}">
				<img src="{{ asset('theme/gxon-assets/images/logo-text.svg') }}" alt="logo">
		</a>
		<a class="navbar-brand-mini visible-dark" href="{{ safe_route('index') }}">
				<img src="{{ asset('theme/gxon-assets/images/logo-text-white.svg') }}" alt="logo">
		</a>
	</div>

	<nav class="app-navbar" data-simplebar>
		<ul class="menubar">
			{{-- Compact application menu: only show routes that exist in this app --}}

			@if(Route::has('admin.dashboard'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.dashboard') }}">
					<i class="fi fi-rr-apps"></i>
					<span class="menu-label">Dashboard</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.orders.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.orders.index') }}">
					<i class="fi fi-rr-shopping-bag"></i>
					<span class="menu-label">Orders</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.products.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.products.index') }}">
					<i class="fi fi-rr-package"></i>
					<span class="menu-label">Products</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.categories.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.categories.index') }}">
					<i class="fi fi-rr-list"></i>
					<span class="menu-label">Categories</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.users.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.users.index') }}">
					<i class="fi fi-rr-users"></i>
					<span class="menu-label">Users</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.mitras.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.mitras.index') }}">
					<i class="fi fi-rr-user"></i>
					<span class="menu-label">Mitras</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.drivers.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.drivers.index') }}">
					<i class="fi fi-rr-truck"></i>
					<span class="menu-label">Drivers</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.mitra-withdrawals.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.mitra-withdrawals.index') }}">
					<i class="fi fi-rr-wallet"></i>
					<span class="menu-label">Withdrawals</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.vouchers.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.vouchers.index') }}">
					<i class="fi fi-rr-ticket"></i>
					<span class="menu-label">Vouchers</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.slides.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.slides.index') }}">
					<i class="fi fi-rr-picture"></i>
					<span class="menu-label">Slides</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.banks.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.banks.index') }}">
					<i class="fi fi-rr-building"></i>
					<span class="menu-label">Banks</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.featured.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.featured.index') }}">
					<i class="fi fi-rr-star"></i>
					<span class="menu-label">Featured</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.whatsapp-templates.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.whatsapp-templates.index') }}">
					<i class="fi fi-rr-chat-bubble"></i>
					<span class="menu-label">WA Templates</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.wa_logs.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.wa_logs.index') }}">
					<i class="fi fi-rr-chat-bubble"></i>
					<span class="menu-label">WA Logs</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.notifications.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.notifications.index') }}">
					<i class="fi fi-rr-bell"></i>
					<span class="menu-label">Notifications</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.reports.finance'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.reports.finance') }}">
					<i class="fi fi-rr-chart-pie-alt"></i>
					<span class="menu-label">Reports</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.mitra_logs.index'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.mitra_logs.index') }}">
					<i class="fi fi-rr-history"></i>
					<span class="menu-label">Mitra Logs</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.settings.edit'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.settings.edit') }}">
					<i class="fi fi-rr-settings"></i>
					<span class="menu-label">Settings</span>
				</a>
			</li>
			@endif

			@if(Route::has('admin.logout'))
			<li class="menu-item">
				<a class="menu-link" href="{{ safe_route('admin.logout') }}">
					<i class="fi fi-rr-exit"></i>
					<span class="menu-label">Logout</span>
				</a>
			</li>
			@endif

		</ul>
	</nav>

	<div class="app-footer">
		<a href="{{ safe_route('faq') }}" class="btn btn-outline-light waves-effect btn-shadow btn-app-nav w-100">
			<i class="fi fi-rs-interrogation text-primary"></i>
			<span class="nav-text">Help and Support</span>
		</a>
	</div>
</aside>
