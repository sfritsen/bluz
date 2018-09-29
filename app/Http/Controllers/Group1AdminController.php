<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_group1;
use App\Groups;
// use App\DD_menus;
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
        $data['cat_lvl1'] = Category_boxes::NonDeletedItems($this->group_id, '1')->get();

        // Get users today and yesterday stat count for the sidebar
        $data['entry_count_today'] = Data_group1::TodayCount(Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Load the view and pass $data
        return view('partials/category_boxes', $data);
    }

    public function category_boxes_edit(Request $request, $id, $state)
    {
        // Sets the value of $state based true or false
        if ($state === 'true'){
            $new_state = '1';
        }elseif($state === 'false'){
            $new_state = '0';
        }

        // Saves the change
        $switch = Category_boxes::find($id);
        $switch->active = $new_state;
        $switch->save();

        // Reformat the timestamp for sending
        $updated = date("Y-m-d H:i:s", strtotime($switch->updated_at));

        // Return new date
        return $updated;
    }

    public function category_boxes_save(Request $request)
    {
        // Saves the item
        $item = new Category_boxes;
        $item->group_id = '1';
        $item->type = '1';
        $item->is_under = '0';
        $item->cat1_label = $request->item;
        $item->cat2_label = '-';
        $item->cat3_label = '-';
        $item->cat4_label = '-';
        $item->active = '1';
        $item->save();

        // Reformat the 2 timestamps for sending
        $created = date("Y-m-d H:i:s", strtotime($item->created_at));
        $updated = date("Y-m-d H:i:s", strtotime($item->updated_at));

        // Build the array of items to send back for displaying
        $item_data = array(
            'id' => $item->id,
            'item' => $request->item,
            'active' => $item->active,
            'created_at' => $created,
            'updated_at' => $updated
        );

        // Return the encoded array
        return json_encode($item_data);
    }

    public function category_boxes_delete(Request $request, $id)
    {
        // Saves the change
        $del = Category_boxes::find($id);
        $del->active = '9';
        $del->save();

        // Reformat the timestamp for sending
        $updated = date("Y-m-d H:i:s", strtotime($del->updated_at));

        // Return new date
        return $updated;
    }

    // public function category_boxes_fetch(Request $request)
    // {
    //     $data = Category_boxes::FetchBox($this->group_id)->get();

    //     return $data;
    // }
}
