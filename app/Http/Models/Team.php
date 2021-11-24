<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'website',
        'formed_date',
        'manager_id',
        'ceo_id',
        'alias',
        'id_tournament',
        'description',
        'published'
    ];

    public function managers()
    {
        return $this->belongsTo('App\Http\Models\User', 'manager_id');
    }

    public function ceos()
    {
        return $this->belongsTo('App\Http\Models\User', 'ceo_id');
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class, 'team_id');
    }

    public function teamFans()
    {
        return $this->hasMany(User::class, 'fans_team_id');
    }

}
