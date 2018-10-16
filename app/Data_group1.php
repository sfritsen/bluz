<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Data_group1 extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'data_group1';

    // Used to get the user count for current day submissions as well as all data
    // #reusecode!
    public function scopeTodayCount($query, $group_table, $user)
    {
        return $query->join('dd_menus', $group_table.'.incident_type', '=', 'dd_menus.id')
            ->where([
                ['data_group1.user_id', $user],
                ['data_group1.created_at', 'like', date("Y-m-d") . '%']
                ])
            ->select('data_group1.*', 'dd_menus.menu_text')
            ->orderBy('data_group1.created_at', 'desc');
    }

    // Used to get the user count for yesterdays submissions
    public function scopeYesterdayCount($query, $user)
    {
        return $query->where([
            ['user_id', $user],
            ['created_at', 'like', date("Y-m-d", strtotime("-1 days")) . '%']
            ]);
    }

    // Used to get the user count for yesterdays submissions
    public function scopeUserHistory($query, $group_table, $user)
    {
        return $query->join('dd_menus', $group_table.'.incident_type', '=', 'dd_menus.id')
            ->where('data_group1.user_id', $user)
            ->select('data_group1.*', 'dd_menus.menu_text')
            ->orderBy('data_group1.created_at', 'desc');
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
