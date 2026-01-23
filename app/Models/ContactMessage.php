<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactMessage extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($contact_message) {
            if(!$contact_message->uuid) {
                $contact_message->uuid = (string) Str::uuid();
            }
        });
    }

    protected $casts = [
        'is_read' => 'boolean',
        'is_important' => 'boolean',
        'is_handled' => 'boolean',
    ];

    public function getIsNotReadAttribute(): bool
    {
        return !$this->is_read;
    }

    public function markAsRead(): void
    {
        if(!$this->is_read) {
            $this->update(['is_read' => true]);
        }
    }
}
