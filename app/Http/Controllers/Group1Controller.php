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
        $check = Permissions::CheckAccess(Auth::user()->id)->first();

        // If false, abort to error
        if($check['g1_entry'] === 0){ 
            return view('errors/no_access');
        }

        // Sets title and route
        $data['section_title'] = $this->group_name;
        $data['section_route'] = $this->group_route;

        // Category boxes.  Group_id and type
        $data['cat_lvl1'] = Category_boxes::Box($this->group_id, '1')->orderBy('cat1_label', 'asc')->get();
        $data['cat_lvl2'] = Category_boxes::Box($this->group_id, '2')->orderBy('cat2_label', 'asc')->get();
        $data['cat_lvl3'] = Category_boxes::Box($this->group_id, '3')->orderBy('cat3_label', 'asc')->get();

        // Get dropdown menus. Second param is the parent_id
        $data['dd_incident_type'] = DD_menus::GetMenu($this->group_id, '1')->pluck('id', 'menu_text');
        $data['dd_equip_type'] = DD_menus::GetMenu($this->group_id, '2')->pluck('id', 'menu_text');
        $data['dd_resolution'] = DD_menus::GetMenu($this->group_id, '3')->pluck('id', 'menu_text');
        $data['dd_troubleshooting'] = DD_menus::GetMenu($this->group_id, '4')->pluck('id', 'menu_text');

        // Query for entry log data
        $data['entry_records'] = Data_group1::TodayCount($this->group_db_table, Auth::user()->id)->paginate(200);

        // Sets the date format for the records shown
        $data['date_format'] = 'h:i:s a';

        // Get todays and yesterdays stat count
        $data['entry_count_today'] = $data['entry_records']->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Load the view and pass it $data
        return view('group1/entry_form', $data);
    }

    public function submit_entry(Request $request)
    {
        // Validates the data
        $validateData = $request->validate([
            'agent_id'              => 'required',
            'phone_number'          => 'bail|required|numeric|digits:10',
            'lynx'                  => 'bail|required|numeric|digits:10',
            'chat_session_id'       => 'required',
            'incident_type'         => 'required',
            'equip_type'            => 'required',
            'resolution'            => 'required',
            'troubleshooting'       => 'required',
            'cat_box_1'             => 'required',
            'cat_box_2'             => 'required',
            'cat_box_3'             => 'required',
        ]);

        // Saves the data to the table once it validates
        $g1 = new Data_group1;
        $g1->user_id                = Auth::user()->id;
        $g1->emp_info_name          = $request->emp_info_name ?: 'na';
        $g1->emp_info_id            = $request->emp_info_id ?: 'na';
        $g1->emp_info_city          = $request->emp_info_city ?: 'na';
        $g1->emp_info_mgr_id        = $request->emp_info_mgr_id ?: 'na';
        $g1->emp_info_mgr_name      = $request->emp_info_mgr_name ?: 'na';
        $g1->emp_info_title         = $request->emp_info_title ?: 'na';
		$g1->phone_number           = $request->phone_number;
		$g1->lynx                   = $request->lynx;
        $g1->chat_session_id        = $request->chat_session_id;
        $g1->incident_type          = $request->incident_type;
        $g1->equip_type             = $request->equip_type;
        $g1->resolution             = $request->resolution;
        $g1->troubleshooting        = $request->troubleshooting;
        $g1->client_no_ts           = $request->input('client_no_ts', 0);
        $g1->invalid_ref            = $request->input('invalid_ref', 0);
        $g1->cat_box_1              = $request->cat_box_1;
        $g1->cat_box_2              = $request->cat_box_2;
        $g1->cat_box_3              = $request->cat_box_3;
        $g1->additional_notes       = $request->additional_notes ?: 'na';
        $g1->abandon                = '0';
        $g1->save();
        
        // Redirect after writing
        return redirect('/g1_entry');
    }

    public function submit_abandon(Request $request)
    {
        // Validates the data
        $validateData = $request->validate([
            'chat_session_id' => 'required',
        ]);

        // Saves the data to the table once it validates
        $g1 = new Data_group1;
        $g1->user_id                = Auth::user()->id;
        $g1->emp_info_name          = 'Abandon';
        $g1->emp_info_id            = 'Abandon';
        $g1->emp_info_city          = 'Abandon';
        $g1->emp_info_mgr_id        = 'Abandon';
        $g1->emp_info_mgr_name      = 'Abandon';
        $g1->emp_info_title         = 'Abandon';
		$g1->phone_number           = '0';
		$g1->lynx                   = '0';
        $g1->chat_session_id        = $request->chat_session_id;
        $g1->incident_type          = '1';
        $g1->equip_type             = '0';
        $g1->resolution             = '0';
        $g1->troubleshooting        = '0';
        $g1->client_no_ts           = '0';
        $g1->invalid_ref            = '0';
        $g1->cat_box_1              = '0';
        $g1->cat_box_2              = '0';
        $g1->cat_box_3              = '0';
        $g1->additional_notes       = 'Abandon';
        $g1->abandon                = '1';
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
        $data['entry_count_today'] = Data_group1::TodayCount($this->group_db_table, Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Gets the history for the selected user
        $data['entry_records'] = Data_group1::UserHistory($this->group_db_table, Auth::user()->id)->paginate(50);

        // Sets the date format for the records shown
        $data['date_format'] = 'M d Y h:i:s a';

        // Load the view and pass $data
        return view('group1/history', $data);
    }

    public function record_details(Request $request, $id)
    {
        // Gets the record details for the supplied $id
        $data['record'] = Data_group1::
            join('category_boxes as lvl1', $this->group_db_table.'.cat_box_1', '=', 'lvl1.id')
            ->join('category_boxes as lvl2', $this->group_db_table.'.cat_box_2', '=', 'lvl2.id')
            ->join('category_boxes as lvl3', $this->group_db_table.'.cat_box_3', '=', 'lvl3.id')
            ->join('dd_menus as dd_incident_type', $this->group_db_table.'.incident_type', '=', 'dd_incident_type.id')
            ->join('dd_menus as dd_equip_type', $this->group_db_table.'.equip_type', '=', 'dd_equip_type.id')
            ->join('dd_menus as dd_resolution', $this->group_db_table.'.resolution', '=', 'dd_resolution.id')
            ->join('dd_menus as dd_troubleshooting', $this->group_db_table.'.troubleshooting', '=', 'dd_troubleshooting.id')
            ->where('data_group1.id', $id)
            ->select(
                'data_group1.*', 
                'lvl1.cat1_label as category_1', 
                'lvl2.cat2_label as category_2', 
                'lvl3.cat3_label as category_3',
                'dd_equip_type.menu_text as dd_equip_type',
                'dd_incident_type.menu_text as dd_incident_type',
                'dd_resolution.menu_text as dd_resolution',
                'dd_troubleshooting.menu_text as dd_troubleshooting'
            )
            ->first();

        return view('group1/entry_details', $data);
    }
}
