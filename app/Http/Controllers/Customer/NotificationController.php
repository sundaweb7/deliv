<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // GET /api/notifications (customer)
    public function index(Request $request)
    {
        $user = $request->user();
        $perPage = intval($request->query('per_page', 20));
        $notifs = $user->notifications()->orderBy('created_at', 'desc')->paginate($perPage);

        // Keep response shape stable
        return response()->json(['success' => true, 'message' => 'Notifications', 'data' => $notifs]);
    }

    // POST /api/notifications/{id}/read
    public function markRead(Request $request, $id)
    {
        $user = $request->user();
        $notif = $user->notifications()->where('id', $id)->first();
        if (!$notif) return response()->json(['success' => false, 'message' => 'Not found'], 404);
        $notif->markAsRead();
        return response()->json(['success' => true, 'message' => 'Marked as read', 'data' => $notif]);
    }

    // POST /api/notifications/read-all
    public function markAllRead(Request $request)
    {
        $user = $request->user();
        $user->unreadNotifications->markAsRead();
        return response()->json(['success' => true, 'message' => 'All notifications marked as read']);
    }
}
