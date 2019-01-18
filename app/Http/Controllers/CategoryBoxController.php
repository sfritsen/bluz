<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data_group1;
use App\Groups;
use App\DD_menus;
use App\Category_boxes;
use App\Counts_monthly;
use App\User;
use Auth;

class CategoryBoxController extends Controller
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
        $this->group_admin_route = $group['admin_route'];
        $this->group_label = $group['label'];
    }

    public function category_boxes($type, $is_under)
    {
        // Sets title and route
        $data['section_title'] = 'Category Box Administration';
        $data['section_route'] = 'cat_boxes/'.$type.'/'.$is_under;

        // Include type and is_under in data
        $data['type'] = $type;
        $data['next_level'] = $type + 1;
        $data['is_under'] = $is_under;

        $url = url('cat_boxes/');

        // Build the navigation section
        if ($type === '1') {
            $data['nav_label'] = "Current level 1 items";
            $data['nav_output'] = 'Current level 1 items';
        }elseif ($type === '2') {
            $value = Category_boxes::GetLabel($is_under)->first();
            $data['nav_output'] = '<a href="'.$url.'/'.$type.'/'.$is_under.'">'.$value->cat1_label.'</a>';
        }elseif ($type === '3') {
            $lvl2 = Category_boxes::GetLabel($is_under)->first();
            $lvl1 = Category_boxes::GetLabel($lvl2->is_under)->first();
            $lvl1_type = $lvl1->type + 1;
            $data['nav_output'] = '<a href="'.$url.'/'.$lvl1_type.'/'.$lvl1->id.'">'.$lvl1->cat1_label.'</a> &#9679; <a href="'.$url.'/'.$type.'/'.$is_under.'">'.$lvl2->cat2_label.'</a>';
        }elseif ($type === '4') {
            $lvl3 = Category_boxes::GetLabel($is_under)->first();
            $lvl2 = Category_boxes::GetLabel($lvl3->is_under)->first();
            $lvl1 = Category_boxes::GetLabel($lvl2->is_under)->first();
            // $data['nav_label'] = $lvl1->cat1_label." &#9679; ".$lvl2->cat2_label." &#9679; ".$lvl3->cat3_label;
            $lvl1_type = $lvl1->type + 1;
            $lvl2_type = $lvl2->type + 1;
            $data['nav_output'] = '<a href="'.$url.'/'.$lvl1_type.'/'.$lvl1->id.'">'.$lvl1->cat1_label.'</a> &#9679; <a href="'.$url.'/'.$lvl2_type.'/'.$lvl2->id.'">'.$lvl2->cat2_label.'</a> &#9679; <a href="'.$url.'/'.$type.'/'.$is_under.'">'.$lvl3->cat3_label.'</a>';
        }

        // Category boxes.  Group_id, type, is_under
        $data['category_items'] = Category_boxes::NonDeletedItems($this->group_id, $type, $is_under)->get();

        // Get users today and yesterday stat count for the sidebar
        $data['entry_count_today'] = Data_group1::TodayCount($this->group_db_table, Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Load the view and pass $data
        return view('category_boxes/main', $data);
    }

    // public function category_boxes_edit(Request $request, $id, $state)
    // {
    //     // Security check to make sure it's an ajax request and not loaded manually from the browser url.
    //     if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    //         abort(404);
    //     }

    //     // Sets the value of $state based true or false
    //     if ($state === 'true'){
    //         $new_state = '1';
    //     }elseif($state === 'false'){
    //         $new_state = '0';
    //     }elseif($state === 'delete'){
    //         $new_state = '9';
    //     }

    //     // Saves the change
    //     $switch = Category_boxes::find($id);
    //     $switch->active = $new_state;
    //     $switch->save();

    //     // Reformat the timestamp for sending
    //     $updated = date("Y-m-d H:i:s", strtotime($switch->updated_at));

    //     // Return new date
    //     return $updated;
    // }

    // public function category_boxes_save(Request $request)
    // {
    //     // Security check to make sure it's an ajax request and not loaded manually from the browser url.
    //     if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    //         abort(404);
    //     }

    //     // Set recieved paramaters into easy to use variables
    //     $item = $request->item;
    //     $type = $request->type;
    //     $is_under = $request->is_under;

    //     // Figure out the field values based on what was passed
    //     if ($type === '1') {
    //         $cat1_label = $item;
    //         $cat2_label = '-';
    //         $cat3_label = '-';
    //         $cat4_label = '-';
    //     }elseif ($type === '2') {
    //         $cat1_label = '-';
    //         $cat2_label = $item;
    //         $cat3_label = '-';
    //         $cat4_label = '-';
    //     }elseif ($type === '3') {
    //         $cat1_label = '-';
    //         $cat2_label = '-';
    //         $cat3_label = $item;
    //         $cat4_label = '-';
    //     }elseif ($type === '4') {
    //         $cat1_label = '-';
    //         $cat2_label = '-';
    //         $cat3_label = '-';
    //         $cat4_label = $item;
    //     }

    //     // Saves the item
    //     $item = new Category_boxes;
    //     $item->group_id = $this->group_id;
    //     $item->type = $type;
    //     $item->is_under = $is_under;
    //     $item->cat1_label = $cat1_label;
    //     $item->cat2_label = $cat2_label;
    //     $item->cat3_label = $cat3_label;
    //     $item->cat4_label = $cat4_label;
    //     $item->active = '1';
    //     $item->save();

    //     // Reformat the 2 timestamps for sending
    //     $created = date("Y-m-d H:i:s", strtotime($item->created_at));
    //     $updated = date("Y-m-d H:i:s", strtotime($item->updated_at));

    //     // Build the array of items to send back for displaying
    //     $item_data = array(
    //         'id' => $item->id,
    //         'item' => $request->item,
    //         'active' => $item->active,
    //         'created_at' => $created,
    //         'updated_at' => $updated
    //     );

    //     // Return the encoded array
    //     return json_encode($item_data);
    // }

    // public function category_boxes_trash_bin()
    // {
    //     // Sets title and route
    //     $data['section_title'] = 'Category Box Administration';
    //     $data['section_route'] = 'g1_cat_boxes_trash';

    //     $data['category_items'] = Category_boxes::DeletedItems($this->group_id)->get();

    //     // Get users today and yesterday stat count for the sidebar
    //     $data['entry_count_today'] = Data_group1::TodayCount($this->group_db_table, Auth::user()->id)->count();
    //     $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

    //     // Load the view and pass $data
    //     return view('category_boxes/trash_bin', $data);
    // }
}