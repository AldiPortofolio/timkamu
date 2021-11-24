<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMemberRole extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'role_id'
    ];

    public function members()
    {
        return $this->belongsTo('App\Http\Models\TeamMember', 'member_id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Http\Models\Role', 'role_id');
    }
}
