import 'package:deliv_api_client/deliv_api.dart';
import 'package:deliv_api_client/token_storage.dart';
import 'package:deliv_api_client/auth_interceptor.dart';
import 'package:dio/dio.dart';

void main() async {
  final storage = SecureTokenStorage();
  final dio = Dio(BaseOptions(baseUrl: 'http://10.0.2.2:8000/api'));
  dio.interceptors.add(AuthInterceptor(storage));

  final client = DelivApiClient(baseUrl: 'http://10.0.2.2:8000/api', client: dio);

  // Login example
  final res = await client.login(phone: '081234', password: 'password');
  final token = DelivApiClient.extractToken(res);
  if (token != null) {
    await storage.saveToken(token);
    client.setAuthToken(token);
  }

  // Add to cart & checkout
  await client.addToCart(1, 1);
  final checkout = await client.checkout({
    'lat': -6.2,
    'lng': 106.8,
    'address': 'Test',
    'payment_method': 'wallet'
  }, idempotencyKey: 'idem-${DateTime.now().millisecondsSinceEpoch}');

  print('Checkout: $checkout');

  // Driver location reporting (example)
  await client.reportDriverLocation(-6.2, 106.8, speed: 10, heading: 90);
}
