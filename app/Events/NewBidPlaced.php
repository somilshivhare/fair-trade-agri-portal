<?php

namespace App\Events;

use App\Models\Bid;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBidPlaced implements ShouldBroadcast
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
            new PrivateChannel('App.Models.User.' . $this->bid->farmer_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'NewBidPlaced';
    }

    public function broadcastWith(): array
    {
        return [
            'bid_id' => $this->bid->id,
            'amount' => $this->bid->amount,
            'buyer_name' => $this->bid->buyer->name ?? 'A buyer',
            'crop_name' => $this->bid->product->crop_name ?? 'crop',
        ];
    }
}
