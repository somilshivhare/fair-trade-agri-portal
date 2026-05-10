<?php

namespace App\Services;

class TransportCalculatorService
{
    /**
     * Calculate transport cost between two pincodes.
     * Uses a distance table or fallback formula.
     */
    public function calculate(
        string $fromPincode,
        string $toPincode,
        float  $quantity,
        string $unit
    ): float {
        // Convert to quintals for calculation
        $quintals = match ($unit) {
            'kg'     => $quantity / 100,
            'ton'    => $quantity * 10,
            default  => $quantity,
        };

        // Estimate distance based on first digit of pincode (zone)
        $distance = $this->estimateDistance($fromPincode, $toPincode);

        // Rate tiers per km per quintal
        $ratePerKm = match (true) {
            $distance <= 100  => 5,
            $distance <= 500  => 3,
            default           => 2,
        };

        $cost = $distance * $ratePerKm * $quintals;
        return max(150, round($cost, 2)); // Minimum ₹150
    }

    private function estimateDistance(string $from, string $to): int
    {
        // Zone-based estimation (first 3 digits = district)
        $fromZone = (int) substr($from, 0, 2);
        $toZone   = (int) substr($to, 0, 2);
        $diff     = abs($fromZone - $toZone);

        return match (true) {
            $diff === 0 => 30,
            $diff <= 5  => 150,
            $diff <= 15 => 400,
            default     => 800,
        };
    }
}
