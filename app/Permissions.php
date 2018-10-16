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

    public function scopeCheckAccess($query, $user)
    {
        // This will query the permissions table for the given user and return all current data
        // to be checked in the controller.
        return $query->where('user_id', $user);
    }
}
