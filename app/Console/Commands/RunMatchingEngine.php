<?php

namespace App\Console\Commands;

use App\Services\{MatchingService, NotificationService};
use Illuminate\Console\Command;

class RunMatchingEngine extends Command
{
    protected $signature   = 'agrimandi:run-matching';
    protected $description = 'Run the farmer-buyer matching engine and send match notifications';

    public function __construct(
        private MatchingService $matchingService,
        private NotificationService $notifService,
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Running matching engine...');
        $matches = $this->matchingService->run();

        foreach ($matches as $match) {
            // Notify buyer
            $this->notifService->send($match['buyer']->id, 'match_found', [
                'title'   => "Match Found! 🎯 ({$match['label']})",
                'message' => "{$match['product']->name} by {$match['product']->farmer->name} matches your requirements.",
                'data'    => ['product_id' => $match['product']->id, 'score' => $match['score']],
            ]);

            // Notify farmer
            $this->notifService->send($match['product']->farmer_id, 'match_found', [
                'title'   => "Potential Buyer Found! 🎯",
                'message' => "{$match['buyer']->name} might be interested in your {$match['product']->name}.",
                'data'    => ['buyer_id' => $match['buyer']->id, 'score' => $match['score']],
            ]);
        }

        $this->info("Processed " . count($matches) . " matches.");
        return 0;
    }
}
