<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Notification extends Model
{
    
    protected $table = 'notifications';

    protected $fillable = [
        'user_id', 'type', 'title', 'message',
        'data', 'is_read', 'icon',
    ];

    protected function casts(): array
    {
        return [
            'data'    => 'array',
            'is_read' => 'boolean',
        ];
    }

    const TYPES = [
        'new_bid', 'bid_accepted', 'bid_rejected', 'counter_offer',
        'offer_expiring', 'order_confirmed', 'order_shipped',
        'out_for_delivery', 'order_delivered', 'payment_received', 'match_found', 'government_alert',
    ];

    const ICONS = [
        'new_bid'         => '🆕',
        'bid_accepted'    => '✅',
        'bid_rejected'    => '❌',
        'counter_offer'   => '🔄',
        'offer_expiring'  => '⏰',
        'order_confirmed' => '✅',
        'order_shipped'   => '🚚',
        'out_for_delivery'=> '📍',
        'order_delivered' => '🏠',
        'payment_received'=> '💰',
        'match_found'     => '🎯',
        'government_alert'=> '📢',
    ];

    public function scopeUnread($q)  { return $q->where('is_read', false); }
    public function scopeForUser($q, $userId) { return $q->where('user_id', $userId); }

    public function user() { return $this->belongsTo(User::class, 'user_id'); }

    public function markAsRead(): void
    {
        $this->is_read = true;
        $this->save();
    }
}
