<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Simple user login (web) and app preview
Route::get('/login', [\App\Http\Controllers\UI\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\UI\AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [\App\Http\Controllers\UI\AuthController::class, 'logout'])->name('logout');

// Simple user registration (web)
Route::get('/register', [\App\Http\Controllers\UI\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\UI\AuthController::class, 'register'])->name('register.submit');

Route::get('/app', [\App\Http\Controllers\UI\AppController::class, 'index'])->name('app.home');

// Admin UI routes (simple session-based token storage)
Route::get('/admin/login', [\App\Http\Controllers\AdminUI\AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\AdminUI\AuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [\App\Http\Controllers\AdminUI\AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [\App\Http\Controllers\AdminUI\DashboardController::class, 'index'])->name('admin.dashboard');

// Admin UI resource pages
Route::get('/admin/mitras', [\App\Http\Controllers\AdminUI\MitraController::class, 'index'])->name('admin.mitras.index');
Route::get('/admin/mitras/create', [\App\Http\Controllers\AdminUI\MitraController::class, 'create'])->name('admin.mitras.create');
Route::post('/admin/mitras', [\App\Http\Controllers\AdminUI\MitraController::class, 'store'])->name('admin.mitras.store');
Route::get('/admin/mitras/{mitra}/edit', [\App\Http\Controllers\AdminUI\MitraController::class, 'edit'])->name('admin.mitras.edit');
Route::put('/admin/mitras/{mitra}', [\App\Http\Controllers\AdminUI\MitraController::class, 'update'])->name('admin.mitras.update');
Route::delete('/admin/mitras/{mitra}', [\App\Http\Controllers\AdminUI\MitraController::class, 'destroy'])->name('admin.mitras.destroy');
Route::post('/admin/mitras/{mitra}/toggle', [\App\Http\Controllers\AdminUI\MitraController::class, 'toggle'])->name('admin.mitras.toggle');

// Admin: mitra couriers management
Route::get('/admin/mitras/{mitra}/couriers', [\App\Http\Controllers\AdminUI\MitraCourierController::class, 'index'])->name('admin.mitras.couriers');
Route::post('/admin/mitras/{mitra}/couriers', [\App\Http\Controllers\AdminUI\MitraCourierController::class, 'store'])->name('admin.mitras.couriers.store');
Route::post('/admin/mitras/{mitra}/couriers/{id}/toggle', [\App\Http\Controllers\AdminUI\MitraCourierController::class, 'toggle'])->name('admin.mitras.couriers.toggle');
Route::delete('/admin/mitras/{mitra}/couriers/{id}', [\App\Http\Controllers\AdminUI\MitraCourierController::class, 'destroy'])->name('admin.mitras.couriers.destroy');

Route::get('/admin/drivers', [\App\Http\Controllers\AdminUI\DriverController::class, 'index'])->name('admin.drivers.index');
Route::post('/admin/drivers/{driver}/toggle', [\App\Http\Controllers\AdminUI\DriverController::class, 'toggleOnline'])->name('admin.drivers.toggle');
Route::delete('/admin/drivers/{driver}', [\App\Http\Controllers\AdminUI\DriverController::class, 'destroy'])->name('admin.drivers.destroy');

Route::get('/admin/products', [\App\Http\Controllers\AdminUI\ProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [\App\Http\Controllers\AdminUI\ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [\App\Http\Controllers\AdminUI\ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [\App\Http\Controllers\AdminUI\ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [\App\Http\Controllers\AdminUI\ProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [\App\Http\Controllers\AdminUI\ProductController::class, 'destroy'])->name('admin.products.destroy');

// Users
Route::get('/admin/users', [\App\Http\Controllers\AdminUI\UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [\App\Http\Controllers\AdminUI\UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [\App\Http\Controllers\AdminUI\UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [\App\Http\Controllers\AdminUI\UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [\App\Http\Controllers\AdminUI\UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [\App\Http\Controllers\AdminUI\UserController::class, 'destroy'])->name('admin.users.destroy');

// Vouchers
Route::get('/admin/vouchers', [\App\Http\Controllers\AdminUI\VoucherController::class, 'index'])->name('admin.vouchers.index');
Route::get('/admin/vouchers/create', [\App\Http\Controllers\AdminUI\VoucherController::class, 'create'])->name('admin.vouchers.create');
Route::post('/admin/vouchers', [\App\Http\Controllers\AdminUI\VoucherController::class, 'store'])->name('admin.vouchers.store');
Route::get('/admin/vouchers/{voucher}/edit', [\App\Http\Controllers\AdminUI\VoucherController::class, 'edit'])->name('admin.vouchers.edit');
Route::put('/admin/vouchers/{voucher}', [\App\Http\Controllers\AdminUI\VoucherController::class, 'update'])->name('admin.vouchers.update');
Route::post('/admin/vouchers/{voucher}/toggle', [\App\Http\Controllers\AdminUI\VoucherController::class, 'toggle'])->name('admin.vouchers.toggle');
Route::delete('/admin/vouchers/{voucher}', [\App\Http\Controllers\AdminUI\VoucherController::class, 'destroy'])->name('admin.vouchers.destroy');

// Slides UI
Route::get('/admin/slides', [\App\Http\Controllers\AdminUI\SlideController::class, 'index'])->name('admin.slides.index');
Route::get('/admin/slides/create', [\App\Http\Controllers\AdminUI\SlideController::class, 'create'])->name('admin.slides.create');
Route::post('/admin/slides', [\App\Http\Controllers\AdminUI\SlideController::class, 'store'])->name('admin.slides.store');
Route::get('/admin/slides/{slide}/edit', [\App\Http\Controllers\AdminUI\SlideController::class, 'edit'])->name('admin.slides.edit');
Route::put('/admin/slides/{slide}', [\App\Http\Controllers\AdminUI\SlideController::class, 'update'])->name('admin.slides.update');
Route::post('/admin/slides/{slide}/toggle', [\App\Http\Controllers\AdminUI\SlideController::class, 'toggle'])->name('admin.slides.toggle');
Route::delete('/admin/slides/{slide}', [\App\Http\Controllers\AdminUI\SlideController::class, 'destroy'])->name('admin.slides.destroy');

// Notifications UI (admin)
Route::get('/admin/notifications', [\App\Http\Controllers\AdminUI\NotificationController::class, 'index'])->name('admin.notifications.index');
Route::post('/admin/notifications/send', [\App\Http\Controllers\AdminUI\NotificationController::class, 'send'])->name('admin.notifications.send');

// Featured products UI
Route::get('/admin/featured-products', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'index'])->name('admin.featured.index');
Route::get('/admin/featured-products/create', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'create'])->name('admin.featured.create');
Route::post('/admin/featured-products', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'store'])->name('admin.featured.store');
Route::get('/admin/featured-products/{featured}/edit', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'edit'])->name('admin.featured.edit');
Route::put('/admin/featured-products/{featured}', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'update'])->name('admin.featured.update');
Route::delete('/admin/featured-products/{featured}', [\App\Http\Controllers\AdminUI\FeaturedProductController::class, 'destroy'])->name('admin.featured.destroy');

// Settings
Route::get('/admin/settings', [\App\Http\Controllers\AdminUI\SettingsController::class, 'edit'])->name('admin.settings.edit');
Route::post('/admin/settings', [\App\Http\Controllers\AdminUI\SettingsController::class, 'update'])->name('admin.settings.update');

// WhatsApp logs and resend
Route::get('/admin/wa-logs', [\App\Http\Controllers\AdminUI\WhatsappLogController::class, 'index'])->name('admin.wa_logs.index');
Route::get('/admin/orders/{order}/wa-logs', [\App\Http\Controllers\AdminUI\WhatsappLogController::class, 'index'])->name('admin.orders.wa_logs');
Route::post('/admin/wa-logs/{log}/resend', [\App\Http\Controllers\AdminUI\WhatsappLogController::class, 'resend'])->name('admin.wa_logs.resend');
// WA test endpoints
Route::post('/admin/settings/test-wa-connection', [\App\Http\Controllers\AdminUI\SettingsController::class, 'testWaConnection'])->name('admin.settings.testWaConnection');
Route::post('/admin/settings/send-test-wa', [\App\Http\Controllers\AdminUI\SettingsController::class, 'sendTestWaMessage'])->name('admin.settings.sendTestWa');

// Reports UI
Route::get('/admin/reports/finance', [\App\Http\Controllers\AdminUI\ReportsController::class, 'finance'])->name('admin.reports.finance');

// Mitra status logs UI
Route::get('/admin/mitra-logs', [\App\Http\Controllers\AdminUI\MitraStatusLogController::class, 'index'])->name('admin.mitra_logs.index');

// Serve slide and product images (no symlink dependency)
Route::get('/slides/image/{filename}', [\App\Http\Controllers\Asset\SlideImageController::class, 'show']);
Route::get('/slides/image/thumb/{filename}', [\App\Http\Controllers\Asset\SlideImageController::class, 'thumb']);
Route::get('/products/image/{filename}', [\App\Http\Controllers\Asset\ProductImageController::class, 'show']);
Route::get('/products/image/thumb/{filename}', [\App\Http\Controllers\Asset\ProductImageController::class, 'thumb']);

// Debug: list product images and thumb URLs (enabled only in local/debug)
if (env('APP_DEBUG', false)) {
    Route::get('/debug/products-images', function () {
        return \App\Models\Product::orderBy('id')->take(50)->get()->map(function ($p) {
            return ['id' => $p->id, 'name' => $p->name, 'image' => $p->image, 'thumb_url' => $p->thumb_url, 'image_url' => $p->image_url];
        });
    });
}

// Banks UI
Route::get('/admin/banks', [\App\Http\Controllers\AdminUI\BankController::class, 'index'])->name('admin.banks.index');
Route::get('/admin/banks/create', [\App\Http\Controllers\AdminUI\BankController::class, 'create'])->name('admin.banks.create');
Route::post('/admin/banks', [\App\Http\Controllers\AdminUI\BankController::class, 'store'])->name('admin.banks.store');
Route::get('/admin/banks/{bank}/edit', [\App\Http\Controllers\AdminUI\BankController::class, 'edit'])->name('admin.banks.edit');
Route::put('/admin/banks/{bank}', [\App\Http\Controllers\AdminUI\BankController::class, 'update'])->name('admin.banks.update');
Route::delete('/admin/banks/{bank}', [\App\Http\Controllers\AdminUI\BankController::class, 'destroy'])->name('admin.banks.destroy');

// Orders UI
Route::get('/admin/orders', [\App\Http\Controllers\AdminUI\OrderController::class, 'index'])->name('admin.orders.index');
Route::post('/admin/orders/{id}/mark-paid', [\App\Http\Controllers\AdminUI\OrderController::class, 'markPaid'])->name('admin.orders.markPaid');

// Mitra UI (web) - simple couriers page (requires login and mitra account)
Route::middleware(['auth'])->group(function(){
    Route::get('/mitra/couriers', [\App\Http\Controllers\Mitra\CourierController::class, 'index'])->name('mitra.couriers.index');
    Route::post('/mitra/couriers', [\App\Http\Controllers\Mitra\CourierController::class, 'store'])->name('mitra.couriers.store');
    Route::put('/mitra/couriers/{id}', [\App\Http\Controllers\Mitra\CourierController::class, 'update'])->name('mitra.couriers.update');
    Route::delete('/mitra/couriers/{id}', [\App\Http\Controllers\Mitra\CourierController::class, 'destroy'])->name('mitra.couriers.couriers.destroy');

    // shipping UI for mitra
    Route::get('/mitra/shippings', [\App\Http\Controllers\Mitra\ShippingController::class, 'index'])->name('mitra.shippings.index');
    Route::get('/mitra/shippings/create', [\App\Http\Controllers\Mitra\ShippingController::class, 'create'])->name('mitra.shippings.create');
    Route::post('/mitra/shippings', [\App\Http\Controllers\Mitra\ShippingController::class, 'store'])->name('mitra.shippings.store');
    Route::get('/mitra/shippings/{id}/edit', [\App\Http\Controllers\Mitra\ShippingController::class, 'edit'])->name('mitra.shippings.edit');
    Route::put('/mitra/shippings/{id}', [\App\Http\Controllers\Mitra\ShippingController::class, 'update'])->name('mitra.shippings.update');
    Route::delete('/mitra/shippings/{id}', [\App\Http\Controllers\Mitra\ShippingController::class, 'destroy'])->name('mitra.shippings.destroy');

    // mitra store status UI
    Route::get('/mitra/store', [\App\Http\Controllers\Mitra\StoreController::class, 'show'])->name('mitra.store');
    Route::post('/mitra/store/toggle', [\App\Http\Controllers\Mitra\StoreController::class, 'toggle'])->name('mitra.store.toggle');
    Route::post('/mitra/store/reopen', [\App\Http\Controllers\Mitra\StoreController::class, 'toggleReopen'])->name('mitra.store.reopen');

    // Mitra wallet & profile (UI)
    Route::get('/mitra/wallet', [\App\Http\Controllers\MitraUI\WalletController::class, 'show'])->name('mitra.wallet');
    Route::post('/mitra/wallet/topup', [\App\Http\Controllers\MitraUI\WalletController::class, 'requestTopup'])->name('mitra.wallet.topup');

    Route::get('/mitra/profile', [\App\Http\Controllers\MitraUI\ProfileController::class, 'edit'])->name('mitra.profile');
    Route::post('/mitra/profile', [\App\Http\Controllers\MitraUI\ProfileController::class, 'update'])->name('mitra.profile.update');

    // mitra product management (UI)
    Route::get('/mitra/products', [\App\Http\Controllers\MitraUI\ProductController::class, 'index'])->name('mitra.products.index');
    Route::get('/mitra/products/{product}/edit', [\App\Http\Controllers\MitraUI\ProductController::class, 'edit'])->name('mitra.products.edit');
    Route::put('/mitra/products/{product}', [\App\Http\Controllers\MitraUI\ProductController::class, 'update'])->name('mitra.products.update');
});
