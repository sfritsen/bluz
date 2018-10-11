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

    public function scopeBuildMonthCounts($query, $db_table, $cur_year, $group_id)
    {
        // Redo all the counts to make sure they're up to date
        // Build array of table columns and values
        $month_array = array("january"=>"01", "february"=>"02","march"=>"03","april"=>"04","may"=>"05","june"=>"06","july"=>"07","august"=>"08","september"=>"09","october"=>"10","november"=>"11","december"=>"12");

        // Loop through the array
        foreach ($month_array as $m_name => $m_val) {
            // Get the totals of submissions for each value in the array
            $month_counts = DB::table($db_table)->where([
                ['created_at', 'like', $cur_year.'-'.$m_val.'%'],
            ])->count();

            // Update the counts_monthly table
            DB::table('counts_monthly')->where([
                ['group_id', $group_id],
                ['year', $cur_year]
            ])->update([$m_name => $month_counts]);
        }

    }
}
