<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GxonController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function employee()
    {
        return view('dashboard.employee');
    }

    public function attendance()
    {
        return view('dashboard.attendance');
    }

    public function leave()
    {
        return view('dashboard.leave');
    }

    public function payroll()
    {
        return view('dashboard.payroll');
    }

    public function recruitment()
    {
        return view('dashboard.recruitment');
    }

    public function taskManagement()
    {
        return view('dashboard.task-management');
    }

    public function analytics()
    {
        return view('dashboard.analytics');
    }

    public function chat()
    {
        return view('dashboard.chat');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function calendar()
    {
        return view('dashboard.calendar');
    }

    public function emailInbox()
    {
        return view('email.inbox');
    }

    public function emailCompose()
    {
        return view('email.compose');
    }

    public function readEmail()
    {
        return view('email.read-email');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function faqs()
    {
        return view('pages.faq');
    }

    public function comingSoon()
    {
        return view('pages.coming-soon');
    }

    public function blogGrid()
    {
        return view('pages.blog');
    }

    public function blogList()
    {
        return view('pages.blog-list');
    }

    public function blogDetails()
    {
        return view('pages.blog-details');
    }

    public function errorBasic()
    {
        return view('pages.error-404');
    }

    public function errorCover()
    {
        return view('pages.error-404-cover');
    }

    public function errorFull()
    {
        return view('pages.error-404-full');
    }

    public function constructionBasic()
    {
        return view('pages.under-construction');
    }

    public function constructionCover()
    {
        return view('pages.under-construction-cover');
    }

    public function constructionFull()
    {
        return view('pages.under-construction-full');
    }

    public function loginBasic()
    {
        return view('authentication.login-basic');
    }

    public function loginCover()
    {
        return view('authentication.login-cover');
    }

    public function loginFrame()
    {
        return view('authentication.login-frame');
    }

    public function registerBasic()
    {
        return view('authentication.register-basic');
    }

    public function registerCover()
    {
        return view('authentication.register-cover');
    }

    public function registerFrame()
    {
        return view('authentication.register-frame');
    }

    public function forgotPasswordBasic()
    {
        return view('authentication.forgot-password-basic');
    }

    public function forgotPasswordCover()
    {
        return view('authentication.forgot-password-cover');
    }

    public function forgotPasswordFrame()
    {
        return view('authentication.forgot-password-frame');
    }

    public function newPasswordBasic()
    {
        return view('authentication.new-password-basic');
    }

    public function newPasswordCover()
    {
        return view('authentication.new-password-cover');
    }

    public function newPasswordFrame()
    {
        return view('authentication.new-password-frame');
    }

    public function uiAccordion()
    {
        return view('components.accordion');
    }

    public function uiAlerts()
    {
        return view('components.alerts');
    }

    public function uiBadge()
    {
        return view('components.badge');
    }

    public function uiBreadcrumb()
    {
        return view('components.breadcrumb');
    }

    public function uiButtons()
    {
        return view('components.buttons');
    }

    public function uiTypography()
    {
        return view('components.typography');
    }

    public function uiButtonGroup()
    {
        return view('components.button-group');
    }

    public function uiCard()
    {
        return view('components.card');
    }

    public function uiCollapse()
    {
        return view('components.collapse');
    }

    public function uiCarousel()
    {
        return view('components.carousel');
    }

    public function uiDropdowns()
    {
        return view('components.dropdowns');
    }

    public function uiModal()
    {
        return view('components.modal');
    }

    public function uiNavbar()
    {
        return view('components.navbar');
    }

    public function uiListGroup()
    {
        return view('components.list-group');
    }

    public function uiTabs()
    {
        return view('components.tabs');
    }

    public function uiOffcanvas()
    {
        return view('components.offcanvas');
    }

    public function uiPagination()
    {
        return view('components.pagination');
    }

    public function uiPopovers()
    {
        return view('components.popovers');
    }

    public function uiProgress()
    {
        return view('components.progress');
    }

    public function uiScrollspy()
    {
        return view('components.scrollspy');
    }

    public function uiSpinners()
    {
        return view('components.spinners');
    }

    public function uiToasts()
    {
        return view('components.toasts');
    }

    public function uiTooltips()
    {
        return view('components.tooltips');
    }

    public function avatar()
    {
        return view('extended-ui.avatar');
    }

    public function cardAction()
    {
        return view('extended-ui.card-action');
    }

    public function dragDrop()
    {
        return view('extended-ui.drag-drop');
    }

    public function simplebar()
    {
        return view('extended-ui.simplebar');
    }

    public function swiper()
    {
        return view('extended-ui.swiper');
    }

    public function team()
    {
        return view('extended-ui.team');
    }

    public function flaticon()
    {
        return view('icons.flaticon');
    }

    public function lucide()
    {
        return view('icons.lucide');
    }

    public function fontawesome()
    {
        return view('icons.fontawesome');
    }

    public function formElements()
    {
        return view('forms.form-elements');
    }

    public function formFloating()
    {
        return view('forms.form-floating');
    }

    public function formInputGroup()
    {
        return view('forms.form-input-group');
    }

    public function formLayout()
    {
        return view('forms.form-layout');
    }

    public function formValidation()
    {
        return view('forms.form-validation');
    }

    public function flatpickr()
    {
        return view('forms.flatpickr');
    }

    public function tagify()
    {
        return view('forms.tagify');
    }

    public function table()
    {
        return view('table.tables-basic');
    }

    public function datatable()
    {
        return view('table.tables-datatable');
    }

    public function apexChart()
    {
        return view('chart.apex-chart');
    }

    public function chartJs()
    {
        return view('chart.chart-js');
    }

    public function vectorMap()
    {
        return view('maps.jsvectormap');
    }

    public function leaflet()
    {
        return view('maps.leaflet');
    }
}
