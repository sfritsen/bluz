<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_group1;
use App\Groups;
use App\DD_menus;
use App\Category_boxes;
use App\Permissions;
use Auth;

class Group1Controller extends Controller
{
    // Set global variables which are used below
    // Set the group_id from the id in groups
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

    public function entry()
    {
        // Check permissions for access to this controller (group)
        $check = Permissions::CheckAccess()->first();

        // If false, abort to 404
        if($check['g1_entry'] === 0){
            abort(404);
        }

        // Sets title and route
        $data['section_title'] = $this->group_name;
        $data['section_route'] = $this->group_route;

        // Category boxes.  Group_id and type
        $data['cat_lvl1'] = Category_boxes::Box($this->group_id, '1')->get();
        $data['cat_lvl2'] = Category_boxes::Box($this->group_id, '2')->get();
        $data['cat_lvl3'] = Category_boxes::Box($this->group_id, '3')->get();

        // Get dropdown menus. Second param is the parent_id
        $data['dd_incident_type'] = DD_menus::GetMenu($this->group_id, '2')->pluck('menu_id', 'menu_text');
        $data['dd_resolution'] = DD_menus::GetMenu($this->group_id, '3')->pluck('menu_id', 'menu_text');
        $data['dd_troubleshooting'] = DD_menus::GetMenu($this->group_id, '5')->pluck('menu_id', 'menu_text');
        $data['dd_equip_type'] = DD_menus::GetMenu($this->group_id, '8')->pluck('menu_id', 'menu_text');

        // Query for entry log data
        $data['entry_log'] = Data_group1::
            join('dd_menus', $this->group_db_table.'.incident_type', '=', 'dd_menus.menu_id')
            ->where([
                ['data_group1.user_id', Auth::user()->id],
                ['data_group1.created_at', 'like', date("Y-m-d") . '%']
            ])
            ->select('data_group1.*', 'dd_menus.menu_text')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get todays and yesterdays stat count
        $data['entry_count_today'] = $data['entry_log']->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Load the view and pass $data
        return view('group1/entry_form', $data);
    }

    public function submit_entry(Request $request)
    {
        // Validates the data
        $validateData = $request->validate([
            'agent_id' => 'required',
            'phone_number' => 'bail|required|numeric|digits:10',
            'lynx' => 'bail|required|numeric|digits:10',
            'chat_session_id' => 'required',
            'incident_type' => 'required',
            'equip_type' => 'required',
            'resolution' => 'required',
            'troubleshooting' => 'required',
            'cat_box_1' => 'required',
            'cat_box_2' => 'required',
            'cat_box_3' => 'required',
        ]);

        // Since notes are not manditory, write something if left blank
        if (empty($request->additional_notes)) {
            $additional_notes = "na";
        }else{
            $additional_notes = $request->additional_notes;
        }

        // Saves the data to the table once it validates
        $g1 = new Data_group1;
        $g1->user_id = Auth::user()->id;
        $g1->emp_info_name = $request->emp_info_name;
        $g1->emp_info_id = $request->emp_info_id;
        $g1->emp_info_city = $request->emp_info_city;
        $g1->emp_info_mgr_id = $request->emp_info_mgr_id;
        $g1->emp_info_mgr_name = $request->emp_info_mgr_name;
        $g1->emp_info_title = $request->emp_info_title;
		$g1->phone_number = $request->phone_number;
		$g1->lynx = $request->lynx;
        $g1->chat_session_id = $request->chat_session_id;
        $g1->incident_type = $request->incident_type;
        $g1->equip_type = $request->equip_type;
        $g1->resolution = $request->resolution;
        $g1->troubleshooting = $request->troubleshooting;
        $g1->client_no_ts = $request->input('client_no_ts', 0);
        $g1->invalid_ref = $request->input('invalid_ref', 0);
        $g1->cat_box_1 = $request->cat_box_1;
        $g1->cat_box_2 = $request->cat_box_2;
        $g1->cat_box_3 = $request->cat_box_3;
        $g1->additional_notes = $additional_notes;
        $g1->save();
        
        // Redirect after writing
        return redirect('/g1_entry');
    }

    public function history()
    {
        // Sets title and route
        $data['section_title'] = $this->group_name;
        $data['section_route'] = $this->group_route;

        // Get todays and yesterdays stat count
        $data['entry_count_today'] = Data_group1::TodayCount(Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Gets the history for the selected user
        $data['entry_history'] = Data_group1::
            join('dd_menus', $this->group_db_table.'.incident_type', '=', 'dd_menus.menu_id')
            ->where('data_group1.user_id', Auth::user()->id)
            ->select('data_group1.*', 'dd_menus.menu_text')
            ->orderBy('created_at', 'desc')
            ->get();

        // Count the results
        $data['history_count'] = $data['entry_history']->count();

        // Load the view and pass $data
        return view('group1/history', $data);
    }
}
