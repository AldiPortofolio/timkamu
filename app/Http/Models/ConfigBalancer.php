<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigBalancer extends Model
{
    protected $fillable = [
        'rules',
        'value',
        'active'
    ];
}
