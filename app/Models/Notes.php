<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $casts = [
        'created_at' => 'datetime:H:i:s d/m/Y',
        'updated_at' => 'datetime:H:i:s d/m/Y',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
