<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'meta',
        'active',
        'reason',
        'open_date'
    ];
}
