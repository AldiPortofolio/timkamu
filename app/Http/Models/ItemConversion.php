<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemConversion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'child_id',
        'value'
    ];

    public function parents()
    {
        return $this->belongsTo('App\Http\Models\Item', 'parent_id');
    }

    public function childs()
    {
        return $this->belongsTo('App\Http\Models\Item', 'child_id');
    }
}
