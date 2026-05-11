<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// ── AgriMandi Scheduled Tasks ─────────────────────────────────────────────────
Schedule::command('mandi:fetch-prices')
    ->twiceDaily(9, 21)          // 9 AM and 9 PM daily
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('agrimandi:expire-bids')
    ->hourly()
    ->withoutOverlapping()
    ->runInBackground();

Schedule::command('agrimandi:run-matching')
    ->dailyAt('07:00')
    ->withoutOverlapping()
    ->runInBackground();
