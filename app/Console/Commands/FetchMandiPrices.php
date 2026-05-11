<?php

namespace App\Console\Commands;

use App\Models\MarketPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchMandiPrices extends Command
{
    protected $signature = 'mandi:fetch-prices';
    protected $description = 'Fetch latest commodity prices from Data.gov.in (AGMARKNET)';

    public function handle()
    {
        $apiKey = config('services.data_gov_in.key');
        
        if (!$apiKey) {
            $this->error('API Key for Data.gov.in not found. Using fallback data.');
            return;
        }

        $this->info('Fetching mandi prices from Data.gov.in...');

        try {
            $response = Http::get('https://api.data.gov.in/resource/9ef273bd-a403-4713-97fb-62d570701e8d', [
                'api-key' => $apiKey,
                'format'  => 'json',
                'limit'   => 50,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $records = $data['records'] ?? [];
                
                // Load allowed crops from JSON
                $cropsJsonPath = base_path('database/data/mandi_crops.json');
                $allowedCrops = [];
                if (file_exists($cropsJsonPath)) {
                    $cropsData = json_decode(file_get_contents($cropsJsonPath), true);
                    $allowedCrops = $cropsData['crops'] ?? [];
                }

                $updatedCount = 0;
                foreach ($records as $record) {
                    // Filter by allowed crops if the list is not empty
                    if (!empty($allowedCrops) && !in_array($record['commodity'], $allowedCrops)) {
                        continue;
                    }

                    MarketPrice::updateOrCreate(
                        [
                            'commodity' => $record['commodity'],
                            'variety'   => $record['variety'],
                            'market'    => $record['market'],
                            'price_date'=> $record['arrival_date'],
                        ],
                        [
                            'state'      => $record['state'],
                            'district'   => $record['district'],
                            'min_price'  => (float) $record['min_price'],
                            'max_price'  => (float) $record['max_price'],
                            'modal_price'=> (float) $record['modal_price'],
                        ]
                    );
                    $updatedCount++;
                }

                $this->info("Successfully updated {$updatedCount} prices (filtered from " . count($records) . " records).");
            } else {
                $this->error('Failed to fetch data: ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('Error fetching prices: ' . $e->getMessage());
            Log::error('Mandi API Error: ' . $e->getMessage());
        }
    }
}
