<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        // Restrict access to logged in user
        $this->middleware('auth');

        // Fetches the group data for use in this controller
        // $group = Groups::GroupData($this->group_id)->first();
        // $this->group_name = $group['name'];
        // $this->group_db_table = $group['db_table'];
        // $this->group_route = $group['entry_route'];
        // $this->group_admin_route = $group['admin_route'];
        // $this->group_label = $group['label'];
    }

    public function account_details()
    {
        // Sets title and route
        $data['section_title'] = 'My Account & Preferences';
        $data['section_route'] = 'my_account/';

        // Gets the users account
        $user = Auth::user()->id;

        // Load the view and pass $data
        return view('users/account_details', $data);
    }
}