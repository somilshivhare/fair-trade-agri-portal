<?php

namespace App\Console\Commands;

use App\Models\MarketPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Fetches daily mandi prices from data.gov.in (AGMARKNET dataset).
 * API Resource ID: 9ef84268-d588-465a-a308-a864a43d0070
 * Falls back to seeded static prices if the API is unavailable.
 */
class ScrapeMarketPrices extends Command
{
    protected $signature   = 'agrimandi:scrape-prices {--limit=500}';
    protected $description = 'Fetch daily market prices from data.gov.in AGMARKNET API';

    // data.gov.in AGMARKNET resource endpoint
    private const API_URL = 'https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070';

    // Commodities we care about (maps AGMARKNET name → our display name)
    private const COMMODITY_MAP = [
        'Wheat'   => 'Wheat',
        'Rice'    => 'Rice',
        'Maize'   => 'Maize',
        'Soybean' => 'Soybean',
        'Cotton'  => 'Cotton',
        'Paddy'   => 'Paddy',
        'Bajra'   => 'Bajra',
        'Jowar'   => 'Jowar',
        'Arhar'   => 'Arhar (Tur)',
        'Moong'   => 'Moong',
        'Urad'    => 'Urad',
        'Groundnut Pods (Raw)' => 'Groundnut',
        'Mustard' => 'Mustard',
        'Sunflower Seed' => 'Sunflower',
        'Onion'   => 'Onion',
        'Potato'  => 'Potato',
        'Tomato'  => 'Tomato',
    ];

    public function handle(): int
    {
        $apiKey = config('services.datagov.key', env('DATAGOV_API_KEY', ''));
        $limit  = (int) $this->option('limit');

        if (empty($apiKey)) {
            $this->warn('DATAGOV_API_KEY not set. Using fallback seed prices.');
            $this->storeFallback();
            return 0;
        }

        $this->info('Fetching from data.gov.in AGMARKNET...');

        try {
            $response = Http::timeout(30)->get(self::API_URL, [
                'api-key' => $apiKey,
                'format'  => 'json',
                'limit'   => $limit,
                'filters[price_date]' => now()->format('d/m/Y'),
            ]);

            if ($response->successful()) {
                $records = $response->json('records', []);
                $count   = $this->storeApiRecords($records);
                $this->info("✅ Stored {$count} price records from AGMARKNET.");
                return 0;
            }

            $this->warn("API returned status {$response->status()}. Using fallback.");
        } catch (\Throwable $e) {
            Log::warning('AGMARKNET API fetch failed: ' . $e->getMessage());
            $this->warn("Request failed: {$e->getMessage()}. Using fallback.");
        }

        $this->storeFallback();
        return 0;
    }

    private function storeApiRecords(array $records): int
    {
        $count = 0;
        foreach ($records as $row) {
            $commodity = $row['commodity'] ?? null;
            if (!$commodity) continue;

            // Only store commodities we track
            $mapped = self::COMMODITY_MAP[$commodity] ?? null;
            if (!$mapped) continue;

            try {
                MarketPrice::updateOrCreate(
                    [
                        'commodity'  => $mapped,
                        'state'      => $row['state'] ?? 'All',
                        'market'     => $row['market'] ?? 'Default',
                        'price_date' => today(),
                    ],
                    [
                        'min_price'   => (float) ($row['min_price'] ?? 0),
                        'max_price'   => (float) ($row['max_price'] ?? 0),
                        'modal_price' => (float) ($row['modal_price'] ?? 0),
                        'unit'        => $row['unit'] ?? 'Quintal',
                    ]
                );
                $count++;
            } catch (\Throwable $e) {
                Log::debug('Price record skip: ' . $e->getMessage());
            }
        }
        return $count;
    }

    private function storeFallback(): void
    {
        $this->info('Storing fallback seed prices...');
        $count = 0;
        foreach (MarketPrice::fallbackPrices() as $row) {
            MarketPrice::updateOrCreate(
                ['commodity' => $row['commodity'], 'price_date' => today()],
                array_merge($row, [
                    'market'      => 'Default',
                    'state'       => 'All',
                    'min_price'   => round($row['modal_price'] * 0.9),
                    'max_price'   => round($row['modal_price'] * 1.1),
                    'modal_price' => $row['modal_price'],
                    'price_date'  => today(),
                ])
            );
            $count++;
        }
        $this->info("✅ Stored {$count} fallback records.");
    }
}
