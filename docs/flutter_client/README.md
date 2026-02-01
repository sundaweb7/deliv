# Deliv API Client (Flutter starter)

Panduan singkat integrasi Flutter dengan backend Deliv.

Prereq
- Flutter SDK
- `dio`, `flutter_secure_storage`

Instalasi
1. Copy folder `docs/flutter_client` ke project Flutter Anda atau gunakan sebagai package.
2. Jalankan `flutter pub get`.

Contoh penggunaan singkat
- Inisialisasi client:

```dart
final storage = SecureTokenStorage();
final dio = Dio(BaseOptions(baseUrl: 'https://your-backend.com/api'));
dio.interceptors.add(AuthInterceptor(storage));
final client = DelivApiClient(baseUrl: 'https://your-backend.com/api', client: dio);
```

- Login & simpan token
```dart
final res = await client.login(phone: '0812xxx', password: 'password');
final token = DelivApiClient.extractToken(res);
if (token != null) {
  await storage.saveToken(token);
  client.setAuthToken(token);
}
```

- Checkout dengan idempotency key
```dart
final checkout = await client.checkout({
  'lat': -6.2,'lng':106.8,'address':'Test','payment_method':'wallet'
}, idempotencyKey: 'idem-12345');
```

- Report location (driver)
```dart
await client.reportDriverLocation(lat, lng, speed: 10);
```

Next steps
- Integrasikan socket client (`socket_io_client`) untuk subscribe ke channel `driver.{id}` (privat) dan gunakan token untuk auth.
- Implementasi background location (package: `background_locator` atau `flutter_background_geolocation`) untuk driver.

Catatan
- Gunakan `docs/openapi.yaml` sebagai referensi endpoint resmi.
- Sesuaikan baseUrl dan error handling di client sesuai kebutuhan aplikasi Anda.
