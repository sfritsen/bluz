<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPermissionAttribute()
    {
        // Get the current user id
        $user_id = Auth::user()->id;

        // Query the permissions
        $permission = DB::table('permissions')->where('user_id', '=', $user_id)->first();

        // Use
        // Auth::user()->permissions->[permission]
        return $permission;
    }
    
    public function scopeGetGroupUsers($query, $group_route, $admin_route)
    {
        return $query->join('permissions', 'users.id', '=', 'permissions.user_id')
            ->where([
                ['permissions.'.$group_route, '1'],
                ['users.searchable', '1']
                ])
            ->select('users.*', 'permissions.user_management', 'permissions.'.$admin_route)
            ->orderBy('users.name', 'asc');
    }
}
