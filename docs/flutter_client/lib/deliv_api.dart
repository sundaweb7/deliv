import 'package:dio/dio.dart';

class DelivApiClient {
  final Dio dio;

  DelivApiClient({required String baseUrl, Dio? client}) : dio = client ?? Dio(BaseOptions(baseUrl: baseUrl));

  void setAuthToken(String token) {
    dio.options.headers['Authorization'] = 'Bearer $token';
  }

  void clearAuthToken() {
    dio.options.headers.remove('Authorization');
  }

  // Auth
  Future<Response> login({String? email, String? phone, required String password}) async {
    final res = await dio.post('/login', data: {'email': email, 'phone': phone, 'password': password});
    return res;
  }

  Future<Response> register({required Map<String, dynamic> payload}) async {
    return await dio.post('/register', data: payload);
  }

  Future<Response> logout() async {
    return await dio.post('/logout');
  }

  // Customer: cart
  Future<Response> addToCart(int productId, int qty) async {
    return await dio.post('/customer/cart/add', data: {'product_id': productId, 'qty': qty});
  }

  // Checkout (supports Idempotency-Key header)
  Future<Response> checkout(Map<String, dynamic> payload, {String? idempotencyKey}) async {
    final options = Options(headers: idempotencyKey != null ? {'Idempotency-Key': idempotencyKey} : {});
    return await dio.post('/customer/checkout', data: payload, options: options);
  }

  // Driver: report location
  Future<Response> reportDriverLocation(double lat, double lng, {double? speed, double? heading}) async {
    return await dio.post('/driver/location', data: {'lat': lat, 'lng': lng, 'speed': speed, 'heading': heading});
  }

  // Device token
  Future<Response> registerDeviceToken(String token) async {
    return await dio.post('/customer/device-tokens', data: {'token': token});
  }

  // Simple getters
  Future<Response> getProducts() async => await dio.get('/customer/products');
  Future<Response> getMitras() async => await dio.get('/customer/mitras');
  Future<Response> getOrders() async => await dio.get('/customer/orders');

  // convenience: parse token from login response
  static String? extractToken(Response res) {
    try {
      return res.data?['data']?['token'] as String?;
    } catch (e) {
      return null;
    }
  }
}
