<?php

namespace App\Events;

use App\Models\Deal;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DealConfirmed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $deal;

    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('App.Models.User.' . $this->deal->buyer_id),
            new PrivateChannel('App.Models.User.' . $this->deal->farmer_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'DealConfirmed';
    }

    public function broadcastWith(): array
    {
        return [
            'deal_id' => $this->deal->id,
            'final_price' => $this->deal->final_price,
            'crop_name' => $this->deal->product->crop_name ?? 'crop',
        ];
    }
}
