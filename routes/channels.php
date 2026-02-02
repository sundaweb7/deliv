<?php

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Support\Facades\Broadcast;



/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('orders.{orderId}', function ($user, $orderId) {
    // allow if admin, driver, mitra or the order customer
    return $user && ($user->role === 'admin' || $user->role === 'driver' || $user->role === 'mitra' || $user->id == \App\Models\Order::find($orderId)->customer_id);
});

Broadcast::channel('driver.{driverId}', function ($user, $driverId) {
    // allow authenticated users to subscribe; further rules (presence) can be added
    return $user != null;
});