<!-- begin::GXON Sidebar Menu -->
<aside class="app-menubar" id="menubar">
	<div class="app-navbar-brand">
		<a class="navbar-brand-logo" href="{{ route('index') }}">
			<img src="{{ asset("assets/images/logo.svg") }}" alt="logo">
		</a>
		<a class="navbar-brand-mini visible-light" href="{{ route('index') }}">
			<img src="{{ asset("assets/images/logo-text.svg") }}" alt="logo">
		</a>
		<a class="navbar-brand-mini visible-dark" href="{{ route('index') }}">
			<img src="{{ asset("assets/images/logo-text-white.svg") }}" alt="logo">
		</a>
	</div>
	<nav class="app-navbar" data-simplebar>
		<ul class="menubar">
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-apps"></i>
					<span class="menu-label">Dashboard</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('index') }}">
							<span class="menu-label">Dashboard</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('employee') }}">
							<span class="menu-label">Employee</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('attendance') }}">
							<span class="menu-label">Attendance</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('leave') }}">
							<span class="menu-label">Leave</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('payroll') }}">
							<span class="menu-label">Payroll</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('recruitment') }}">
							<span class="menu-label">Recruitment</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('task-management') }}">
							<span class="menu-label">Task Management</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('analytics') }}">
							<span class="menu-label">Analytics</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-heading">
				<span class="menu-label">Apps & Pages</span>
			</li>
			<li class="menu-item">
				<a class="menu-link" href="{{ route('chat') }}">
					<i class="fi fi-rr-comment"></i>
					<span class="menu-label">Chat</span>
				</a>
			</li>
			<li class="menu-item">
				<a class="menu-link" href="{{ route('calendar') }}">
					<i class="fi fi-rr-calendar"></i>
					<span class="menu-label">Calendar</span>
				</a>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-envelope"></i>
					<span class="menu-label">Email</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('inbox') }}">
							<span class="menu-label">Inbox</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('compose') }}">
							<span class="menu-label">Compose</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('read-email') }}">
							<span class="menu-label">Read email</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-file"></i>
					<span class="menu-label">Pages</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('pricing') }}">
							<span class="menu-label">Pricing</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('faq') }}">
							<span class="menu-label">FAQ's</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('coming-soon') }}">
							<span class="menu-label">Coming Soon</span>
						</a>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Blog</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('blog') }}">
									<span class="menu-label">Blog Grid</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('blog-list') }}">
									<span class="menu-label">Blog List</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('blog-details') }}">
									<span class="menu-label">Blog Details</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Error</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('error-404') }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('error-404-cover') }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('error-404-full') }}">
									<span class="menu-label">Full</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Under Construction</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('under-construction') }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('under-construction-cover') }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('under-construction-full') }}">
									<span class="menu-label">Full</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-user-key"></i>
					<span class="menu-label">Authentication</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Login</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('login-basic')  }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('login-cover')  }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('login-frame')  }}">
									<span class="menu-label">Frame</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Register</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('register-basic')  }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('register-cover')  }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('register-frame')  }}">
									<span class="menu-label">Frame</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Forgot Password</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('forgot-password-basic')  }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('forgot-password-cover')  }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('forgot-password-frame')  }}">
									<span class="menu-label">Frame</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">New Password</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="{{ route('new-password-basic')  }}">
									<span class="menu-label">Basic</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('new-password-cover')  }}">
									<span class="menu-label">Cover</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ route('new-password-frame')  }}">
									<span class="menu-label">Frame</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="menu-heading">
				<span class="menu-label">Components</span>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-flux-capacitor"></i>
					<span class="menu-label">UI Components</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('accordion') }}">
							<span class="menu-label">Accordion</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('alerts') }}">
							<span class="menu-label">Alerts</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('badge') }}">
							<span class="menu-label">Badge</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('breadcrumb') }}">
							<span class="menu-label">Breadcrumb</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('buttons') }}">
							<span class="menu-label">Buttons</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('typography') }}">
							<span class="menu-label">Typography</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('button-group') }}">
							<span class="menu-label">Button Group</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('card') }}">
							<span class="menu-label">Card</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('collapse') }}">
							<span class="menu-label">Collapse</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('carousel') }}">
							<span class="menu-label">Carousel</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('dropdowns') }}">
							<span class="menu-label">Dropdowns</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('modal') }}">
							<span class="menu-label">Modal</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('navbar') }}">
							<span class="menu-label">Navbar</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('list-group') }}">
							<span class="menu-label">List Group</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('tabs') }}">
							<span class="menu-label">Tabs</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('offcanvas') }}">
							<span class="menu-label">Offcanvas</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('pagination') }}">
							<span class="menu-label">Pagination</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('popovers') }}">
							<span class="menu-label">Popovers</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('progress') }}">
							<span class="menu-label">Progress</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('scrollspy') }}">
							<span class="menu-label">Scrollspy</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('spinners') }}">
							<span class="menu-label">Spinners</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('toasts') }}">
							<span class="menu-label">Toasts</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('tooltips') }}">
							<span class="menu-label">Tooltips</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-apps-add"></i>
					<span class="menu-label">Extended UI</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('avatar') }}">
							<span class="menu-label">Avatar</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('card-action') }}">
							<span class="menu-label">Card action</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('drag-drop') }}">
							<span class="menu-label">Drag & drop</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('simplebar') }}">
							<span class="menu-label">Simplebar</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('swiper') }}">
							<span class="menu-label">Swiper</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('team') }}">
							<span class="menu-label">Team</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-bolt"></i>
					<span class="menu-label">Icons</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('flaticon')}}">
							<span class="menu-label">Flaticon</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('lucide')}}">
							<span class="menu-label">Lucide</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('fontawesome')}}">
							<span class="menu-label">Font Awesome</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-heading">
				<span class="menu-label">Forms & Tables</span>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-form"></i>
					<span class="menu-label">Form Elements</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('form-elements') }}">
							<span class="menu-label">Form Elements</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('form-floating') }}">
							<span class="menu-label">Form floating</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('form-input-group') }}">
							<span class="menu-label">Form input group</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('form-layout') }}">
							<span class="menu-label">Form layout</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('form-validation') }}">
							<span class="menu-label">Form validation</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('flatpickr') }}">
							<span class="menu-label">Flatpickr</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('tagify') }}">
							<span class="menu-label">Tagify</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-table-layout"></i>
					<span class="menu-label">Table</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('table') }}">
							<span class="menu-label">Table</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('datatable') }}">
							<span class="menu-label">Datatable</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-heading">
				<span class="menu-label">Charts & Maps</span>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-chart-pie-alt"></i>
					<span class="menu-label">Charts</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('apex-chart')  }}">
							<span class="menu-label">Apex Chart</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('chart-js')  }}">
							<span class="menu-label">Chart JS</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rr-marker"></i>
					<span class="menu-label">Maps</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item">
						<a class="menu-link" href="{{ route('jsvectormap') }}">
							<span class="menu-label">JS Vector Map</span>
						</a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ route('leaflet') }}">
							<span class="menu-label">Leaflet</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="menu-heading">
				<span class="menu-label">Others</span>
			</li>
			<li class="menu-item">
				<a class="menu-link" href="javascript:void(0);">
					<i class="fi fi-rs-badget-check-alt"></i>
					<span class="menu-label">Badge</span>
					<span class="badge badge-sm rounded-pill bg-secondary ms-2 float-end">5</span>
				</a>
			</li>
			<li class="menu-item menu-arrow">
				<a class="menu-link" href="javascript:void(0);" role="button">
					<i class="fi fi-rs-floor-layer"></i>
					<span class="menu-label">Multi Level</span>
				</a>
				<ul class="menu-inner">
					<li class="menu-item menu-arrow">
						<a class="menu-link" href="javascript:void(0);">
							<span class="menu-label">Multi Level 2</span>
						</a>
						<ul class="menu-inner">
							<li class="menu-item">
								<a class="menu-link" href="javascript:void(0);">
									<span class="menu-label">Multi Level 3</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="javascript:void(0);">
									<span class="menu-label">Multi Level 3</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="javascript:void(0);">
									<span class="menu-label">Multi Level 3</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<div class="app-footer">
		<a href="{{ route('faq') }}" class="btn btn-outline-light waves-effect btn-shadow btn-app-nav w-100">
			<i class="fi fi-rs-interrogation text-primary"></i>
			<span class="nav-text">Help and Support</span>
		</a>
	</div>
