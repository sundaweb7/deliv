import 'package:flutter_secure_storage/flutter_secure_storage.dart';

abstract class TokenStorage {
  Future<String?> getToken();
  Future<void> saveToken(String token);
  Future<void> clear();
}

class SecureTokenStorage implements TokenStorage {
  final FlutterSecureStorage _storage = const FlutterSecureStorage();
  final String _key = 'deliv_token';

  @override
  Future<String?> getToken() async => await _storage.read(key: _key);

  @override
  Future<void> saveToken(String token) async => await _storage.write(key: _key, value: token);

  @override
  Future<void> clear() async => await _storage.delete(key: _key);
}
