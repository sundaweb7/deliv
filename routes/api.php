<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () { return response()->json(['pong' => true]); });

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Mitra\ProductController as MitraProductController;
use App\Http\Controllers\Mitra\MitraOrderController;
use App\Http\Controllers\Driver\DriverController as DriverController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MitraController;

// Friendly GET to avoid MethodNotAllowed when opening in browser
Route::get('/login', function () {
    return response()->json([
        'success' => false,
        'message' => 'GET not supported. Use POST /api/login with JSON body {"email":"...","password":"..."} or use POSTman/curl/tools/api_login.php',
        'hint' => 'curl -X POST http://127.0.0.1:8000/api/login -H "Content-Type: application/json" -d "{\"email\":\"admin@deliv.test\",\"password\":\"password\"}"'
    ], 200);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public product listing (no auth)
Route::get('/products', [CustomerOrderController::class, 'products']);
Route::get('/products/home', [CustomerOrderController::class, 'homeProducts']);
Route::get('/slides', [\App\Http\Controllers\Customer\SlideController::class, 'index']);
Route::get('/categories', [\App\Http\Controllers\Customer\CategoryController::class, 'index']);

// Debug: get notifications for first user when APP_DEBUG=true (development convenience)
Route::get('/debug/notifications', function () {
    if (!env('APP_DEBUG')) return response()->json(['success'=>false,'message'=>'Not available'], 404);
    $user = \App\Models\User::first();
    if (!$user) return response()->json(['success'=>false,'message'=>'No user found'], 404);
    $notifs = $user->notifications()->orderBy('created_at','desc')->get();
    return response()->json(['success'=>true,'message'=>'Debug notifications','data'=>$notifs]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // current authenticated user info
    Route::get('/me', [AuthController::class, 'me']);

    // Customer (authenticated)
    Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':customer'])->prefix('customer')->group(function () {
        Route::get('/mitras', [CustomerOrderController::class, 'mitras']);
        Route::get('/products', [CustomerOrderController::class, 'products']);
        Route::post('/cart/add', [CartController::class, 'add']);
        Route::post('/checkout', [CustomerOrderController::class, 'checkout']);
        // wallet
        Route::get('/wallet', [\App\Http\Controllers\Customer\WalletController::class, 'balance']);
        Route::get('/wallet/transactions', [\App\Http\Controllers\Customer\WalletController::class, 'transactions']);
        Route::post('/wallet/topup', [\App\Http\Controllers\Customer\WalletController::class, 'topup']);
        // device token
        Route::post('/device-tokens', [\App\Http\Controllers\Customer\DeviceTokenController::class, 'store']);
        Route::delete('/device-tokens', [\App\Http\Controllers\Customer\DeviceTokenController::class, 'destroy']);
        // notifications
        Route::get('/notifications', [\App\Http\Controllers\Customer\NotificationController::class, 'index']);
        Route::post('/notifications/{id}/read', [\App\Http\Controllers\Customer\NotificationController::class, 'markRead']);
        Route::post('/notifications/read-all', [\App\Http\Controllers\Customer\NotificationController::class, 'markAllRead']);
        // check voucher
        Route::post('/voucher/check', [\App\Http\Controllers\Customer\VoucherController::class, 'check']);
        Route::get('/orders', [CustomerOrderController::class, 'index']);
    });

    // Mitra
    Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':mitra'])->prefix('mitra')->group(function () {
        Route::resource('products', MitraProductController::class);
        Route::get('/orders', [MitraOrderController::class, 'index']);
        Route::post('/order/{id}/status', [MitraOrderController::class, 'updateStatus']);
        // couriers
        Route::get('/couriers', [\App\Http\Controllers\Mitra\MitraCourierController::class, 'index']);
        Route::post('/couriers', [\App\Http\Controllers\Mitra\MitraCourierController::class, 'store']);
        Route::put('/couriers/{id}', [\App\Http\Controllers\Mitra\MitraCourierController::class, 'update']);
        Route::delete('/couriers/{id}', [\App\Http\Controllers\Mitra\MitraCourierController::class, 'destroy']);

        // shipping models (mitra can manage own shipping models)
        Route::get('/shippings', [\App\Http\Controllers\Mitra\ShippingController::class, 'index']);
        Route::post('/shippings', [\App\Http\Controllers\Mitra\ShippingController::class, 'store']);
        Route::get('/shippings/{id}', [\App\Http\Controllers\Mitra\ShippingController::class, 'show']);
        Route::put('/shippings/{id}', [\App\Http\Controllers\Mitra\ShippingController::class, 'update']);
        Route::delete('/shippings/{id}', [\App\Http\Controllers\Mitra\ShippingController::class, 'destroy']);

        // allow mitra to register device tokens for push notifications (same controller as customer)
        Route::post('/device-tokens', [\App\Http\Controllers\Customer\DeviceTokenController::class, 'store']);
        Route::delete('/device-tokens', [\App\Http\Controllers\Customer\DeviceTokenController::class, 'destroy']);

        // store status (open/closed)
        Route::post('/store/open', [\App\Http\Controllers\Mitra\StoreController::class, 'setOpen']);
        Route::get('/store/logs', [\App\Http\Controllers\Mitra\StoreController::class, 'logs']);
        // reports
        Route::get('/reports/finance', [\App\Http\Controllers\Mitra\ReportController::class, 'finance']);

        // wallet (mitra)
        Route::get('/wallet', [\App\Http\Controllers\Mitra\WalletController::class, 'balance']);
        Route::get('/wallet/transactions', [\App\Http\Controllers\Mitra\WalletController::class, 'transactions']);
        Route::post('/wallet/topup', [\App\Http\Controllers\Mitra\WalletController::class, 'requestTopup']);

        // courier processing (accept/complete)
        Route::post('/courier/route/{id}/accept', [\App\Http\Controllers\Mitra\CourierProcessingController::class, 'accept']);
        Route::post('/courier/route/{id}/complete', [\App\Http\Controllers\Mitra\CourierProcessingController::class, 'complete']);
    });

    // Driver
    Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':driver'])->prefix('driver')->group(function () {
        Route::post('/online', [DriverController::class, 'setOnline']);
        Route::post('/location', [\App\Http\Controllers\Driver\DriverLocationController::class, 'report']);
        Route::get('/orders', [DriverController::class, 'orders']);
        Route::post('/order/{id}/accept', [DriverController::class, 'accept']);
        Route::post('/order/{id}/complete', [DriverController::class, 'complete']);
        // reports
        Route::get('/reports/earnings', [\App\Http\Controllers\Driver\ReportController::class, 'earnings']);
    });

    // Public: banks
    Route::get('/banks', [\App\Http\Controllers\Admin\BankController::class, 'index']);

    // Admin
    Route::middleware([\App\Http\Middleware\RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
        // dashboard
        Route::get('/stats', [\App\Http\Controllers\Admin\DashboardController::class, 'stats']);

        // mitra management
        Route::apiResource('/mitras', \App\Http\Controllers\Admin\MitraController::class);
        Route::post('/mitras/{mitra}/toggle', [\App\Http\Controllers\Admin\MitraController::class, 'toggleActive']);

        // vouchers
        Route::apiResource('/vouchers', \App\Http\Controllers\Admin\VoucherController::class);
        Route::post('/vouchers/{voucher}/toggle', [\App\Http\Controllers\Admin\VoucherController::class, 'toggle']);

        // slides
        Route::apiResource('/slides', \App\Http\Controllers\Admin\SlideController::class);
        Route::post('/slides/{slide}/toggle', [\App\Http\Controllers\Admin\SlideController::class, 'toggle']);

        // featured products
        Route::apiResource('/featured-products', \App\Http\Controllers\Admin\FeaturedProductController::class);

        // banks
        Route::apiResource('/banks', \App\Http\Controllers\Admin\BankController::class);

        // users and settings
        Route::apiResource('/users', AdminController::class);
        Route::get('/orders', [AdminController::class, 'orders']);

        // admin mark order paid (for bank_transfer)
        Route::post('/orders/{id}/mark-paid', [\App\Http\Controllers\Admin\AdminController::class, 'markPaid']);

        // reports
        Route::get('/reports/finance', [\App\Http\Controllers\Admin\ReportController::class, 'finance']);

        // Mitra topups (admin approval)
        Route::get('/mitra-topups', [\App\Http\Controllers\Admin\MitraTopupController::class, 'index']);
        Route::post('/mitra-topups/{id}/approve', [\App\Http\Controllers\Admin\MitraTopupController::class, 'approve']);
        Route::post('/mitra-topups/{id}/reject', [\App\Http\Controllers\Admin\MitraTopupController::class, 'reject']);

        Route::patch('/settings', [AdminController::class, 'updateSettings']);

        // mitra logs (admin)
        Route::get('/mitra-logs', [\App\Http\Controllers\Admin\MitraStatusLogController::class, 'index']);

        // admin product CRUD (manage any product)
        Route::apiResource('/products', \App\Http\Controllers\Admin\ProductController::class);
    });
});
