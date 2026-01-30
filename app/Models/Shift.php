<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sales\Sale;

class Shift extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function isOpen(): bool
    {
        return is_null($this->closed_at);
    }
}
