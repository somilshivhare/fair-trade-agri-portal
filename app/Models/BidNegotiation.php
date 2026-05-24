<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class BidNegotiation extends Model
{
    
    protected $table = 'bid_negotiations';

    protected $fillable = [
        'bid_id', 'user_id', 'action', 'price', 'quantity', 'message',
    ];

    protected function casts(): array
    {
        return ['price' => 'float', 'quantity' => 'float'];
    }

    const ACTIONS = ['placed', 'countered', 'accepted', 'rejected'];

    public function bid()  { return $this->belongsTo(Bid::class, 'bid_id'); }
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
}
