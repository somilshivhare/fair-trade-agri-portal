<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    /**
     * Send an in-app notification.
     *
     * @param string $userId
     * @param string $type   One of Notification::TYPES
     * @param array  $payload {title, message, data}
     */
    public function send(string $userId, string $type, array $payload): Notification
    {
        return Notification::create([
            'user_id' => $userId,
            'type'    => $type,
            'icon'    => Notification::ICONS[$type] ?? '🔔',
            'title'   => $payload['title'],
            'message' => $payload['message'],
            'data'    => $payload['data'] ?? [],
            'is_read' => false,
        ]);
    }

    public function markAllRead(string $userId): void
    {
        Notification::forUser($userId)->unread()->update(['is_read' => true]);
    }

    public function unreadCount(string $userId): int
    {
        return Notification::forUser($userId)->unread()->count();
    }
}
