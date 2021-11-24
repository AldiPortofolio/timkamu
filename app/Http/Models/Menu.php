<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    const DELETED_AT = null;

    protected $fillable = [
        'name',
    ];
}
