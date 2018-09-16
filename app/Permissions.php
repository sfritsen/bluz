<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'permissions';
    protected $fillable = [
        'user_id',
    ];

    public function scopeCheckAccess($query)
    {
        // Gets the logged in users id
        $my_id = Auth::user()->id;

        return $query->where('user_id', $my_id);
    }
}
