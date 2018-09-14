<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Groups;
use Auth;

class MainMenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check for active account
        $status = Auth::user()->active;
        if ($status === '0') {
            echo "Account disabled";
            die();
        }

        $data['groups'] = Groups::where('active', '1')->get();
        return view('main_menu', $data);
    }
}
