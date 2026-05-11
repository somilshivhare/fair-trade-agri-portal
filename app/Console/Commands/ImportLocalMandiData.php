<?php

namespace App\Console\Commands;

use App\Models\MarketPrice;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ImportLocalMandiData extends Command
{
    protected $signature = 'mandi:import-local';
    protected $description = 'Import mandi prices from local JSON file';

    public function handle()
    {
        $path = base_path('database/data/mandi_crops.json');

        if (!file_exists($path)) {
            $this->error("File not found: {$path}");
            return;
        }

        $this->info("Reading data from {$path}...");
        $json = file_get_contents($path);
        $data = json_decode($json, true);

        if (!isset($data['records'])) {
            $this->error("Invalid JSON structure: 'records' key missing.");
            return;
        }

        $records = $data['records'];
        $count = count($records);
        $this->info("Importing {$count} records...");

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        foreach ($records as $record) {
            MarketPrice::updateOrCreate(
                [
                    'commodity' => $record['commodity'],
                    'variety'   => $record['variety'],
                    'market'    => $record['market'],
                    'price_date'=> $this->parseDate($record['arrival_date']),
                ],
                [
                    'state'      => $record['state'],
                    'district'   => $record['district'],
                    'min_price'  => (float) $record['min_price'],
                    'max_price'  => (float) $record['max_price'],
                    'modal_price'=> (float) $record['modal_price'],
                ]
            );
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nImport completed successfully!");
    }

    private function parseDate($dateStr)
    {
        try {
            // Data.gov.in often uses DD/MM/YYYY
            return Carbon::createFromFormat('d/m/Y', $dateStr);
        } catch (\Exception $e) {
            return now();
        }
    }
}
