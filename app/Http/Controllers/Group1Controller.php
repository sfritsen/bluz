<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Data_group1;
use App\Groups;
use App\DD_menus;
use Auth;

class Group1Controller extends Controller
{
    // Set global variables which are used below
    private $gl_group_label = "group1";
    private $gl_group_id = "2";
    private $gl_data_table = "data_group1";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->group_name = Groups::where('label', $this->gl_group_label)->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function entry()
    {
        // Gets the groups name based on the label
        $data['group'] = $this->group_name;

        // Drop menu item population
        $data['cat_lvl1'] = DB::table('cat_box_lvl1')->where([
            ['lvl1_group', '=', $this->gl_group_id],
            ['lvl1_active', '=', '1'],
        ])
        ->orderBy('lvl1_menu_item')->get();

        $data['cat_lvl2'] = DB::table('cat_box_lvl2')->where([
            ['lvl2_group', '=', $this->gl_group_id],
            ['lvl2_active', '=', '1'],
        ])
        ->orderBy('lvl2_menu_item')->get();

        $data['cat_lvl3'] = DB::table('cat_box_lvl3')->where([
            ['lvl3_group', '=', $this->gl_group_id],
            ['lvl3_active', '=', '1'],
        ])
        ->orderBy('lvl3_menu_item')->get();

        // Get dropdown menus. Second param is the parent_id
        $data['dd_incident_type'] = DD_menus::GetMenu($this->gl_group_id, '2')->pluck('menu_id', 'menu_text');
        $data['dd_resolution'] = DD_menus::GetMenu($this->gl_group_id, '3')->pluck('menu_id', 'menu_text');
        $data['dd_troubleshooting'] = DD_menus::GetMenu($this->gl_group_id, '5')->pluck('menu_id', 'menu_text');
        $data['dd_equip_type'] = DD_menus::GetMenu($this->gl_group_id, '8')->pluck('menu_id', 'menu_text');

        // Query for entry log data
        $data['entry_log'] = Data_group1::
            join('dd_menus', $this->gl_data_table.'.incident_type', '=', 'dd_menus.menu_id')
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
        // Gets the groups name based on the label
        $data['group'] = $this->group_name;

        // Get todays and yesterdays stat count
        $data['entry_count_today'] = Data_group1::TodayCount(Auth::user()->id)->count();
        $data['entry_count_yesterday'] = Data_group1::YesterdayCount(Auth::user()->id)->count();

        // Gets the history for the selected user
        $data['entry_history'] = Data_group1::
            join('dd_menus', $this->gl_data_table.'.incident_type', '=', 'dd_menus.menu_id')
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
