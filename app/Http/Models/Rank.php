<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'special_border',
        'unique_color'
    ];
}
