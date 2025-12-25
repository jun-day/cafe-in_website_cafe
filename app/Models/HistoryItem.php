<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model
{
    protected $fillable = [
        'history_id',
        'menu_name',
        'quantity',
        'harga_satuan',
        'subtotal'
    ];

    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
