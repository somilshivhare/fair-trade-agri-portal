<?php

namespace App\Events;

use App\Models\Bid;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CounterBid implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bid;

    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('App.Models.User.' . $this->bid->buyer_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'CounterBid';
    }

    public function broadcastWith(): array
    {
        return [
            'bid_id' => $this->bid->id,
            'counter_amount' => $this->bid->counter_amount,
            'farmer_name' => $this->bid->farmer->name ?? 'A farmer',
            'crop_name' => $this->bid->product->crop_name ?? 'crop',
        ];
    }
}
