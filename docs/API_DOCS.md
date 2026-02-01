# Deliv - API Documentation (MVP)

## Ringkasan
- Laravel 10
- Sanctum untuk auth (token)
- JSON REST API
- Roles: admin, customer, mitra, driver

---

## Endpoint Utama (Contoh)

- POST /api/register
  - Body: { name, email, password, password_confirmation, role }
  - Response: { success, message, data: { user, token } }

- POST /api/login
  - Body: { email?, phone?, password }  # provide either email or phone
  - Response: { success, message, data: { user, token } }

- POST /api/register
  - Body: { name, email?, phone?, password, password_confirmation, role? }  # phone required if email omitted
  - Response: { success, message, data: { user, token } }

- GET /api/customer/mitras (authenticated & role:customer)
  - Response: { success, message, data: [mitras] }

- POST /api/customer/cart/add
  - Body: { product_id, qty }
  - Response: { success, message, data: cart }

- POST /api/customer/checkout
  - Body: { lat, lng, address, note, payment_method?, bank_id? }
  - payment_method: 'wallet' (default) or 'bank_transfer'
  - If payment_method=wallet, backend will debit customer's wallet and order.payment_status will be 'paid'.
  - If payment_method=bank_transfer, backend will create order with payment_status 'pending' and return selected bank details. Admin should mark the order paid after verification.
  - If payment_method=cod (cash on delivery), backend will create order with payment_status 'pending'. When the driver marks the vendor as delivered, the system will mark the order as paid (after all vendors delivered) and automatically process payouts to mitra and admin.
  - Response: { success, message, data: order }

- GET /api/banks
  - Response: list of available banks (name, account_name, account_number, type)

- GET /api/slides
  - Public list of active slides used by mobile/web
  - Response: { success, message, data: [ { id, image_url, thumb_url, order, is_active } ] }
  - Note: Mobile apps should use `thumb_url` for thumbnails and `image_url` for full resolution.

Device token (FCM) endpoints (authenticated):

- POST /api/customer/device-tokens
  - Body: { token, platform? }  # register device token from Flutter
  - Response: token registered

- DELETE /api/customer/device-tokens
  - Body: { token }  # unregister
  - Response: token removed

Notes:
- Set environment variable `FCM_SERVER_KEY` or configure `services.fcm.server_key` with your FCM server key (for quick setup use legacy server key). For production use, prefer Google Service Account and HTTP v1 API.
- Server can send push notifications (assignment, order status updates) using registered device tokens. Flutter clients should register token on login and unregister on logout.

Admin banks management (role:admin)

- GET /api/admin/banks
  - List banks
- POST /api/admin/banks
  - Body: { name, account_name?, account_number?, type?, is_active? }
- PUT /api/admin/banks/{id}
  - Update bank
- DELETE /api/admin/banks/{id}
  - Delete bank

- POST /api/customer/voucher/check
  - Body: { code, amount }
  - Response: { success, message, data: { discount, grand_total } }

- GET /api/customer/orders
  - Response: { success, message, data: [orders] }

- GET /api/mitra/orders (role:mitra)
  - Response: list order_vendor for mitra

- POST /api/mitra/order/{id}/status (role:mitra)
  - Body: { status }

- POST /api/driver/online (role:driver)
  - Body: { is_online, lat?, lng? }

- POST /api/driver/order/{id}/accept
  - Accept assigned order_vendor

- POST /api/driver/order/{id}/complete
  - Mark delivered and trigger payout distribution

- Admin endpoints: manage users, mitras, view orders, update settings

Admin endpoints (examples):

- GET /api/admin/stats (role:admin)
  - Response: { success, message, data: { users: { total, customers, mitras, drivers }, orders: { total, pending }, finance: { total_revenue, admin_commission } } }

- GET /api/admin/mitras (role:admin)
  - Response: paginated list of mitras
Admin UI (web):

- GET /admin/login — Admin login page (form)
- POST /admin/login — Perform login (form, session-based)
- GET /admin/dashboard — Admin dashboard (requires login)
- GET /admin/mitras — UI: list mitras (create/edit/delete/toggle)
- GET /admin/drivers — UI: list drivers (toggle/delete)
- GET /admin/products — UI: list products (create/delete)
- GET /admin/settings — UI: settings (update vendor commission, admin cut)
- GET /admin/users — UI: list users (delete)

Note: Admin UI uses session-based login and stores a personal access token in session to interface with API where needed.
- POST /api/admin/mitras
  - Body: { name, email, phone, delivery_type, lat, lng, password? }
  - Response: created mitra

- GET /api/admin/mitras/{id}
  - Response: mitra detail

- PATCH /api/admin/mitras/{id}
  - Body: fields to update
  - Response: updated mitra

- DELETE /api/admin/mitras/{id}
  - Response: success

- POST /api/admin/mitras/{id}/toggle
  - Toggle mitra active status

---

## Contoh Response (Checkout success)

{
  "success": true,
  "message": "Checkout success",
  "data": {
    "id": 1,
    "customer_id": 5,
    "order_type": "delivery",
    "status": "pending",
    "total_food": 50000,
    "delivery_fee": 12000,
    "admin_profit": 6200,
    "grand_total": 62000,
    "order_vendors": [ ... ]
  }
}

---

## ERD (Ringkasan tabel utama)

- users (id, name, email, phone, password, role)
- mitras (id, user_id, delivery_type, lat, lng, is_active)
- products (id, mitra_id, name, price, stock, is_active)
- carts (id, user_id)
- cart_items (id, cart_id, product_id, qty, price)
- orders (id, customer_id, order_type, status, total_food, delivery_fee, admin_profit, grand_total)
- order_vendors (id, order_id, mitra_id, subtotal_food, delivery_type, status)
- order_items (id, order_vendor_id, product_id, qty, price)
- drivers (id, user_id, is_online, lat, lng)
- driver_routes (id, driver_id, order_vendor_id, pickup_sequence, pickup_status)
- wallets (id, user_id, balance)
- transactions (id, wallet_id, type, amount, description)
- settings (id, vendor_commission_percent, admin_delivery_cut)

Relasi:
- users 1..1 mitra/driver
- mitra 1..* products
- order 1..* order_vendors
- order_vendors 1..* order_items
- driver 1..* driver_routes
- user 1..1 wallet -> transactions

---

## Langkah Instalasi (MVP)

1. Clone repo
2. composer install
3. copy .env.example to .env dan atur DB
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
7. php artisan serve

Tambahan: install Sanctum (sudah digunakan di code):
- composer require laravel/sanctum
- php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
- php artisan migrate

---

Catatan: Ini MVP minimal — pembayaran off-line, distribusi dana diproses saat driver menyelesaikan order. Untuk produksi, tambahkan event, queue, notifikasi, dan test coverage.
