<?php

namespace App\Console\Commands;

use App\Models\{Bid, Notification};
use App\Services\NotificationService;
use Illuminate\Console\Command;

class ExpireBids extends Command
{
    protected $signature   = 'agrimandi:expire-bids';
    protected $description = 'Mark expired bids and send 24-hour warning notifications';

    public function __construct(private NotificationService $notifService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        // Send 24-hour warnings
        $expiring = Bid::expiring()->get();
        foreach ($expiring as $bid) {
            $this->notifService->send($bid->buyer_id, 'offer_expiring', [
                'title'   => 'Bid Expiring Soon ⏰',
                'message' => "Your bid on {$bid->product->name} expires in less than 24 hours.",
                'data'    => ['bid_id' => $bid->id],
            ]);
        }
        $this->info("Sent {$expiring->count()} expiry warnings.");

        // Hard expire overdue bids
        $expired = Bid::active()->where('expires_at', '<', now())->get();
        foreach ($expired as $bid) {
            $bid->update(['status' => 'expired']);
        }
        $this->info("Expired {$expired->count()} bids.");
        return 0;
    }
}
