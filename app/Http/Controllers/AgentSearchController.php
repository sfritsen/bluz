<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AgentSearchController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function search(Request $request)
    {
        // Parse $request->search to align with table employee_data personnel_number
        $emp_id = preg_replace('~[a-z]~i','',$request->search);
        $emp_id = str_pad($emp_id, 8, "0", STR_PAD_LEFT);
        $emp_id = trim($emp_id);

        // Find the possible match
        $agent_data = DB::table('employee_data')->where('personnel_number', 'LIKE', '%'.$emp_id.'%')->first();

        if (isset($agent_data->personnel_number)) {
            // If a personnel_number was found, build array to pass back for the form data
            $emp_data = array(
                'agent_info'        => $agent_data->personnel_number,
                'employee_name'     => $agent_data->known_as." ".$agent_data->last_name,
                'employee_id'       => $agent_data->personnel_number,
                'employee_city'     => $agent_data->work_address_city,
                'employee_mgr_id'   => $agent_data->manager_personnel_number,
                'employee_mgr_name' => $agent_data->manager_name,
                'employee_title'    => $agent_data->position_code_title,
                'smtp_address'      => $agent_data->smtp_address
            );
        }else{
            // Send back demo information if no record was found
            $emp_data = array(
                'agent_info'        => '00000000',
                'employee_name'     => 'Demo Employee',
                'employee_id'       => '00000000',
                'employee_city'     => 'Demo City',
                'employee_mgr_id'   => '00000000',
                'employee_mgr_name' => 'Demo Employee',
                'employee_title'    => 'Demo Employee'
            );
        }

        // Ship it off!
        return json_encode($emp_data);
    }
}