</aside>
<!-- end::GXON Sidebar Menu -->

<!-- begin::GXON Sidebar right -->
<div class="app-sidebar-end">
	<ul class="sidebar-list">
		<li>
			<a href="{{ route('task-management') }}">
				<div class="avatar avatar-sm bg-warning shadow-sharp-warning rounded-circle text-white mx-auto mb-2">
					<i class="fi fi-rr-to-do"></i>
				</div>
				<span class="text-dark">Task</span>
			</a>
		</li>
		<li>
			<a href="{{ route('faq') }}">
				<div class="avatar avatar-sm bg-secondary shadow-sharp-secondary rounded-circle text-white mx-auto mb-2">
					<i class="fi fi-rr-interrogation"></i>
				</div>
				<span class="text-dark">Help</span>
			</a>
		</li>
		<li>
			<a href="{{ route('calendar') }}">
				<div class="avatar avatar-sm bg-info shadow-sharp-info rounded-circle text-white mx-auto mb-2">
					<i class="fi fi-rr-calendar"></i>
				</div>
				<span class="text-dark">Event</span>
			</a>
		</li>
		<li>
			<a href="javascript:void(0);">
				<div class="avatar avatar-sm bg-gray shadow-sharp-gray rounded-circle text-white mx-auto mb-2">
					<i class="fi fi-rr-settings"></i>
				</div>
				<span class="text-dark">Settings</span>
			</a>
		</li>
	</ul>
</div>
<!-- end::GXON Sidebar right -->