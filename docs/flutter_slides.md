# Flutter: fetch slides and display

Example (using `http` package and `carousel_slider`):

Dart example:

```dart
import 'package:http/http.dart' as http;
import 'dart:convert';

Future<List<Map<String, dynamic>>> fetchSlides() async {
  final res = await http.get(Uri.parse('http://127.0.0.1:8000/api/slides'));
  if (res.statusCode != 200) throw Exception('Failed');
  final json = jsonDecode(res.body) as Map<String, dynamic>;
  return List<Map<String, dynamic>>.from(json['data']);
}

// Usage in a Widget (pseudo):
// - call fetchSlides() in initState, store list in state
// - use CarouselSlider (or PageView) and use slide['thumb_url'] for Image.network

// Example using Image.network with placeholder:
// Image.network(slide['thumb_url'], fit: BoxFit.cover)
```

Notes:
- Use `thumb_url` to reduce bandwidth on mobile (both Slides and Products include `thumb_url`).
- Product images may be SVG on the server. Flutter's standard `Image.network` does NOT render SVG — use the `flutter_svg` package (https://pub.dev/packages/flutter_svg) to display SVG images, or ensure the backend provides PNG thumbnails.
- Server-side: we attempt to serve PNG thumbnails for raster images; SVG thumbnails are copied unless `Imagick` is installed on the server (Imagick will enable rasterizing SVG to PNG thumbnails).
- If using an Android emulator, use `10.0.2.2` as the host to reach your computer (or use your machine LAN IP for physical devices). Set `APP_URL` accordingly for generated URLs if needed.
- If using HTTPS in production, make sure APP_URL is HTTPS and use valid certificate.
- For auth-protected admin endpoints (POST /api/admin/slides), use Sanctum tokens (role: admin). The UI already provides a session-based admin creator at `/admin/slides`.
