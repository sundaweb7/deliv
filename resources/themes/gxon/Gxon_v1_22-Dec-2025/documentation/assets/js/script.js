const initAppToggler = () => {

    const appTogglers = document.querySelectorAll(".app-toggler");
    const appMenubars = document.querySelectorAll(".app-menubar"); // fixed plural for consistency

    appTogglers.forEach(toggler => {
        toggler.addEventListener("click", () => {
            toggler.classList.toggle("active"); // Add or remove the 'active' class on click

            if (window.innerWidth >= 1191) {
                // Toggle the value between 'full' and 'mini'
                const currentValue = document.documentElement.getAttribute("data-app-sidebar");
                if (currentValue === "full") {
                    document.documentElement.setAttribute("data-app-sidebar", "mini");
                } else {
                    document.documentElement.setAttribute("data-app-sidebar", "full");
                }
			} else {
                // For <1191, toggle 'active' on each .app-menubar
                appMenubars.forEach(menubar => {
                    menubar.classList.toggle("open");
                });
            }
        });
    });
	// Hover logic for mini sidebar
	appMenubars.forEach(menubar => {
		menubar.addEventListener("mouseenter", () => {
			if (document.documentElement.getAttribute("data-app-sidebar") === "mini") {
				document.documentElement.setAttribute("data-app-sidebar", "mini-hover");
			}
		});

		menubar.addEventListener("mouseleave", () => {
			if (document.documentElement.getAttribute("data-app-sidebar") === "mini-hover") {
				document.documentElement.setAttribute("data-app-sidebar", "mini");
			}
		});
	});
};

const currentYear = () => {
    const elements = document.querySelectorAll('.currentYear');
    const currentYear = new Date().getFullYear();

    elements.forEach(element => {
        element.textContent = currentYear;
    });
};

const setElementHeight = () => {
    const footer = document.querySelector('.footer-wrapper');
	if (footer) {
		const footerHeight = footer ? footer.offsetHeight : 0;
		document.documentElement.style.setProperty('--footer-height', `${footerHeight}px`);
	}
	
	const chatBox = document.querySelector('.chat-wrapper');
	if (chatBox) {
		const chatHeight = chatBox.offsetHeight;
		document.documentElement.style.setProperty('--chat-height', `${chatHeight}px`);
	}
	
};

const ThemeSwitcher = () => {
	'use strict';

	// 🔹 Cookie Utility: Get a cookie value by name
	const getCookie = (name) => {
		const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
		return match ? match[2] : null;
	};

	// 🔹 Cookie Utility: Set a cookie with optional expiry
	const setCookie = (name, value, days = 365) => {
		const expires = new Date(Date.now() + days * 864e5).toUTCString();
		document.cookie = `${name}=${value}; expires=${expires}; path=/`;
	};

	// 🔹 Get stored theme from cookie (if available)
	const getStoredTheme = () => getCookie('theme');

	// 🔹 Save selected theme to cookie
	const setStoredTheme = (theme) => setCookie('theme', theme);

	// 🔹 Determine preferred theme: cookie > system preference
	const getPreferredTheme = () => {
		const storedTheme = getStoredTheme();
		if (storedTheme) return storedTheme;
		return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
	};

	// 🔹 Apply the theme to <html data-bs-theme="...">
	const setTheme = (theme) => {
		const appliedTheme = (theme === 'auto')
		  ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light')
		  : theme;

		document.documentElement.setAttribute('data-bs-theme', appliedTheme);
	};

	// 🔹 Update active state and icon based on selected theme
	const showActiveTheme = (theme, focus = false) => {
		const themeSwitcher = document.querySelector('#ld-theme');              // button
		const themeSwitcherText = document.querySelector('#ld-theme-text');    // button label
		const activeThemeIcon = document.querySelector('.theme-icon-active');  // <i> icon
		const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);

		if (!themeSwitcher || !btnToActive || !activeThemeIcon) return;

		// Remove existing active styles
		document.querySelectorAll('[data-bs-theme-value]').forEach(el => {
			el.classList.remove('active');
			el.setAttribute('aria-pressed', 'false');
		});

		// Add active styles to the selected one
		btnToActive.classList.add('active');
		btnToActive.setAttribute('aria-pressed', 'true');

		// Replace icon class
		const selectedIcon = btnToActive.querySelector('i');
		if (selectedIcon) {
			activeThemeIcon.className = selectedIcon.className + ' theme-icon-active';
		}

		// Update button ARIA label
		const label = `${themeSwitcherText?.textContent || 'Theme'} (${btnToActive.dataset.bsThemeValue})`;
		themeSwitcher.setAttribute('aria-label', label);

		if (focus) themeSwitcher.focus();
	};

	// 🔹 Auto-change if system theme changes (for "auto" mode)
	window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
		if (getStoredTheme() === 'auto') {
			setTheme('auto');
		}
	});

	// 🔹 On page ready, apply theme and set up click events
	window.addEventListener('DOMContentLoaded', () => {
		const preferredTheme = getPreferredTheme();         // "light" / "dark" / "auto"
		setTheme(preferredTheme);                           // apply theme
		showActiveTheme(preferredTheme);                    // update icon/active

		// Theme buttons click handler
		document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
			toggle.addEventListener('click', () => {
			const theme = toggle.getAttribute('data-bs-theme-value');
				setStoredTheme(theme);         // save in cookie
				setTheme(theme);              // apply
				showActiveTheme(theme, true); // update UI
			});
		});
	});
};

function initSidebarMenu() {
	
	for (var nk = window.location,
		o = $(".app-navbar .menubar a").filter(function(){
		return this.href == nk;
	}).addClass("active").parent().addClass("active").parent().show().siblings('a').addClass("active open").parent().parent().show().siblings('a').addClass("open");;){
		if (!o.is("li")) {
			break;
		}
		o = o.parent().slideDown().parent('li').children('a').addClass("active");
	}
}

document.addEventListener("DOMContentLoaded", () => {
    Waves.init();
	initAppToggler();
	setElementHeight();
	currentYear();
	ThemeSwitcher();
	initSidebarMenu();
});