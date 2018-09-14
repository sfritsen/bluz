<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Data_group1;
use App\Groups;
use App\DD_menus;
use App\Category_boxes;
use Auth;

class Group1AdminController extends Controller
{
    // Set global variables which are used below
    // Set the group_id from the value given
    private $group_id = "1";

    public function __construct()
    {
        // Restrict access to logged in user
        $this->middleware('auth');

        // Fetches the group data for use in this controller
        $group = Groups::GroupData($this->group_id)->first();
        $this->group_name = $group['name'];
        $this->group_db_table = $group['db_table'];
        $this->group_route = $group['entry_route'];
        $this->group_label = $group['label'];
    }

    public function category_boxes()
    {
        // Sets title and route
        $data['section_title'] = 'Category Box Administration';
        $data['section_route'] = 'g1_cat_boxes';

        // Category boxes.  Group_id and type
        $data['cat_lvl1'] = Category_boxes::Box($this->group_id, '1')->get();
        $data['cat_lvl2'] = Category_boxes::Box($this->group_id, '2')->get();
        $data['cat_lvl3'] = Category_boxes::Box($this->group_id, '3')->get();

        // Get todays and yesterdays stat count
        $data['entry_count_today'] = Data_group1::TodayCount(Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Load the view and pass $data
        return view('partials/category_boxes', $data);
    }
}
