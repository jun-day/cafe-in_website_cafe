<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'customer_name',
        'meja',
        'catatan',
        'total_harga',
        'finished_at'
    ];

    public function items()
    {
        return $this->hasMany(HistoryItem::class);
    }
}
