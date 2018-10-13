<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Counts_monthly extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'counts_monthly';

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

    public function scopeGetMonthData($query, $cur_year, $group_id)
    {
        // Get the data
        $m_stats = DB::table('counts_monthly')->where([
            ['group_id', $group_id],
            ['year', $cur_year]
        ])
        ->select('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december')
        ->get();

        // Initialize array
        $output_array = array();

        // Loop through array to set all values
        foreach($m_stats[0] as $key => $value) {
            $output_array[] = $value.", ";
        }

        // Join the array elements into a string
        $output = implode("", $output_array);

        // Return the string formatted for the chart
        return "[".$output."]";
    }
}
