<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticTblKeyStat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payout',
        'bp_placed',
        'our_net',
        'our_net_rp',
    ];
}
