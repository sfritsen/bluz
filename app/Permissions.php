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

    public function scopeCheckAccess($query, $user_id, $group_route)
    {
        // $user_id = Auth::user();

        return $query->where('user_id', $user_id);
    }
}
