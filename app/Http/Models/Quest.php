<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'desc',
        'value_detail',
        'type',
        'active'
    ];
}
