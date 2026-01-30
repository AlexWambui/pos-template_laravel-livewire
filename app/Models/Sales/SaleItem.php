<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $guarded = [];

    public function sale()
    {
        $this->belongsTo(Sale::class);
    }
}
