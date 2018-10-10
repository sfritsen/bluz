<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    // Group entry count for current day
    public function scopeGroupCount($query)
    {
        return $query->where([
            ['created_at', 'like', date("Y-m-d") . '%']
            ]);
    }

    // Group abandon count for current day
    public function scopeGroupAbandonCount($query)
    {
        return $query->where([
            ['additional_notes', 'Abandon'],
            ['created_at', 'like', date("Y-m-d") . '%']
            ]);
    }
}
