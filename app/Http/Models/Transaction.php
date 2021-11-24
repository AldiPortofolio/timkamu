<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'transaction_number',
        'item_id',
        'total',
        'total_price',
        'discount',
        'promo_id',
        'desc',
        'payment_type',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }

    public function items()
    {
        return $this->belongsTo('App\Http\Models\ItemConversion', 'item_id');
    }

    public function promos()
    {
        return $this->belongsTo('App\Http\Models\Promo', 'promo_id');
    }
}
