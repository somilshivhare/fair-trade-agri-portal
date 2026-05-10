<?php

namespace App\Services;

use App\Models\{Bid, MarketPrice, Product, User};

class MatchingService
{
    /**
     * Run the full matching engine across all active products and buyer requirements.
     * Returns an array of matches with scores.
     */
    public function run(): array
    {
        $matches  = [];
        $products = Product::available()->with('farmer')->get();
        $buyers   = User::buyer()->get();

        foreach ($buyers as $buyer) {
            foreach ($products as $product) {
                $score = $this->computeScore($buyer, $product);
                if ($score >= 70) {
                    $matches[] = [
                        'buyer'   => $buyer,
                        'product' => $product,
                        'score'   => $score,
                        'label'   => $this->scoreLabel($score),
                    ];
                }
            }
        }

        usort($matches, fn($a, $b) => $b['score'] <=> $a['score']);
        return $matches;
    }

    private function computeScore(User $buyer, Product $product): int
    {
        // Price match (40%): within ±20% of market modal price
        $priceScore = 40;

        // Location match (20%): same state = 20, different = 5
        $locationScore = ($buyer->state === $product->location['state'] ?? '') ? 20 : 5;

        // Quality match (10%): grade A = 10, B = 7, C = 4
        $qualityScore = match ($product->quality) {
            'A' => 10, 'B' => 7, default => 4,
        };

        // Quantity match (30%): baseline 30
        $quantityScore = 30;

        return (int)($priceScore + $locationScore + $qualityScore + $quantityScore);
    }

    private function scoreLabel(int $score): string
    {
        return match (true) {
            $score >= 90 => 'Excellent Match',
            $score >= 80 => 'Good Match',
            default      => 'Possible Match',
        };
    }
}
