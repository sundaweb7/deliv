<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class DriverLocationUpdated implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $driverId;
    public $lat;
    public $lng;
    public $speed;
    public $heading;
    public $reported_at;

    public function __construct($driverId, $lat, $lng, $speed = null, $heading = null, $reported_at = null)
    {
        $this->driverId = $driverId;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->speed = $speed;
        $this->heading = $heading;
        $this->reported_at = $reported_at;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('driver.' . $this->driverId);
    }

    public function broadcastWith()
    {
        return [
            'driver_id' => $this->driverId,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'speed' => $this->speed,
            'heading' => $this->heading,
            'reported_at' => $this->reported_at,
        ];
    }
}