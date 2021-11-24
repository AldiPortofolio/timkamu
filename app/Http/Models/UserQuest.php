<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserQuest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'quest_id',
        'value_detail'
    ];

    public function users()
    {
        return $this->belongsTo('App\Http\Models\User', 'user_id');
    }

    public function quests()
    {
        return $this->belongsTo('App\Http\Models\Quest', 'quest_id');
    }
}
