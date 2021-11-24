<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenuGrant extends Model
{   
    protected $fillable = [
        'admin_id',
        'menu_id',
        'name'
    ];

    public function admins()
    {
        return $this->belongsTo('App\Http\Models\AdminAccount', 'admin_id');
    }

    public function menus()
    {
        return $this->belongsTo('App\Http\Models\Menu', 'menu_id');
    }
}
