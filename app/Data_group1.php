<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_group1 extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'data_group1';

    // Used to get the user count for days submissions
    public function scopeTodayCount($query, $user)
    {
        return $query->where([
            ['user_id', $user],
            ['created_at', 'like', date("Y-m-d") . '%']
            ]);
    }

    // Used to get the user count for yesterdays submissions
    public function scopeYesterdayCount($query, $user)
    {
        return $query->where([
            ['user_id', $user],
            ['created_at', 'like', date("Y-m-d", strtotime("-1 days")) . '%']
            ]);
    }
}
