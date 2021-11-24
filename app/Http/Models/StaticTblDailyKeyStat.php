<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticTblDailyKeyStat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'total_users',
        'total_member_phone_verified',
        'total_unique_visitors',
        'total_check_out',
        'status'
    ];
}
