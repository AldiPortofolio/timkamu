<?php

namespace App\Http\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_number',
        'username',
        'phone',
        'email',
        'total_lp',
        'total_bp' ,
        'password',
        'token',
        'otp_code',
        'otp_expired',
        'active',
        'type',
        'fans_team_id',
        'rank_id',
        'role_id',
        'phone_verified',
        'email_verified',
        'referral_code',
        'referral_code_from'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teams()
    {
        return $this->belongsTo('App\Http\Models\Team', 'fans_team_id');
    }

    public function ranks()
    {
        return $this->belongsTo('App\Http\Models\Rank', 'rank_id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Http\Models\Role', 'rank_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}
